<x-app-layout>    
    {{-- Main Content --}}
    <div class="flex flex-col ml-80 m-4">
        <div class="w-full max-w-full">
            <h1 class="text-2xl lg:text-4xl dark:text-white">Kategori</h1>
            <hr class="mt-4 mb-4 bg-neutral-400/50 dark:bg-neutral-200/50">
            @livewire('pages.dashboard.kategori')
        </div>
        {{-- <div class="w-full max-w-lg mx-auto">
            <canvas id="myChart"></canvas>
        </div> --}}
    </div>
    {{-- <x-slot name="script">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Minuman', 'Makanan', 'Barang', 'Bahan Makanan'],
                    datasets: [{
                        label: 'Total Terjual',
                        data: [12, 19, 22, 10]
                    }]
                }
            });
        </script>
    </x-slot> --}}
</x-app-layout>
