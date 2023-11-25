<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('payment.index') }}
        </h2>
    </x-slot>

    {{-- grid grid-cols-1 ml-5  --}}

    <div class="w-full divide-y divide-slate-200 border border-slate-200 bg-white p-5 rounded-lg">

        <h3 class="text-center"> Account Activation</h3>

        <div class="my-5 bg-[#2196f3] p-5 rounded-lg text-center">
            <img src="/images/question-mark.png" alt="" class="m-auto">
            <h5 class="text-white text-xl mt-4">প্রথমে যে মাধ্যমে টাকা পাঠাতে চান সেটি সিলেক্ট করুন *</h5>
        </div>

        <div class="">

            <div class=" mt-5 antialiased">
                <div class="relative flex flex-col rounded-lg shadow-xs">

                    <livewire:payment-section/>
                </div>
            </div>

        </div>

    </div>

</x-app-layout>
