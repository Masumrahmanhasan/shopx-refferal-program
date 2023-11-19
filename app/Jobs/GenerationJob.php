<?php

namespace App\Jobs;

use App\Models\BalanceTransaction;
use App\Models\User;
use App\Models\UserReferrel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class GenerationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Model $user, public Model $affiliate)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $me_as_first_generation = UserReferrel::query()->create([
            'user_id' => $this->affiliate->id,
            'referrel_id' => $this->user->id,
            'generation' => 'first'
        ]);

        $get_my_affiliate = User::query()
            ->where('referral_id', $this->user->referred_by)
            ->first();

        $add_balance = BalanceTransaction::query()->create([
            'balance' => 50,
            'from_user' => $this->user->id,
            'to_user' => $get_my_affiliate->id
        ]);

        if ($get_my_affiliate && $get_my_affiliate->referred_by !== null) {

            $find_my_affiliates_refer_id = User::query()
                ->where('referral_id', $get_my_affiliate->referred_by)
                ->first();

            if ($find_my_affiliates_refer_id) {

                $add_second_balance = BalanceTransaction::query()->create([
                    'balance' => 25,
                    'from_user' => $this->user->id,
                    'to_user' => $find_my_affiliates_refer_id->id
                ]);

                UserReferrel::query()->create([
                    'user_id' => $find_my_affiliates_refer_id->id,
                    'referrel_id' => $this->user->id,
                    'generation' => 'second'
                ]);

                $second_generation_affiliate = User::query()
                    ->where('referral_id', $find_my_affiliates_refer_id->referred_by)
                    ->first();

                if ($second_generation_affiliate) {

                    $add_third_balance = BalanceTransaction::query()->create([
                        'balance' => 25,
                        'from_user' => $this->user->id,
                        'to_user' => $second_generation_affiliate->id
                    ]);

                    UserReferrel::query()->create([
                        'user_id' => $second_generation_affiliate->id,
                        'referrel_id' => $this->user->id,
                        'generation' => 'third'
                    ]);
                }
            }
        }
    }
}
