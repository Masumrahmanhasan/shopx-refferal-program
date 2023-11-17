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
                <livewire:withdraw-balance />

            </div>
        </div>
    </div>

</x-app-layout>



