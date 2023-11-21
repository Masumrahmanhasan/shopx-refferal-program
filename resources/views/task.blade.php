<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profit Work') }}
        </h2>
    </x-slot>

    <livewire:task-list/>

</x-app-layout>
