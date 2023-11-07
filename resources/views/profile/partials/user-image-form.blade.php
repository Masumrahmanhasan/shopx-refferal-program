<section class="space-y-6">

    <div class="flex items-center gap-5">

        <div class="">
            <img id="profile-image" src="{{ auth()->user()->avatar ?? 'https://demo.activeitzone.com/ecommerce/public/assets/img/avatar-place.png' }}" alt="" class="h-28 w-28 rounded-full">
        </div>

        <form id="avatar" action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="">
                <h4>ছবি অবশ্যই 150*150 px হতে হবে</h4>
                <input type="file" class="hidden" name="avatar" id="file-upload" onchange="uploadAvatar(this)">
                <button type="button" onclick="document.getElementById('file-upload').click()"
                        class="mt-3 py-3 px-6 rounded-lg bg-[#7E57C2] text-white">ছবি আপলোড করুন</button>
            </div>
        </form>
    </div>

</section>
