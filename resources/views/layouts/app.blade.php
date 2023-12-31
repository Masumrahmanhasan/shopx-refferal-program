<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('plugins/formvalidation/dist/css/formValidation.css') }}">

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll("pre").forEach((block) => {
                hljs.highlightBlock(block);
                block.classList.add('p-6');
            });
        });
    </script>

</head>

<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100" x-data="{ open: false }">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:pl-3 sm:pr-3">
                @if(Auth::user()->status === 'inactive')
                    <div class="w-full p-6 mx-auto rounded-lg shadow-lg bg-gradient-to-r from-blue-400 to-purple-500">
                        <div class="flex items-center justify-between b-2">
                            @if(!Auth::user()->activation)
                                <div class="flex justify-between items-center">
                                    <div
                                        class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center mr-2">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                             stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                             viewBox="0 0 24 24">
                                            <path d="M20 4a8 8 0 1 1-16 0 8 8 0 0 1 16 0z"></path>
                                            <path d="M11 5h2M12 12v2m0 4h-1"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h2 class="sm:text-base text-2xl font-semibold text-white">
                                            {{ Auth::user()->username }}, আপনার
                                            একাউন্ট অ্যাক্টিভ নয়।</h2>
                                        <p class="sm:text-sm text-white">একাউন্ট অ্যাক্টিভ করতে বাটনে ক্লিক করুন।</p>
                                    </div>

                                </div>
                                <a
                                    href="{{ route('payment.index') }}"
                                    class="px-4 py-2 font-semibold bg-pink-600 hover:bg-pink-700 rounded-md text-white transition duration-300 transform hover:scale-105 focus:outline-none focus:ring focus:ring-pink-300">
                                    Activate Account
                                </a>
                            @else
                                <div class="flex justify-between items-center">
                                    <div
                                        class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center mr-2">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                             stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                             viewBox="0 0 24 24">
                                            <path d="M20 4a8 8 0 1 1-16 0 8 8 0 0 1 16 0z"></path>
                                            <path d="M11 5h2M12 12v2m0 4h-1"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h2 class="sm:text-base text-2xl font-semibold text-white">
                                            {{ Auth::user()->username }}, আপনার
                                            একাউন্ট অ্যাক্টিভ নয়।</h2>
                                        <p class="sm:text-sm text-white">একাউন্ট অ্যাক্টিভ প্রসেস এ আছে অনুগ্রহ করে
                                            অপেক্ষা করুন </p>
                                    </div>

                                </div>
                            @endif


                        </div>
                    </div>
                @endif
                <div class="flex items-start mt-4 gap-5">
                    @include('layouts.sidenavigation')
                    {{ $slot }}
                </div>
            </div>
        </div>
    </main>
</div>

@livewireScripts
@yield('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function uploadAvatar(input) {
        const imageElement = document.getElementById('profile-image');
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                imageElement.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }

        if (input.files && input.files[0]) {
            const form = document.getElementById('avatar');
            form.submit();
        }
    }

    function copyToClipboard(code) {
        console.log(code);
        const referralCode = document.getElementById('referralCode');
        const tempInput = document.createElement('input');
        document.body.appendChild(tempInput);
        tempInput.value = referralCode.textContent;
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);

        alert('Code Copied to clipboard!');
    }
</script>

<script>
    window.addEventListener('clipboard:copy', event => {

        console.log(event.detail[0].text)
        const tempInput = document.createElement('input');
        document.body.appendChild(tempInput);
        tempInput.value = event.detail[0].text;
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        Swal.fire({
            title: 'Copied',
            text: 'Number Copied to Clipboard',
            icon: 'success',
        });
    })

    window.addEventListener('livewire:load', function () {
        console.log('Livewire loaded');

        Livewire.on('openNewTab', url => {
            console.log('Opening new tab with URL:', url);
            window.open(url, '_blank');
        });
    });
</script>

</body>

</html>
