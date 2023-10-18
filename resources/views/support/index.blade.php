<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Support Ticket') }}
        </h2>
    </x-slot>

    <div class="flex-1 sm:pl-0 lg:pl-4">

        @for($i = 0; $i < 5; $i++)
        <div class="bg-gradient-to-r from-blue-400 mb-4 p-4 rounded-lg shadow-md text-white to-purple-500">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold">Support Ticket #12345</h2>
                    <p class="text-gray-200">Created on Oct 16, 2023</p>
                </div>
                <div class="bg-pink-600 hover:bg-pink-700 text-white rounded-full px-4 py-2">
                    Open
                </div>
            </div>
            <p class="mt-2">This is a brief description of the support ticket. It can provide additional details about the issue or request.</p>
            <div class="mt-4 flex justify-between items-center">
                <div>
                    <span class="text-blue-200">Assigned to:</span> John Doe
                </div>
                <div>
                    <a href="#" class="text-white hover:underline">View Details</a>
                </div>
            </div>
        </div>
        @endfor
    </div>

</x-app-layout>
