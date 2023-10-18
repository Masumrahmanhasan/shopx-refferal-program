<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profit Work') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 lg:pl-4 w-full">
        <!-- Task Card -->

        @for($i = 0; $i < 3; $i++)
            <div class="relative bg-gradient-to-br from-blue-300 to-indigo-500 p-4 mb-4 rounded-lg shadow-lg flex items-center">
                <!-- Task Image on Left -->
                <img src="https://via.placeholder.com/400x300" alt="Task Image" class="w-1/3 h-64 object-cover object-center rounded-lg shadow-lg">

                <!-- Task Details -->
                <div class="p-6 flex-1 text-white">
                    <h3 class="text-2xl font-semibold">Unique Task Design</h3>
                    <p class="text-lg mt-2">Task Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed convallis tincidunt metus, sit amet malesuada sapien bibendum vel.</p>

                    <!-- Price Tag in Top Right Corner -->
                    <span class="absolute top-2 right-2 bg-pink-600 hover:bg-pink-700 text-white px-3 py-1 rounded-full font-semibold">$30.00</span>

                    <!-- Reddish Gradient Button on the Right -->
                    <div class="flex items-center mt-6">
                        <a href="#" class="bg-gradient-to-r from-purple_light-50 to-purple_light-400 text-white px-4 py-2 rounded-full font-semibold hover:shadow-md transition duration-300 ease-in-out">
                            Take Task
                        </a>
                    </div>
                </div>
            </div>

        @endfor


    </div>


</x-app-layout>
