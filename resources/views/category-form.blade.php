<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories create form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ $formOptions['action'] }}" method="post">
                        @csrf
                        @method($formOptions['method'])
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" value="{{ $category->name ?? '' }}" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        <x-primary-button class="mt-3">
                            {{ $formOptions['button'] }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
