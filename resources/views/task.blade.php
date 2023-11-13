<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profit Work') }}
        </h2>
    </x-slot>

    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach($tasks as $task)
            <div class="border-2 border-solid border-[#CACACA] rounded-2xl bg-white shadow-md">

                <div class="relative">
                    <img src="{{ $task->thumbnail }}" alt="" class="rounded-t-xl">
                    <span class="absolute bottom-4 right-3 bg-[#F2BA11] py-1 px-3 rounded-full">৳ {{ $task->price }}</span>
                </div>

                <div class="p-5">
                    <h3 class="text-lg font-bold">{{ $task->title }}</h3>
                    <p class="mt-2 text-sm text-[#444]">{{ $task->description }}</p>

                    <a href="{{ route('task.take', $task) }}"
                       class="block mt-4 w-full text-center bg-[#7F4DCA] py-2 text-white rounded-lg"
                    target="__blank">Take Task</a>
                </div>
            </div>
        @endforeach
            <div class="grid min-h-[140px] w-full place-items-end overflow-x-scroll rounded-lg p-6 lg:overflow-visible">
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
    </div>



</x-app-layout>
