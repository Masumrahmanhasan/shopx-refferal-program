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


                <div class="bg-white p-4 hidden rounded-lg shadow-md mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Wallet History</h2>
                    <div class="mt-6">
                        <!-- Transaction List -->
                        <ul class="divide-y divide-gray-300">
                            <!-- Transaction Item 1 -->
                            <li class="py-4 flex items-center justify-between">
                                <div class="flex-1">
                                    <p class="text-gray-800 text-sm font-semibold">1. October 15, 2023</p>
                                    <p class="text-gray-600 text-sm">Payment Method: Visa ending in 1234</p>
                                </div>
                                <div class="flex-1 text-center">
                                    <p class="text-green-600 text-sm font-semibold">+$500.00</p>
                                </div>
                                <div class="flex-1 text-right">
                                    <span class="bg-green-100 text-green-600 px-2 py-1 rounded-full text-xs">Completed</span>
                                </div>
                            </li>

                            <!-- Transaction Item 2 -->
                            <li class="py-4 flex items-center justify-between">
                                <div class="flex-1">
                                    <p class="text-gray-800 text-sm font-semibold">2. October 14, 2023</p>
                                    <p class="text-gray-600 text-sm">Payment Method: PayPal</p>
                                </div>
                                <div class="flex-1 text-center">
                                    <p class="text-red-600 text-sm font-semibold">-$300.00</p>
                                </div>
                                <div class="flex-1 text-right">
                                    <span class="bg-red-100 text-red-600 px-2 py-1 rounded-full text-xs">Failed</span>
                                </div>
                            </li>

                            <!-- Add more transaction items as needed -->
                        </ul>
                    </div>
                </div>

                <!-- Transaction List -->
                <div class="bg-white hidden rounded-lg shadow-md">
                    <div class="bg-gray-200 p-3">
                        <h3 class="text-lg font-semibold text-gray-700">Transaction History</h3>
                    </div>
                    <ul class="divide-y divide-gray-300">
                        <!-- Transaction Item 1 -->
                        <li class="p-4">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-gray-800 text-sm font-semibold">Received from John Doe</p>
                                    <p class="text-gray-600 text-xs">Oct 15, 2023</p>
                                </div>
                                <p class="text-green-600 text-sm font-semibold">+ $500.00</p>
                            </div>
                        </li>

                        <!-- Transaction Item 2 -->
                        <li class="p-4">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-gray-800 text-sm font-semibold">Sent to Jane Smith</p>
                                    <p class="text-gray-600 text-xs">Oct 14, 2023</p>
                                </div>
                                <p class="text-red-600 text-sm font-semibold">- $300.00</p>
                            </div>
                        </li>

                        <!-- Add more transaction items as needed -->

                        <!-- Transaction Item 3 (Styled like Support Ticket) -->
                        <li class="bg-white hover:bg-gray-100 p-4 transition duration-300">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-gray-800 text-sm font-semibold">Received from Mary Johnson</p>
                                    <p class="text-gray-600 text-xs">Oct 13, 2023</p>
                                </div>
                                <p class="text-green-600 text-sm font-semibold">+ $700.00</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="hidden bg-gray-100 mt-4">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Order List</h2>

                    <!-- Order Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        <!-- Order Card 1 -->
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="text-lg font-semibold text-gray-800">Order #12345</h3>
                                <span class="bg-green-500 text-white rounded-full px-2 py-1 text-sm">Shipped</span>
                            </div>
                            <p class="text-gray-600 text-sm">Date: Oct 15, 2023</p>
                            <p class="text-gray-600 text-sm">Total: $500.00</p>
                        </div>

                        <!-- Order Card 2 -->
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="text-lg font-semibold text-gray-800">Order #12346</h3>
                                <span class="bg-yellow-500 text-white rounded-full px-2 py-1 text-sm">Processing</span>
                            </div>
                            <p class="text-gray-600 text-sm">Date: Oct 14, 2023</p>
                            <p class="text-gray-600 text-sm">Total: $300.00</p>
                        </div>

                        <!-- Order Card 3 -->
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="text-lg font-semibold text-gray-800">Order #12347</h3>
                                <span class="bg-red-500 text-white rounded-full px-2 py-1 text-sm">Cancelled</span>
                            </div>
                            <p class="text-gray-600 text-sm">Date: Oct 13, 2023</p>
                            <p class="text-gray-600 text-sm">Total: $150.00</p>
                        </div>

                        <!-- Add more order cards as needed -->
                    </div>
                </div>

                <div class="bg-gray-100">
                    <div class="mt-6 space-y-6">
                        <!-- Transaction Item 1 -->
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-gray-800 text-lg font-semibold">Serial Number: 1</p>
                                    <p class="text-gray-600 text-sm">Date: Oct 15, 2023</p>
                                    <p class="text-gray-600 text-sm">Payment Method: Credit Card</p>
                                </div>
                                <div class="text-green-600 text-lg font-semibold">+ $500.00</div>
                            </div>
                            <div class="mt-4">
                                <p class="text-gray-600">Status: <span class="text-green-600 font-semibold">Completed</span></p>
                            </div>
                        </div>

                        <!-- Transaction Item 2 -->
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-gray-800 text-lg font-semibold">Serial Number: 2</p>
                                    <p class="text-gray-600 text-sm">Date: Oct 14, 2023</p>
                                    <p class="text-gray-600 text-sm">Payment Method: PayPal</p>
                                </div>
                                <div class="text-red-600 text-lg font-semibold">- $300.00</div>
                            </div>
                            <div class="mt-4">
                                <p class="text-gray-600">Status: <span class="text-yellow-600 font-semibold">Pending</span></p>
                            </div>
                        </div>

                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-gray-800 text-lg font-semibold">Serial Number: 2</p>
                                    <p class="text-gray-600 text-sm">Date: Oct 14, 2023</p>
                                    <p class="text-gray-600 text-sm">Payment Method: PayPal</p>
                                </div>
                                <div class="text-blue-500 text-lg font-semibold">= $300.00</div>
                            </div>
                            <div class="mt-4">
                                <p class="text-gray-600">Status: <span class="text-red-600 font-semibold">Cancelled</span></p>
                            </div>
                        </div>

                        <div class="grid min-h-[140px] w-full place-items-center overflow-x-scroll rounded-lg p-6 lg:overflow-visible">
                            <nav>
                                <ul class="flex">
                                    <li>
                                        <a class="mx-1 flex h-9 w-9 items-center justify-center rounded-full bg-blue-500 p-0 text-sm text-white shadow-md transition duration-150 ease-in-out" href="#">1</a>
                                    </li>
                                    <li>
                                        <a class="mx-1 flex h-9 w-9 items-center justify-center rounded-full border border-blue-gray-100 bg-transparent p-0 text-sm text-blue-gray-500 transition duration-150 ease-in-out hover:bg-light-300" href="#">2</a>
                                    </li>
                                    <li>
                                        <a class="mx-1 flex h-9 w-9 items-center justify-center rounded-full border border-blue-gray-100 bg-transparent p-0 text-sm text-blue-gray-500 transition duration-150 ease-in-out hover:bg-light-300" href="#">3</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                <!-- Add more transaction items as needed -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
