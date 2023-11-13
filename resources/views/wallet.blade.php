<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Wallet') }}
        </h2>
    </x-slot>

    <div class="flex-1" x-data="{ modalOpen: false, infoModal: false }">
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

                    @if(Auth::user()->balance > 200 && Auth::user()->checkWithdrawValidity())
                        <button
                            @click="modalOpen = true"
                            class="bg-purple_light-50 text-white hover:bg-purple_light-50 rounded-full px-4 py-2 transition duration-300">
                            Withdraw
                        </button>
                    @else
                        <button
                            @click="infoModal = true"
                            class="bg-purple_light-50 text-white hover:bg-purple_light-50 rounded-full px-4 py-2 transition duration-300">
                            Withdraw
                        </button>
                    @endif
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

                <div class="relative z-10"
                     :class="{'hidden': !modalOpen}"
                     aria-labelledby="modal-title" role="dialog" aria-modal="false">

                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                            <div
                                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                <form action="{{ route('wallet.withdraw') }}" method="POST" id="withdraw-form">
                                    @csrf
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
                                                <input type="text" name="account" id="account"
                                                       autocomplete="street-address"
                                                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                            <div class="col-span-full fv-row">
                                                <label for="street-address"
                                                       class="block text-sm font-medium leading-6 text-gray-900">Amount</label>
                                                <input type="text" name="amount" id="amount"
                                                       autocomplete="street-address"
                                                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>

                                            <div class="col-span-full">
                                                <label for="street-address"
                                                       class="block text-sm font-medium leading-6 text-gray-900">Select
                                                    Payment Type</label>
                                                <ul class="grid w-full gap-6 md:grid-cols-2">
                                                    <li>
                                                        <input type="radio" id="bkash" name="gateway"
                                                               value="bkash" class="hidden peer">
                                                        <label for="bkash"
                                                               class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer  peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 ">
                                                            <div class="block">
                                                                <img class="items-center"
                                                                     src="{{ asset('images/bkash.png') }}" alt=""
                                                                     width="80">
                                                            </div>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="nagad" name="gateway"
                                                               value="nagad" class="hidden peer">
                                                        <label for="nagad"
                                                               class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer  peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 ">
                                                            <div class="block">
                                                                <img class="items-center"
                                                                     src="{{ asset('images/nagod.png') }}" alt=""
                                                                     width="80">
                                                            </div>
                                                        </label>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                        <button type="submit"
                                                class="inline-flex w-full justify-center rounded-md bg-purple_light-50 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                                            Withdraw
                                        </button>
                                        <button type="button"
                                                @click="modalOpen = false"
                                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-purple_light-300 sm:mt-0 sm:w-auto">
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative z-10"
                     x-transition:enter="transition ease-out duration-300 transform"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="transition ease-in duration-200 transform"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-cloak
                     :class="{'hidden': !infoModal}"
                     aria-labelledby="modal-title" role="dialog" aria-modal="false">

                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                            <div
                                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">

                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <!-- Modal content -->
                                    <div class="sm:flex sm:items-start">
                                        <div
                                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                            <!-- Heroicon name: outline/exclamation -->
                                            <svg width="64px" height="64px" class="h-6 w-6 text-red-600"
                                                 stroke="currentColor" fill="none" viewBox="0 0 24.00 24.00"
                                                 xmlns="http://www.w3.org/2000/svg" stroke="#ef4444"
                                                 stroke-width="0.45600000000000007">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                   stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M12 7.25C12.4142 7.25 12.75 7.58579 12.75 8V13C12.75 13.4142 12.4142 13.75 12 13.75C11.5858 13.75 11.25 13.4142 11.25 13V8C11.25 7.58579 11.5858 7.25 12 7.25Z"
                                                        fill="#ef4444"></path>
                                                    <path
                                                        d="M12 17C12.5523 17 13 16.5523 13 16C13 15.4477 12.5523 15 12 15C11.4477 15 11 15.4477 11 16C11 16.5523 11.4477 17 12 17Z"
                                                        fill="#ef4444"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M8.2944 4.47643C9.36631 3.11493 10.5018 2.25 12 2.25C13.4981 2.25 14.6336 3.11493 15.7056 4.47643C16.7598 5.81544 17.8769 7.79622 19.3063 10.3305L19.7418 11.1027C20.9234 13.1976 21.8566 14.8523 22.3468 16.1804C22.8478 17.5376 22.9668 18.7699 22.209 19.8569C21.4736 20.9118 20.2466 21.3434 18.6991 21.5471C17.1576 21.75 15.0845 21.75 12.4248 21.75H11.5752C8.91552 21.75 6.84239 21.75 5.30082 21.5471C3.75331 21.3434 2.52637 20.9118 1.79099 19.8569C1.03318 18.7699 1.15218 17.5376 1.65314 16.1804C2.14334 14.8523 3.07658 13.1977 4.25818 11.1027L4.69361 10.3307C6.123 7.79629 7.24019 5.81547 8.2944 4.47643ZM9.47297 5.40432C8.49896 6.64148 7.43704 8.51988 5.96495 11.1299L5.60129 11.7747C4.37507 13.9488 3.50368 15.4986 3.06034 16.6998C2.6227 17.8855 2.68338 18.5141 3.02148 18.9991C3.38202 19.5163 4.05873 19.8706 5.49659 20.0599C6.92858 20.2484 8.9026 20.25 11.6363 20.25H12.3636C15.0974 20.25 17.0714 20.2484 18.5034 20.0599C19.9412 19.8706 20.6179 19.5163 20.9785 18.9991C21.3166 18.5141 21.3773 17.8855 20.9396 16.6998C20.4963 15.4986 19.6249 13.9488 18.3987 11.7747L18.035 11.1299C16.5629 8.51987 15.501 6.64148 14.527 5.40431C13.562 4.17865 12.8126 3.75 12 3.75C11.1874 3.75 10.4379 4.17865 9.47297 5.40432Z"
                                                          fill="#ef4444"></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                                Withdraw Alert </h3>
                                            <div class="mt-2">
                                                <p class="text-sm text-gray-500"> You can not withdraw <span
                                                        class="font-bold">Sample Item</span>? This action cannot be
                                                    undone.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                    <button type="button"
                                            @click="infoModal = false"
                                            class="inline-flex w-full justify-center rounded-md bg-purple_light-50 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                                        Close
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>



