<?php

namespace App\Livewire;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use phpseclib3\Math\PrimeField\Integer;

class WithdrawBalance extends Component
{

    public bool $withdrawAlertModal = false;
    public bool $balanceWithdrawModal = false;
    public string $account;
    public int $amount;
    public string $gateway;

    public function __construct()
    {
        $this->gateway = ''; // Initialize $gateway in the constructor
    }

    /**
     * validation rules
     *
     * @return array
     */
    public function rules()
    {
        return [
            'account' => 'required',
            'amount' => 'required|integer|min:200|max:' . auth()->user()->balance,
            'gateway' => 'required'
        ];
    }

    public function render()
    {
        $transactions = Transaction::query()
            ->where('user_id', auth()->id())
            ->orderByDesc('id')
            ->get();
        $balance = Auth::user()->balance;

        return view('livewire.withdraw-balance',
            [
                'transactions' => $transactions,
                'balance' => $balance,
                'gateway' => $this->gateway
            ]);
    }

    public function openModal()
    {
        if ((Auth::user()->balance >= 200) && Auth::user()?->checkWithdrawValidity()) {
            $this->withdrawAlertModal = false;
        } else {
            $this->withdrawAlertModal = true;
        }
        $this->balanceWithdrawModal = true;
    }

    public function closeModal()
    {
        $this->balanceWithdrawModal = false;
    }

    public function selectGateway($gateway)
    {
        $this->gateway = $gateway;
    }

    public function withdrawBalance()
    {
        $this->validate();
        Transaction::query()->create([
            'user_id' => auth()->id(),
            'gateway' => $this->gateway,
            'trxn_id' => Str::random(10),
            'amount' => $this->amount,
            'account' => $this->account,
            'type' => 'withdraw',
        ]);

        Auth::user()?->deductBalance($this->amount);
        $this->balanceWithdrawModal = false;
    }
}
