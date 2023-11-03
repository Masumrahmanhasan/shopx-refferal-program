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

            <div x-data="{ tab: 1 }" x-cloak class=" mt-5 antialiased">
                <div class="relative flex flex-col rounded-lg shadow-xs">

                    {{-- lg: flex  --}}
                    <div class="sm:block md:flex bg-white border-b border-gray-200 gap-5 justify-center">
                        {{-- bkash --}}
                        <button type="button"
                            class="sm:w-full lg: w-1/4 focus:outline-none text-gray-400 hover:text-gray-500 py-2 px-1 border-t-2 text-sm tracking-wide font-medium border-transparent rounded-xl mb-6"
                            x-on:click="tab = 1"
                            :class="{ 'text-gray-700 border-indigo-500 border-2 border-solid border-[#d12053] ': tab === 1 }">

                            <div class="bg-white shadow-lg rounded-xl">
                                <img src="/images/bkash.png" alt="" class="w-32 rounded-xl p-4 m-auto">
                                <h4 class="bg-[#d12053] py-2 px-4 rounded-xl text-xl text-white">বিকাশ</h4>
                            </div>

                        </button>

                        {{-- Nagod --}}
                        <button type="button"
                            class="sm:w-full lg: w-1/4 focus:outline-none text-gray-400 hover:text-gray-500 py-2 px-1 border-t-2 text-sm tracking-wide font-medium border-transparent rounded-xl mb-6"
                            x-on:click="tab = 2"
                            :class="{ 'text-gray-700 border-indigo-500  border-2 border-solid border-[#f6921e]': tab === 2 }">

                            <div class="bg-white shadow-lg rounded-xl">
                                <img src="/images/nagod.png" alt="" class="w-32 rounded-xl p-4 m-auto">
                                <h4 class="bg-[#f6921e] py-2 px-4 rounded-xl text-xl text-white">নগদ</h4>
                            </div>

                        </button>

                        {{-- Rocket --}}
                        <button type="button"
                            class="sm:w-full lg: w-1/4 focus:outline-none text-gray-400 hover:text-gray-500 py-2 px-1 border-t-2 text-sm tracking-wide font-medium border-transparent rounded-xl mb-6"
                            x-on:click="tab = 3"
                            :class="{ 'text-gray-700 border-indigo-500 border-2 border-solid border-[#8c3492]': tab === 3 }">

                            <div class="bg-white shadow-lg rounded-xl">
                                <img src="/images/rocket.png" alt="" class="w-32 rounded-xl p-4 m-auto">
                                <h4 class="bg-[#8c3492] py-2 px-4 rounded-xl text-xl text-white">রকেট</h4>
                            </div>

                        </button>
                    </div>

                    <div class="">

                        {{-- Bkash --}}
                        <div x-show="tab === 1">

                            {{-- item --}}
                            <div class="bg-[#FF5C00] mt-5 mb-5 p-7 rounded-xl text-center sm:px-4 py-5">

                                <h3 class="text-xl text-white border-b border-solid border-white pb-5 mb-5 sm:text-lg">
                                    নিচের বিকাশ
                                    নাম্বারটি কপি করে আপনার বিকাশ এপ্স থেকে পাশে উল্লেখিত ফি সেন্ড মানি করুন। আপনার
                                    পেমেন্ট এর পরিমান: ৳100</h3>

                                <div class="bg-white shadow-lg rounded-xl">
                                    <img src="/images/bkash.png" alt="" class="w-32 rounded-xl p-4 m-auto">
                                    <h4 class="bg-[#d12053] py-2 px-4 rounded-xl text-xl text-white">বিকাশ</h4>
                                </div>

                                <h4 class="text-xl text-white mt-4">যে নম্বরে টাকা পাঠাবেন : (Send Money)</h4>

                                <h5
                                    class="flex gap-3 items-center justify-center bg-[#232323] p-5 mt-4 rounded-xl text-2xl text-white">
                                    01976630646
                                    <button>
                                        <img src="/images/copy.png" alt="">
                                    </button>
                                </h5>

                                <p class="mt-5 text-white">
                                    উপরের বিকাশ নাম্বারে উল্লেখিত ফি সেন্ড মানি করার পর নিচের ২ টা খালি ঘর পূরন করুন। ১ম
                                    খালি ঘরে আপনার বিকাশ নাম্বারটি দিন। ২য় খালি ঘরে আপনি ফি সেন্ড মানি করার পর সেন্ড
                                    মানি করা মেসেজের ট্রানজেকশন নাম্বারটি কপি করে এখানে দিন এর পর ভেরিফাই এ ক্লীক করুন।
                                </p>

                            </div>

                            {{-- item --}}
                            <div class="p-6  bg-white rounded-xl shadow-lg border border-solid border-[#2196f3]">

                                <div class="w-3/4 m-auto sm:w-full">
                                    <div class="mb-5">
                                        <label class="text-sm">বিকাশ এর কোন নম্বর থেকে টাকা পাঠিয়েছেন? <span
                                                class="text-red-600 text-lg">*</span></label>
                                        <input type="text"
                                            placeholder="বিকাশ এর যে নম্বর থেকে টাকা পাঠিয়েছেন সেটি দিন"
                                            class="w-full rounded-lg mt-2 text-sm py-3 px-5">
                                    </div>

                                    <div class="">
                                        <label class="text-sm">বিকাশ -পেমেন্ট এর ট্রান্সাকশন নম্বরটি কত? <span
                                                class="text-red-600 text-lg">*</span> </label>
                                        <input type="text" placeholder="পেমেন্ট এর ট্রান্সাকশন নম্বরটি প্রদান করুন"
                                            class="w-full rounded-lg mt-2 text-sm py-3 px-5">
                                    </div>

                                    <p class="mt-5 text-center text-lg text-[#2196f3] sm:text-base">
                                        পেমেন্ট এর তথ্য সঠিক কিনা তা ভেরিভাই করতে নিচের <span
                                            class="text-[#ffa000] text-xl font-bold sm:text-lg">Verify Payment</span>
                                        বাটনে ক্লিক
                                        করুন।
                                    </p>

                                    <div class="text-center">
                                        <button type="submit"
                                            class="mt-5 m-auto bg-[#FF5C00] py-2 px-5 rounded-md text-white">Verify
                                            Payment</button>
                                    </div>

                                </div>

                            </div>

                        </div>

                        {{-- Nagod --}}
                        <div x-show="tab === 2">

                            {{-- item --}}
                            <div class="bg-[#FF5C00] mt-5 mb-5 p-7 rounded-xl text-center sm:px-4 py-5">

                                <h3 class="text-xl text-white border-b border-solid border-white pb-5 mb-5 sm:text-lg">
                                    নিচের বিকাশ
                                    নাম্বারটি কপি করে আপনার বিকাশ এপ্স থেকে পাশে উল্লেখিত ফি সেন্ড মানি করুন। আপনার
                                    পেমেন্ট এর পরিমান: ৳100</h3>

                                    <div class="bg-white shadow-lg rounded-xl">
                                        <img src="/images/nagod.png" alt="" class="w-32 rounded-xl p-4 m-auto">
                                        <h4 class="bg-[#f6921e] py-2 px-4 rounded-xl text-xl text-white">নগদ</h4>
                                    </div>

                                <h4 class="text-xl text-white mt-4">যে নম্বরে টাকা পাঠাবেন : (Send Money)</h4>

                                <h5
                                    class="flex gap-3 items-center justify-center bg-[#232323] p-5 mt-4 rounded-xl text-2xl text-white">
                                    01976630646
                                    <button>
                                        <img src="/images/copy.png" alt="">
                                    </button>
                                </h5>

                                <p class="mt-5 text-white">
                                    উপরের বিকাশ নাম্বারে উল্লেখিত ফি সেন্ড মানি করার পর নিচের ২ টা খালি ঘর পূরন করুন। ১ম
                                    খালি ঘরে আপনার বিকাশ নাম্বারটি দিন। ২য় খালি ঘরে আপনি ফি সেন্ড মানি করার পর সেন্ড
                                    মানি করা মেসেজের ট্রানজেকশন নাম্বারটি কপি করে এখানে দিন এর পর ভেরিফাই এ ক্লীক করুন।
                                </p>

                            </div>

                            {{-- item --}}
                            <div class="p-6  bg-white rounded-xl shadow-lg border border-solid border-[#2196f3]">

                                <div class="w-3/4 m-auto sm:w-full">
                                    <div class="mb-5">
                                        <label class="text-sm">নগদ এর কোন নম্বর থেকে টাকা পাঠিয়েছেন? <span
                                                class="text-red-600 text-lg">*</span></label>
                                        <input type="text"
                                            placeholder="নগদ এর যে নম্বর থেকে টাকা পাঠিয়েছেন সেটি দিন"
                                            class="w-full rounded-lg mt-2 text-sm py-3 px-5">
                                    </div>

                                    <div class="">
                                        <label class="text-sm">নগদ -পেমেন্ট এর ট্রান্সাকশন নম্বরটি কত? <span
                                                class="text-red-600 text-lg">*</span> </label>
                                        <input type="text" placeholder="পেমেন্ট এর ট্রান্সাকশন নম্বরটি প্রদান করুন"
                                            class="w-full rounded-lg mt-2 text-sm py-3 px-5">
                                    </div>

                                    <p class="mt-5 text-center text-lg text-[#2196f3] sm:text-base">
                                        পেমেন্ট এর তথ্য সঠিক কিনা তা ভেরিভাই করতে নিচের <span
                                            class="text-[#ffa000] text-xl font-bold sm:text-lg">Verify Payment</span>
                                        বাটনে ক্লিক
                                        করুন।
                                    </p>

                                    <div class="text-center">
                                        <button type="submit"
                                            class="mt-5 m-auto bg-[#FF5C00] py-2 px-5 rounded-md text-white">Verify
                                            Payment</button>
                                    </div>

                                </div>

                            </div>

                        </div>

                        {{-- Rocket --}}
                        <div x-show="tab === 3">

                            {{-- item --}}
                            <div class="bg-[#FF5C00] mt-5 mb-5 p-7 rounded-xl text-center sm:px-4 py-5">

                                <h3 class="text-xl text-white border-b border-solid border-white pb-5 mb-5 sm:text-lg">
                                    নিচের বিকাশ
                                    নাম্বারটি কপি করে আপনার বিকাশ এপ্স থেকে পাশে উল্লেখিত ফি সেন্ড মানি করুন। আপনার
                                    পেমেন্ট এর পরিমান: ৳100</h3>

                                    <div class="bg-white shadow-lg rounded-xl">
                                        <img src="/images/rocket.png" alt="" class="w-32 rounded-xl p-4 m-auto">
                                        <h4 class="bg-[#8c3492] py-2 px-4 rounded-xl text-xl text-white">রকেট</h4>
                                    </div>

                                <h4 class="text-xl text-white mt-4">যে নম্বরে টাকা পাঠাবেন : (Send Money)</h4>

                                <h5
                                    class="flex gap-3 items-center justify-center bg-[#232323] p-5 mt-4 rounded-xl text-2xl text-white">
                                    01976630646
                                    <button>
                                        <img src="/images/copy.png" alt="">
                                    </button>
                                </h5>

                                <p class="mt-5 text-white">
                                    উপরের বিকাশ নাম্বারে উল্লেখিত ফি সেন্ড মানি করার পর নিচের ২ টা খালি ঘর পূরন করুন। ১ম
                                    খালি ঘরে আপনার বিকাশ নাম্বারটি দিন। ২য় খালি ঘরে আপনি ফি সেন্ড মানি করার পর সেন্ড
                                    মানি করা মেসেজের ট্রানজেকশন নাম্বারটি কপি করে এখানে দিন এর পর ভেরিফাই এ ক্লীক করুন।
                                </p>

                            </div>

                            {{-- item --}}
                            <div class="p-6  bg-white rounded-xl shadow-lg border border-solid border-[#2196f3]">

                                <div class="w-3/4 m-auto sm:w-full">
                                    <div class="mb-5">
                                        <label class="text-sm">রকেট এর কোন নম্বর থেকে টাকা পাঠিয়েছেন? <span
                                                class="text-red-600 text-lg">*</span></label>
                                        <input type="text"
                                            placeholder="রকেট এর যে নম্বর থেকে টাকা পাঠিয়েছেন সেটি দিন"
                                            class="w-full rounded-lg mt-2 text-sm py-3 px-5">
                                    </div>

                                    <div class="">
                                        <label class="text-sm">রকেট -পেমেন্ট এর ট্রান্সাকশন নম্বরটি কত? <span
                                                class="text-red-600 text-lg">*</span> </label>
                                        <input type="text" placeholder="পেমেন্ট এর ট্রান্সাকশন নম্বরটি প্রদান করুন"
                                            class="w-full rounded-lg mt-2 text-sm py-3 px-5">
                                    </div>

                                    <p class="mt-5 text-center text-lg text-[#2196f3] sm:text-base">
                                        পেমেন্ট এর তথ্য সঠিক কিনা তা ভেরিভাই করতে নিচের <span
                                            class="text-[#ffa000] text-xl font-bold sm:text-lg">Verify Payment</span>
                                        বাটনে ক্লিক
                                        করুন।
                                    </p>

                                    <div class="text-center">
                                        <button type="submit"
                                            class="mt-5 m-auto bg-[#FF5C00] py-2 px-5 rounded-md text-white">Verify
                                            Payment</button>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>


    </div>




</x-app-layout>
