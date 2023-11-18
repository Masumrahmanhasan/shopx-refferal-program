<?php

namespace App\Livewire;

use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Symfony\Component\Process\Process;

class PaymentSection extends Component
{
    public $tab;
    public $account;
    public $trxn_id;
    public $gateway;

    public function rules()
    {
        return [
            'account' => 'required',
            'trxn_id' => ['required', Rule::unique('transactions', 'trxn_id')],
        ];
    }
    public function render()
    {
        return view('livewire.payment-section');
    }

    public function verifyPayment()
    {
        $this->validate();

        $transaction = Transaction::query()->create([
            'user_id'=> auth()->id(),
            'account' => $this->account,
            'gateway' => $this->gateway,
            'trxn_id' => $this->trxn_id,
            'amount' => 200,
            'type' => 'activation',
        ]);

        auth()->user()?->activation()->create([
            'transaction_id' => $transaction->id,
        ]);

        return redirect()->route('wallet');
    }

    public function changeTab($value)
    {
        $this->resetValidation();
        $this->tab = $value;
        if ($this->tab === 1) {
            $this->gateway = 'bkash';
        } else {
            $this->gateway = 'nagad';
        }
    }
}
