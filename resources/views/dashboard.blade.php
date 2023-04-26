<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
        <div>
            <div x-data="{ tab: '#tab1' }" class="transition-all ease-out duration-500">
                <div x-show="tab == '#tab1'"
                     x-cloak
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                >
                    <p>This is the content of Tab 1This is the content of Tab 1This is the content of Tab 1This is the content of Tab 1This is the content of Tab 1</p>
                </div>

                <div x-show="tab == '#tab2'"
                     x-cloak
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                >
                    <p>This is the content of Tab 2This is the content of Tab 1This is the content of Tab 1This is the content of Tab 1This is the content of Tab 1</p>
                </div>

                <div x-show="tab == '#tab3'"
                     x-cloak
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                >
                    <p>This is the content of Tab 3This is the content of Tab 1This is the content of Tab 1This is the content of Tab 1</p>
                </div>


                <div class="flex flex-row justify-between">

                    <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300 transition-all ease-out duration-300"
                       href="#" x-on:click.prevent="tab='#tab1'"
                       :class="{'border-teal-300' : tab === '#tab1'}"
                    >Tab1</a>

                    <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300 transition-all ease-out duration-300"
                       href="#" x-on:click.prevent="tab='#tab2'"
                       :class="{'border-teal-300' : tab === '#tab2'}"
                    >Tab2</a>

                    <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300 transition-all ease-out duration-300"
                       href="#" x-on:click.prevent="tab='#tab3'"
                       :class="{'border-teal-300' : tab === '#tab3'}"
                    >Tab3</a>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
