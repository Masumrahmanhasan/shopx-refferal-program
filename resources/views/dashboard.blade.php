<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex-1" x-data="{ copied: false }">

        {{-- telegram group join card--}}
        <div class="bg-gray-100">

            <!-- Telegram Group Card -->
            <div class="bg-white rounded-lg shadow-md ">
                <div class="p-4">
                    <!-- Telegram Image -->

                    <p class="text-gray-700 text-center mt-4">
                        {{ get_settings('telegram_content') }}
                    </p>

                    <img src="https://theshopx.net/assets/files/telegram.png" alt="Telegram Icon"
                         class="w-16 h-16 mx-auto mb-4">

                    <p class="text-gray-600 text-center mt-4">
                        Stay updated with the latest news and discussions in our Telegram group.
                    </p>

                    <h3 class="text-2xl font-semibold text-gray-800 text-center">Join Our Telegram Group</h3>

                    <!-- Join Button -->
                    <a href="https://t.me/profitworkbd"
                       class="block bg-blue-500  bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-indigo-500 hover:to-blue-500  px-6 py-3  hover:shadow-md transition duration-300 ease-in-out text-white  rounded-full mt-6 text-center font-semibold hover:bg-blue-600"
                       target="_blank" rel="noopener noreferrer">
                        Join Now
                    </a>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
