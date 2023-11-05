<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Frequently Ask Question') }}
        </h2>
    </x-slot>

    {{-- grid grid-cols-1 ml-5  --}}

    <div class="w-full divide-y divide-slate-200 rounded border border-slate-200 bg-white">

        @foreach($faqs as $faq)
            <details class="group p-4" close>
                <summary
                    class="relative flex cursor-pointer list-none gap-4 pr-8 font-medium text-slate-700 focus-visible:outline-none group-hover:text-slate-800 ">
                    <h3 class="font-bold text-xl">{{ $faq->title }}?</h3>
                    <div
                        class="absolute right-0 top-1 h-4 w-4 stroke-slate-700 transition duration-300 group-open:rotate-45">
                        <img src="/images/plus.png" alt="">
                    </div>
                </summary>
                <p class="mt-4 text-slate-500">
                    {{ $faq->description }}
                </p>
            </details>
        @endforeach

    </div>
</x-app-layout>
