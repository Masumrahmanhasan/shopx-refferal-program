<x-app-layout>

    <div class="flex-1 pl-6">
        <div class="bg-gray-100">
            <h2 class="text-2xl font-semibold text-gray-800">Referral List</h2>

            <!-- Your User Card -->
            <div class="bg-white p-4 rounded-lg shadow-md mt-6">
                <div class="flex items-center">
                    <div class="rounded-full bg-blue-500 h-12 w-12 flex items-center justify-center">
                        <svg fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="white" class="w-6 h-6">
                            <path d="M20 12H4"></path>
                            <path d="M8 16V20"></path>
                            <path d="M8 8V4"></path>
                            <path d="M20 16V20"></path>
                            <path d="M16 8L8 8"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-lg font-semibold text-gray-800">Your Name</p>
                        <p class="text-gray-600">Your Referral Code: ABC123</p>
                    </div>
                </div>
            </div>

            <!-- Referred Users List -->
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800">Users Who Used Your Referral Code</h3>
                <div class="mt-4 space-y-4">
                    <!-- User Item 1 -->
                    <div class="bg-white p-4 rounded-lg shadow-md flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="rounded-full bg-blue-500 h-10 w-10 flex items-center justify-center">
                                <svg fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="white" class="w-6 h-6">
                                    <path d="M20 12H4"></path>
                                    <path d="M8 16V20"></path>
                                    <path d="M8 8V4"></path>
                                    <path d="M20 16V20"></path>
                                    <path d="M16 8L8 8"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-lg font-semibold text-gray-800">Referred User 1</p>
                                <p class="text-gray-600">Referred Code: XYZ456</p>
                            </div>
                        </div>
                        <p class="text-green-600 font-semibold">+ $10.00</p>
                    </div>

                    <!-- User Item 2 -->
                    <div class="bg-white p-4 rounded-lg shadow-md flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="rounded-full bg-blue-500 h-10 w-10 flex items-center justify-center">
                                <svg fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="white" class="w-6 h-6">
                                    <path d="M20 12H4"></path>
                                    <path d="M8 16V20"></path>
                                    <path d="M8 8V4"></path>
                                    <path d="M20 16V20"></path>
                                    <path d="M16 8L8 8"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-lg font-semibold text-gray-800">Referred User 2</p>
                                <p class="text-gray-600">Referred Code: DEF789</p>
                            </div>
                        </div>
                        <p class="text-green-600 font-semibold">+ $20.00</p>
                    </div>

                    <!-- Add more user items as needed -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
