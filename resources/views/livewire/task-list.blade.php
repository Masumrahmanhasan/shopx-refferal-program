<div>
    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach($tasks as $task)
            <div class="border-2 border-solid border-[#CACACA] rounded-2xl bg-white shadow-md" wire:key="{{ $task->id }}">

                <div class="relative">
                    <img src="{{ $task->thumbnail }}" alt="" class="rounded-t-xl">
                    <span
                        class="absolute bottom-4 right-3 bg-[#F2BA11] py-1 px-3 rounded-full">৳ {{ $task->price }}</span>
                </div>

                <div class="p-5">
                    <h3 class="text-lg font-bold">{{ $task->title }}</h3>
                    <p class="mt-2 text-sm text-[#444]">{{ $task->description }}</p>

                    <button wire:click="completeTask({{ $task }})"
                       class="block mt-4 w-full text-center bg-[#7F4DCA] py-2 text-white rounded-lg">Take Task</button>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('openNewTab', url => {
            // Open the URL in a new tab
            window.open(url, '_blank');
        });
    });
</script>
