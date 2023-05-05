<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories create form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form wire:submit.prevent="storeOrUpdate">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" wire:model="name" type="text" class="mt-1 block w-full" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        <x-primary-button class="mt-3">
                            Create
                        </x-primary-button>
                        <div>
                            {{ $edit }}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
