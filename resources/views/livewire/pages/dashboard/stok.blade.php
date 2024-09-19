<div x-data="{ modal: false }">
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border rounded-lg divide-y divide-gray-200 dark:border-neutral-700 dark:divide-neutral-700">
                    <div class="py-3 px-4 flex flex-row justify-between">
                        <div class="relative max-w-xs ">
                            <label class="sr-only">Search</label>
                            <form action="" method="GET">
                                <input name="keyword" type="text" name="hs-table-with-pagination-search"
                                    id="hs-table-with-pagination-search"
                                    class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="Search for supplier">
                            </form>
                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                                <svg class="size-4 text-gray-400 dark:text-neutral-500"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.3-4.3"></path>
                                </svg>
                            </div>
                        </div>
                        <button @click="modal = true"
                            class="bg-neutral-600/50 text-neutral-200/100 hover:bg-neutral-500 hover:text-neutral-50/100 dark:bg-green-400/50 dark:hover:bg-green-600/50 dark:text-white rounded-full px-2 py-2">Tambah
                            Stok</button>
                    </div>
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead class="bg-gray-50 dark:bg-neutral-700">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Product</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Supplier</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Jumlah</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Keterangan</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($stoks as $item)
                                    <tr>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            Oke</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            Oke</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            Oke</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            Oke</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <div class="flex flex-row gap-2">
                                                <button
                                                    class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">Edit</button>
                                                <button
                                                    class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-none focus:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:hover:text-red-400 dark:focus:text-red-400">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="py-1 px-4">
                        <nav class="flex items-center space-x-1" aria-label="Pagination">
                            @if ($stoks->onFirstPage())
                                <span
                                    class="p-2.5 min-w-[40px] inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-400 dark:text-gray-600 disabled:opacity-50">«</span>
                            @else
                                <button wire:click="previousPage"
                                    class="p-2.5 min-w-[40px] inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                    aria-label="Previous">«</button>
                            @endif

                            @foreach ($stoks->getUrlRange(1, $stoks->lastPage()) as $page => $url)
                                @if ($page == $stoks->currentPage())
                                    <span
                                        class="min-w-[40px] flex justify-center items-center text-sm rounded-full bg-gray-200 dark:bg-neutral-700 text-gray-800 dark:text-white py-2.5">
                                        {{ $page }}
                                    </span>
                                @else
                                    <button wire:click="gotoPage({{ $page }})"
                                        class="min-w-[40px] flex justify-center items-center text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 py-2.5 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                        {{ $page }}
                                    </button>
                                @endif
                            @endforeach

                            @if ($stoks->hasMorePages())
                                <button wire:click="nextPage"
                                    class="p-2.5 min-w-[40px] inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                    aria-label="Next">»</button>
                            @else
                                <span
                                    class="p-2.5 min-w-[40px] inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-400 dark:text-gray-600 disabled:opacity-50">»</span>
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div x-show="modal" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="absolute inset-0 bg-gray-600/50"></div>
        <!-- Isi modal -->
        <div class="bg-white dark:bg-neutral-800 p-6 rounded-lg shadow-lg z-10 max-w-sm w-full">
            <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">Tambah Stok</h2>
            <form>
                <div class="mb-4">
                    <label for="barcode" class="block text-gray-700 dark:text-white font-medium mb-2">Barcode
                        Produk</label>
                    <select name="barcode"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-neutral-800 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-neutral-500 dark:focus:border-neutral-500">
                        <option value="">Select Barcode</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="suppier" class="block text-gray-700 dark:text-white font-medium mb-2">Supplier</label>
                    <select name="suppier"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-neutral-800 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-neutral-500 dark:focus:border-neutral-500">
                        <option value="">Select Supplier</option>
                    </select>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="submit" @click="modal = false"
                        class="px-4 py-2 bg-green-600 hover:bg-green-800 text-white rounded">Submit</button>
                    <button type="button" @click="modal = false"
                        class="px-4 py-2 bg-gray-600 hover:bg-gray-800 text-white rounded">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>
