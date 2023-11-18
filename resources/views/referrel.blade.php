<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Referral') }}
        </h2>
    </x-slot>
    <div class="flex-1">
        <div class="bg-gray-100">
            <div class="bg-white border border-gray-300 p-4 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Generation Referral Counts</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="flex flex-col items-center justify-center bg-gray-200 p-4 rounded-md">
                        <div>
                            <p class="text-lg font-semibold mb-2">1st Generation</p>
                            <p class="text-4xl font-bold text-blue-500 text-center">{{ $data['first'] }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center bg-gray-200 p-4 rounded-md">
                        <div>
                            <p class="text-lg font-semibold mb-2">2nd Generation</p>
                            <p class="text-4xl font-bold text-blue-500 text-center">{{ $data['second'] }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center bg-gray-200 p-4 rounded-md">
                        <div>
                            <p class="text-lg font-semibold mb-2">3rd Generation</p>
                            <p class="text-4xl font-bold text-blue-500 text-center">{{ $data['third'] }}</p>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Referred Users List -->
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800">Users Who Used Your Referral Code</h3>
                <div class="mt-4 space-y-4">
                    <!-- User Item 1 -->
                    @forelse($referrals as $referral)
                        <div class="bg-white p-4 rounded-lg shadow-md flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="rounded-full bg-blue-500 h-10 w-10 flex items-center justify-center">
                                    <svg fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round"
                                         stroke-width="2" viewBox="0 0 24 24" stroke="white" class="w-6 h-6">
                                        <path d="M20 12H4"></path>
                                        <path d="M8 16V20"></path>
                                        <path d="M8 8V4"></path>
                                        <path d="M20 16V20"></path>
                                        <path d="M16 8L8 8"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-lg font-semibold text-gray-800">{{ $referral->associate->username }}</p>
                                    <p class="text-gray-600">Generation: {{ ucfirst($referral->generation) }}
                                        Generation</p>
                                </div>
                            </div>
                            <p class="text-green-600 font-semibold">{{ ucfirst($referral->associate->status) }}</p>
                        </div>
                    @empty
                        <div class="bg-white p-4 rounded-lg shadow-md flex items-center justify-between">
                            No User Used Your code yet
                        </div>

                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
