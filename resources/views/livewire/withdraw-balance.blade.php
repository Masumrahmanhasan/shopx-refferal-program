<div>
    <div class="bg-white p-4 rounded-lg shadow-md mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-semibold text-gray-800">My Wallet</h2>
            <div class="mt-4">
                <p class="text-lg text-green-600 font-semibold">BDT {{ $balance }}</p>
                <p class="text-gray-600 text-sm">Available Balance</p>
            </div>
        </div>

        <!-- Withdraw Button -->
        <button
            wire:click="openModal"
            class="bg-purple_light-50 text-white hover:bg-purple_light-50 rounded-full px-4 py-2 transition duration-300">
            Withdraw
        </button>
    </div>

    <div class="bg-gray-100">
        <div class="mt-6 space-y-6">
            <!-- Transaction Item 1 -->
            @foreach($transactions as $key => $transaction)
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-800 text-lg font-semibold">Transaction Number:
                                #{{ $transaction->trxn_id }}</p>
                            <p class="text-gray-600 text-sm">Date: {{ $transaction->created_at }}</p>
                            <p class="text-gray-600 text-sm">Payment
                                Method: {{ ucfirst($transaction->gateway) }}</p>
                            <p class="text-gray-600 text-sm">Payment
                                Type: {{ ucfirst($transaction->type) }}</p>
                        </div>
                        <div class="text-green-600 text-lg font-semibold">
                            BDT {{ $transaction->amount }}</div>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-600">Status: <span
                                class="text-green-600 font-semibold">{{ ucfirst($transaction->status) }}</span>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @if($balanceWithdrawModal)
        <div class="relative z-10"
             wire:model="balanceWithdrawModal"
             wire:keydown.escape="closeModal"
             wire:loading.class="opacity-50"
             aria-labelledby="modal-title" role="dialog" aria-modal="false">

            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        @if($withdrawAlertModal)
                            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-center">
                                    <div
                                        class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                                        </svg>
                                    </div>
                                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                        <h3 class="text-base font-semibold leading-6 text-gray-900"
                                            id="modal-title">Withdraw Balance Alert</h3>

                                        <div>
                                            <p>For first withdrawal you need to 1st Generation 5 referrals Complete and minimum withdrawal 200 BDT</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="button"
                                        wire:click="closeModal"
                                        class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-purple_light-300 sm:mt-0 sm:w-auto">
                                    Cancel
                                </button>
                            </div>

                        @else
                            <form  wire:submit.prevent="withdrawBalance" method="POST" id="withdraw-form">

                                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-center">
                                        <div
                                            class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                                            </svg>
                                        </div>
                                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                            <h3 class="text-base font-semibold leading-6 text-gray-900"
                                                id="modal-title">Withdraw Balance</h3>
                                        </div>

                                    </div>

                                    <div class="mt-2 grid grid-cols-1 gap-x-6 gap-4 sm:grid-cols-6 w-full">
                                        <div class="col-span-full fv-row">
                                            <label for="street-address"
                                                   class="block text-sm font-medium leading-6 text-gray-900">Phone
                                                Number</label>
                                            <input type="text" wire:model="account" id="account"
                                                   autocomplete="street-address"
                                                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @error('account')
                                            <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-span-full fv-row">
                                            <label for="street-address"
                                                   class="block text-sm font-medium leading-6 text-gray-900">Amount</label>
                                            <input type="text" wire:model="amount" id="amount"
                                                   autocomplete="street-address"
                                                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @error('amount')
                                            <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-span-full">
                                            <label for="street-address"
                                                   class="block text-sm font-medium leading-6 text-gray-900">Select
                                                Payment Type</label>
                                            <ul class="grid w-full gap-6 md:grid-cols-2">
                                                <li wire:click="selectGateway('bkash')">
                                                    <input type="radio" id="bkash" wire:model="gateway"
                                                           value="bkash" class="hidden peer">
                                                    <label for="bkash"
                                                           class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer  @if($gateway === 'bkash') peer-checked:border-blue-600 peer-checked:text-blue-600 @endif hover:text-gray-600 hover:bg-gray-100 ">
                                                        <div class="block">
                                                            <img class="items-center"
                                                                 src="{{ asset('images/bkash.png') }}" alt=""
                                                                 width="80">
                                                        </div>
                                                    </label>
                                                </li>
                                                <li wire:click="selectGateway('nagad')">
                                                    <input type="radio" id="nagad" wire:model="gateway"
                                                           value="nagad" class="hidden peer">
                                                    <label for="nagad"
                                                           class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer  @if($gateway === 'nagad') peer-checked:border-blue-600 peer-checked:text-blue-600 @endif hover:text-gray-600 hover:bg-gray-100 ">
                                                        <div class="block">
                                                            <img class="items-center"
                                                                 src="{{ asset('images/nagod.png') }}" alt=""
                                                                 width="80">
                                                        </div>
                                                    </label>
                                                </li>
                                            </ul>
                                            @error('gateway')
                                            <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                    <button
                                        wire:submit.prevent="withdrawBalance"
                                        class="inline-flex w-full justify-center rounded-md bg-purple_light-50 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                                        Withdraw
                                    </button>
                                    <button type="button"
                                            wire:click="closeModal"
                                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-purple_light-300 sm:mt-0 sm:w-auto">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
