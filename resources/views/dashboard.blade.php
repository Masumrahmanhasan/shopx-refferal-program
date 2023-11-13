<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex-1" x-data="{ copied: false }">
        <div class="bg-gradient-to-r from-purple-400 to-pink-600 p-6 rounded-lg shadow-lg text-white">
            <h2 class="text-2xl font-semibold mb-4">Your Referral Code</h2>
            <div class="flex items-center justify-between mb-4">
                <p class="text-lg">Share this code with your friends:</p>
                <button onclick="copyToClipboard()"
                        class="px-4 py-2 font-semibold bg-pink-500 hover:bg-pink-600 rounded-md text-white transition duration-300 transform hover:scale-105 focus:outline-none focus:ring focus:ring-pink-300">
                    Copy
                </button>
            </div>
            <div class="bg-white p-2 rounded-md">
                <code id="referralCode" class="text-lg font-bold text-gray-800">{{ auth()->user()->referral_id }}</code>
            </div>

            <p class="mt-4 hidden">When your friends use this code, both of you will receive rewards!</p>
        </div>

        <div class="bg-gradient-to-r from-purple-400 to-pink-600 p-6 rounded-lg shadow-lg text-white mt-5">
            <h2 class="text-2xl font-semibold mb-4">Your Referral Link</h2>
            <div class="flex items-center justify-between mb-4">
                <p class="text-lg">Share this link with your friends:</p>
            </div>
            <div class="bg-white p-2 rounded-md">
                <code id="referralCode" class="text-lg font-bold text-gray-800">{{ auth()->user()->referral_link }}</code>
            </div>

            <p class="mt-4 hidden">When your friends use this code, both of you will receive rewards!</p>
        </div>

        {{-- telegram group join card--}}
        <div class="bg-gray-100">

            <!-- Telegram Group Card -->
            <div class="bg-white rounded-lg shadow-md mt-6">
                <div class="p-4">
                    <!-- Telegram Image -->
                    <img src="https://theshopx.net/assets/files/telegram.png" alt="Telegram Icon"
                         class="w-16 h-16 mx-auto mb-4">

                    <!-- Group Title -->
                    <h3 class="text-2xl font-semibold text-gray-800 text-center">Join Our Telegram Group</h3>

                    <!-- Group Description -->
                    <p class="text-gray-600 text-center mt-4">
                        Stay updated with the latest news and discussions in our Telegram group.
                    </p>

                    <p class="text-gray-700 text-center mt-4">
                        আসসালামুয়ালাইকুম/আদাব,
                        প্রিয়, গ্রাহক- আপনার অবগতির জন্য জানানো যাইতেছে যে, profitwork-bd.com একটি বেকারদের আয়ের অনলাইন
                        প্লাটফর্ম। এখানে 200 টাকা দিয়ে একাউন্ট এক্টিভ করলে আজীবন প্রতিদিন 30 টাকা থেকে সর্বোচ্চ 500 টাকা
                        ইনকাম করতে পারবেন। আপনি যে 200 টাকা দিয়ে একাউন্ট এক্টিভ করবেন এটি (অফেরতযোগ্য) এবং এই টাকা দিয়ে
                        গরীব অসহায় মানুষের কল্যাণে ব্যয় করা হবে, এবং এই সব ব্যায়ের আপডেট আমাদের অফিশিয়াল টেলিগ্রাম
                        গ্রুপে দেখতে পাবেন। আর অতিশ্রীঘই আমাদের ওয়েবসাইটে ফ্রীলান্সিং মেনু এড করা হবে, যা থেকে খুব সহজে
                        প্রতি মাসে 5 থেকে 10 হাজার টাকা বাড়তি আয় করতে পারবেন। আর এছাড়াও রেফার করে 1st জেনারেশন থেকে 3rd
                        জেনারেশন পর্যন্ত কমিশন পাবেন। তাই দেরী না করে একাউন্ট একটিভ করে কাজ শুরু করুন।
                    </p>

                    <!-- Join Button -->
                    <a href="https://t.me/your_telegram_group"
                       class="block bg-blue-500  bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-indigo-500 hover:to-blue-500  px-6 py-3  hover:shadow-md transition duration-300 ease-in-out text-white  rounded-full mt-6 text-center font-semibold hover:bg-blue-600"
                       target="_blank" rel="noopener noreferrer">
                        Join Now
                    </a>
                </div>
            </div>
        </div>

    </div>

    <script>
        function copyToClipboard() {
            const referralCode = document.getElementById('referralCode');
            const tempInput = document.createElement('input');
            document.body.appendChild(tempInput);
            tempInput.value = referralCode.textContent;
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);

            alert('Copied to clipboard!');
        }
    </script>

</x-app-layout>
