<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Wallet') }}
        </h2>
    </x-slot>

    <div class="flex-1 pl-4">
        <div class="bg-gray-100">
            <div class="mx-auto">
                <!-- Wallet Card -->
                <div class="bg-white p-4 rounded-lg shadow-md mb-6 flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-800">My Wallet</h2>
                        <div class="mt-4">
                            <p class="text-lg text-green-600 font-semibold">BDT {{ auth()->user()->balance }}</p>
                            <p class="text-gray-600 text-sm">Available Balance</p>
                        </div>
                    </div>
                    <!-- Withdraw Button -->
                    <button class="bg-red-600 text-white hover:bg-red-700 rounded-full px-4 py-2 transition duration-300">
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
                                        <p class="text-gray-800 text-lg font-semibold">Transaction Number: #{{ $transaction->trxn_id }}</p>
                                        <p class="text-gray-600 text-sm">Date: {{ $transaction->created_at }}</p>
                                        <p class="text-gray-600 text-sm">Payment Method: {{ ucfirst($transaction->gateway) }}</p>
                                        <p class="text-gray-600 text-sm">Payment Type: {{ ucfirst($transaction->type) }}</p>
                                    </div>
                                    <div class="text-green-600 text-lg font-semibold">BDT {{ $transaction->amount }}</div>
                                </div>
                                <div class="mt-4">
                                    <p class="text-gray-600">Status: <span class="text-green-600 font-semibold">{{ ucfirst($transaction->status) }}</span></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
