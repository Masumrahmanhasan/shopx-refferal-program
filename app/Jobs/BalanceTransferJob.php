<?php

namespace App\Jobs;

use App\Models\BalanceTransaction;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class BalanceTransferJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $balance_to_add = BalanceTransaction::query()
            ->where('to_user', auth()->user()->id)
            ->get();

        foreach ($balance_to_add as $balance) {
            $user = User::query()->where('id', $balance->from_user)->first();

            if (($user?->status === 'active') && (auth()->user()->status === 'active')) {
                auth()->user()->addBalance($balance->balance);
                $balance->delete();
            }
        }

    }
}
