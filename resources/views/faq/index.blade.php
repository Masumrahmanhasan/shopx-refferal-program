<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Support Ticket') }}
        </h2>
    </x-slot>

    {{-- grid grid-cols-1 ml-5  --}}

    <div class="w-full divide-y divide-slate-200 rounded border border-slate-200 bg-white">

        <details class="group p-4" open>
            <summary
                class="relative flex cursor-pointer list-none gap-4 pr-8 font-medium text-slate-700 focus-visible:outline-none group-hover:text-slate-800 ">
                <h3 class="font-bold text-xl">Do you sell advertising on your site?</h3>
                <div
                    class="absolute right-0 top-1 h-4 w-4 stroke-slate-700 transition duration-300 group-open:rotate-45">
                    <img src="/images/plus.png" alt="">
                </div>
            </summary>
            <p class="mt-4 text-slate-500">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos commodi
                animi placeat! Itaque iure obcaecati laborum quis ex quo aliquam deserunt! Fuga possimus quaerat est
                eveniet? Earum sed possimus dolorum.
            </p>
        </details>
        <details class="group p-4">
            <summary
                class="relative flex cursor-pointer list-none gap-4 pr-8 font-medium text-slate-700 focus-visible:outline-none group-hover:text-slate-800 [&::-webkit-details-marker]:hidden">
                <h3 class="font-bold text-xl">Why are some titles discounted while others are not?</h3>
                <div
                    class="absolute right-0 top-1 h-4 w-4 stroke-slate-700 transition duration-300 group-open:rotate-45">
                    <img src="/images/plus.png" alt="">
                </div>
            </summary>
            <p class="mt-4 text-slate-500">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos commodi
                animi placeat! Itaque iure obcaecati laborum quis ex quo aliquam deserunt! Fuga possimus quaerat est
                eveniet? Earum sed possimus dolorum.</p>
        </details>

        <details class="group p-4">
            <summary
                class="relative flex cursor-pointer list-none gap-4 pr-8 font-medium text-slate-700 focus-visible:outline-none group-hover:text-slate-800 [&::-webkit-details-marker]:hidden">
                <h3 class="font-bold text-xl">Why are some titles discounted while others are not?</h3>
                <div
                    class="absolute right-0 top-1 h-4 w-4 stroke-slate-700 transition duration-300 group-open:rotate-45">
                    <img src="/images/plus.png" alt="">
                </div>
            </summary>
            <p class="mt-4 text-slate-500">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos commodi
                animi placeat! Itaque iure obcaecati laborum quis ex quo aliquam deserunt! Fuga possimus quaerat est
                eveniet? Earum sed possimus dolorum.</p>
        </details>



    </div>




</x-app-layout>
