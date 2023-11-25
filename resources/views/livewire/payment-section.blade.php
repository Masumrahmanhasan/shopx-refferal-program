<div>
    <div class="sm:block md:flex bg-white border-b border-gray-200 gap-5 justify-center">

        <button type="button"
                class="sm:w-full lg: w-1/4 focus:outline-none text-gray-400 hover:text-gray-500 py-2 px-1 border-t-2 text-sm tracking-wide font-medium border-transparent rounded-xl mb-6"
                wire:click="changeTab(1)">

            <div class="bg-white shadow-lg rounded-xl">
                <img src="/images/bkash.png" alt="" class="w-32 rounded-xl p-4 m-auto">
                <h4 class="bg-[#d12053] py-2 px-4 rounded-xl text-xl text-white">বিকাশ</h4>
            </div>

        </button>

        <button type="button"
                class="sm:w-full lg: w-1/4 focus:outline-none text-gray-400 hover:text-gray-500 py-2 px-1 border-t-2 text-sm tracking-wide font-medium border-transparent rounded-xl mb-6"
                wire:click="changeTab(2)">

            <div class="bg-white shadow-lg rounded-xl">
                <img src="/images/nagod.png" alt="" class="w-32 rounded-xl p-4 m-auto">
                <h4 class="bg-[#f6921e] py-2 px-4 rounded-xl text-xl text-white">নগদ</h4>
            </div>

        </button>

    </div>

    <div class="">

        @if($tab === 1)
            <div class="bg-[#60a5fa] mt-5 mb-5 p-7 rounded-xl text-center sm:px-4 py-5">

                <h3 class="text-xl text-white border-b border-solid border-white pb-5 mb-5 sm:text-lg">
                    নিচের বিকাশ
                    নাম্বারটি কপি করে আপনার বিকাশ এপ্স থেকে পাশে উল্লেখিত ফি Make Payment করুন। আপনার
                    {{ env('BKASH_PAYMENT_TYPE') }} এর পরিমান: ৳{{ env('ACTIVATION_AMOUNT') }}</h3>

                <div class="bg-white shadow-lg rounded-xl">
                    <img src="/images/bkash.png" alt="" class="w-32 rounded-xl p-4 m-auto">
                    <h4 class="bg-[#d12053] py-2 px-4 rounded-xl text-xl text-white">বিকাশ</h4>
                </div>

                <h4 class="text-xl text-white mt-4">যে নম্বরে টাকা পাঠাবেন :
                    ({{ env('BKASH_PAYMENT_TYPE') }})</h4>

                <h5
                    class="flex gap-3 items-center justify-center bg-[#232323] p-5 mt-4 rounded-xl text-2xl text-white">
                    {{ get_settings('bkash') }}
                    <button wire:click="copyToClipboard('{{ get_settings('bkash') }}')">
                        <img src="/images/copy.png" alt="">
                    </button>
                </h5>

                <p class="mt-5 text-white">
                    উপরের বিকাশ নাম্বারে উল্লেখিত ফি {{ env('BKASH_PAYMENT_TYPE') }} করার পর নিচের ২ টা
                    খালি ঘর পূরন করুন। ১ম
                    খালি ঘরে আপনার বিকাশ নাম্বারটি দিন। ২য় খালি ঘরে আপনি
                    ফি {{ env('BKASH_PAYMENT_TYPE') }} করার পর {{ env('BKASH_PAYMENT_TYPE') }} করা
                    মেসেজের ট্রানজেকশন নাম্বারটি কপি করে এখানে দিন এর পর ভেরিফাই এ ক্লীক করুন।
                </p>

            </div>
        @endif
        @if($tab === 2)
            <div class="bg-[#FF5C00] mt-5 mb-5 p-7 rounded-xl text-center sm:px-4 py-5">

                <h3 class="text-xl text-white border-b border-solid border-white pb-5 mb-5 sm:text-lg">
                    নিচের নগদ
                    নাম্বারটি কপি করে আপনার নগদ এপ্স থেকে পাশে উল্লেখিত
                    ফি {{ env('NAGAD_PAYMENT_TYPE') }} করুন। আপনার
                    {{ env('NAGAD_PAYMENT_TYPE') }} এর পরিমান: ৳{{ env('ACTIVATION_AMOUNT') }}</h3>

                <div class="bg-white shadow-lg rounded-xl">
                    <img src="/images/nagod.png" alt="" class="w-32 rounded-xl p-4 m-auto">
                    <h4 class="bg-[#f6921e] py-2 px-4 rounded-xl text-xl text-white">নগদ</h4>
                </div>

                <h4 class="text-xl text-white mt-4">যে নম্বরে টাকা পাঠাবেন :
                    ({{ env('NAGAD_PAYMENT_TYPE') }})</h4>

                <h5
                    class="flex gap-3 items-center justify-center bg-[#232323] p-5 mt-4 rounded-xl text-2xl text-white">
                    {{ get_settings('nagad') }}
                    <button wire:click="copyToClipboard('{{ get_settings('nagad') }}')">
                        <img src="/images/copy.png" alt="">
                    </button>
                </h5>

                <p class="mt-5 text-white">
                    উপরের নগদ নাম্বারে উল্লেখিত ফি {{ env('NAGAD_PAYMENT_TYPE') }} করার পর নিচের ২ টা
                    খালি ঘর পূরন করুন। ১ম
                    খালি ঘরে আপনার নগদ নাম্বারটি দিন। ২য় খালি ঘরে আপনি
                    ফি {{ env('NAGAD_PAYMENT_TYPE') }} করার পর {{ env('NAGAD_PAYMENT_TYPE') }} করা
                    মেসেজের ট্রানজেকশন নাম্বারটি কপি করে এখানে দিন এর পর ভেরিফাই এ ক্লীক করুন।
                </p>

            </div>
        @endif

        @if($tab === 1 || $tab === 2)
            <div class="p-6 bg-white rounded-xl shadow-lg border border-solid border-[#2196f3]">
                <form wire:submit.prevent="verifyPayment" method="POST">
                    <div class="w-3/4 m-auto sm:w-full">
                        <div class="mb-5">
                            <label class="text-sm">@if($tab === 1)বিকাশ @else নগদ @endif এর কোন নম্বর থেকে টাকা পাঠিয়েছেন? <span
                                    class="text-red-600 text-lg">*</span></label>
                            <input type="text"
                                   wire:model="account"
                                   placeholder="বিকাশ এর যে নম্বর থেকে টাকা পাঠিয়েছেন সেটি দিন"
                                   class="w-full rounded-lg mt-2 text-sm py-3 px-5">

                            @error('account')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="">
                            <label class="text-sm">@if($tab === 1)বিকাশ @else নগদ @endif -পেমেন্ট এর ট্রান্সাকশন নম্বরটি কত? <span
                                    class="text-red-600 text-lg">*</span> </label>
                            <input type="text" wire:model="trxn_id"
                                   placeholder="পেমেন্ট এর ট্রান্সাকশন নম্বরটি প্রদান করুন"
                                   class="w-full rounded-lg mt-2 text-sm py-3 px-5">
                            @error('trxn_id')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <p class="mt-5 text-center text-lg text-[#2196f3] sm:text-base">
                            পেমেন্ট এর তথ্য সঠিক কিনা তা ভেরিভাই করতে নিচের <span
                                class="text-[#ffa000] text-xl font-bold sm:text-lg">Verify Payment</span>
                            বাটনে ক্লিক
                            করুন।
                        </p>

                        <div class="text-center">
                            <button type="submit"
                                    class="mt-5 m-auto bg-[#FF5C00] py-2 px-5 rounded-md text-white">
                                Verify
                                Payment
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        @endif
    </div>

</div>
