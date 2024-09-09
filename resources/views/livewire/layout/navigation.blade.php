<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div class="container flex flex-col mx-auto bg-white dark:bg-gray-800">
    <div class="hidden lg:block">
        <aside
            class="group/sidebar flex flex-col shrink-0 lg:w-[300px] w-[250px] transition-all duration-300 ease-in-out m-0 fixed z-40 inset-y-0 left-0 bg-white border-r border-r-dashed border-r-neutral-200 dark:border-r-neutral-700/70 dark:bg-gray-700"
            id="sidenav-main">
            <div class="hidden border-b border-dashed lg:block dark:border-neutral-700/70 border-neutral-200"></div>

            {{-- User Profile --}}
            <div class="flex items-center justify-between px-8 py-5">
                <div class="flex items-center mr-5">
                    <div class="mr-5">
                        <div class="inline-block relative shrink-0 cursor-pointer rounded-[.95rem]">
                            <img class="w-[40px] h-[40px] shrink-0 inline-block rounded-full"
                                src="data:image/png;base64,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"
                                alt="avatar image">
                        </div>
                    </div>
                    <div class="mr-2 ">
                        <a href="javascript:void(0)"
                            class="dark:hover:text-primary hover:text-primary transition-colors duration-200 ease-in-out text-[1.075rem] font-medium dark:text-white/50 text-secondary-inverse">{{ auth()->user()->name }}</a>
                        <span
                            class="dark:text-white/50 font-medium block text-[0.85rem]">{{ auth()->user()->role }}</span>
                    </div>
                </div>
            </div>
            {{-- Side Content --}}
            <div x-data="{ route: '{{ request()->route()->getName() }}' }" class="relative pl-3 my-2 overflow-y-scroll">
                <div class="flex flex-col w-full font-medium gap-2">
                    <div>
                        <span class="select-none flex items-center cursor-pointer">
                            <a href="{{ route('dashboard') }}"
                                :class="route === 'dashboard'
                                    ?
                                    'dark:text-white bg-neutral-200/50 dark:bg-neutral-500/50' :
                                    'hover:bg-neutral-200/50 dark:text-neutral-400 hover:dark:text-neutral-200 hover:dark:bg-neutral-500/50'"
                                class="flex items-center flex-grow gap-2 text-[1.15rem] px-4 py-2 rounded-l-full">
                                <x-bi-shop class="w-4 h-4" />
                                Home
                            </a>
                        </span>
                    </div>
                    <div>
                        <span class="select-none flex items-center cursor-pointer">
                            <a href="{{ route('dashboard.product') }}"
                                :class="route === 'dashboard.product'
                                    ?
                                    'dark:text-white bg-neutral-200/50 dark:bg-neutral-500/50' :
                                    'hover:bg-neutral-200/50 dark:text-neutral-400 hover:dark:text-neutral-200 hover:dark:bg-neutral-500/50'"
                                class="flex items-center flex-grow gap-2 text-[1.15rem] px-4 py-2 rounded-l-full">
                                <x-grommet-shop class="w-4 h-4" />
                                Product
                            </a>
                        </span>
                    </div>
                    <div>
                        <span class="select-none flex items-center cursor-pointer">
                            <a href="{{ route('dashboard.kategori') }}"
                                :class="route === 'dashboard.kategori'
                                    ?
                                    'dark:text-white bg-neutral-200/50 dark:bg-neutral-500/50' :
                                    'hover:bg-neutral-200/50 dark:text-neutral-400 hover:dark:text-neutral-200 hover:dark:bg-neutral-500/50'"
                                class="flex items-center flex-grow gap-2 text-[1.15rem] px-4 py-2 rounded-l-full">
                                <x-bi-list class="w-4 h-4" />
                                Kategori
                            </a>
                        </span>
                    </div>
                    <div>
                        <span class="select-none flex items-center cursor-pointer">
                            <a href="{{ route('dashboard.pesanan') }}"
                                :class="route === 'dashboard.pesanan'
                                    ?
                                    'dark:text-white bg-neutral-200/50 dark:bg-neutral-500/50' :
                                    'hover:bg-neutral-200/50 dark:text-neutral-400 hover:dark:text-neutral-200 hover:dark:bg-neutral-500/50'"
                                class="flex items-center flex-grow gap-2 text-[1.15rem] px-4 py-2 rounded-l-full">
                                <x-bi-cart class="w-4 h-4" />
                                Pesanan
                            </a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="mt-auto flex justify-center py-4 px-4">
                <div class="flex flex-col gap-2 w-full">
                    <button wire:click="logout"
                        class="w-full flex flex-row gap-2 items-center justify-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                        <x-solar-exit-outline class="w-4 h-4" />
                        Logout
                    </button>
                </div>
            </div>
        </aside>
    </div>
</div>
