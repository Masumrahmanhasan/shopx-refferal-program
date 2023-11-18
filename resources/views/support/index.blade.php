<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Support') }}
        </h2>
    </x-slot>

    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">

        @foreach($supports as $support)
            <div class="bg-white rounded-lg shadow-md p-5">
                <!-- Group Title -->
                <div class="text-center mb-5">
                    @if($support->type === 'telegram')
                    <img src="/images/telegram.png" alt="Telegram Icon" class="m-auto">
                    @else
                        <img src="/images/whatsapp.png" alt="Telegram Icon" class="m-auto">
                    @endif
                </div>

                <div class="">
                    <!-- Group Title -->
                    <h3 class="text-2xl font-semibold text-gray-800 text-center">{{ $support->title }}</h3>

                    <!-- Group Description -->
                    <p class="text-gray-600 text-center mt-4">
                        {{ $support->description }}
                    </p>
                    @if($support->type === 'telegram')
                    <a href="https://t.me/{{ $support->username }}"
                       class="block bg-blue-500 bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-indigo-500 hover:to-blue-500 text-white px-6 py-3 rounded-full font-semibold hover:shadow-md transition duration-300 ease-in-out text-white px-4 py-2 rounded-full mt-6 text-center font-semibold hover:bg-blue-600"
                       target="_blank" rel="noopener noreferrer">
                        Join Now
                    </a>
                    @else
                        <a href="https://wa.me/{{ $support->username }}"
                           class="block bg-blue-500 bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-indigo-500 hover:to-blue-500 text-white px-6 py-3 rounded-full font-semibold hover:shadow-md transition duration-300 ease-in-out text-white px-4 py-2 rounded-full mt-6 text-center font-semibold hover:bg-blue-600"
                           target="_blank" rel="noopener noreferrer">
                            Join Now
                        </a>
                    @endif
                </div>


            </div>
        @endforeach

    </div>

</x-app-layout>
