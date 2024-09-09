<x-app-layout>
    {{-- Main Content --}}
    <div class="flex flex-col ml-80 m-4">
        <div class="w-full max-w-full">
            <h1 class="text-2xl lg:text-4xl dark:text-white">Pesanan</h1>
            <hr class="mt-4 mb-4 bg-neutral-400/50 dark:bg-neutral-200/50">
            @livewire('pages.dashboard.pesanan')
        </div>
    </div>
</x-app-layout>
