<x-app-layout>    
    {{-- Main Content --}}
    <div class="flex flex-col ml-80 m-4">
        <div class="w-full max-w-full">
            <h1 class="text-2xl lg:text-4xl dark:text-white">Dashboard</h1>
            <hr class="mt-4 mb-4 bg-neutral-400/50 dark:bg-neutral-200/50">
            <div class="w-full grid grid-cols-3 gap-2">
                <div class="border rounded-md px-4 py-2 flex flex-col border-neutral-400/50 dark:border-neutral-200/50">
                    <h1 class="dark:text-white">Total Products</h1>
                    <p class="dark:text-white text-2xl lg:text-4xl">0x</p>
                    <a class="dark:text-white hover:underline hover:cursor-pointer">Detail Product &#11246;</a>
                </div>
                <div class="border rounded-md px-4 py-2 border-neutral-400/50 dark:border-neutral-200/50">
                    <h1 class="dark:text-white">Test</h1>
                </div>
                <div class="border rounded-md px-4 py-2 border-neutral-400/50 dark:border-neutral-200/50">
                    <h1 class="dark:text-white">Test</h1>
                </div>
            </div>
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
