<div>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categories List') }}
            </h2>
            <form action="{{ route('category.create') }}" method="get">
                <x-primary-button>
                    {{ __('Create') }}
                </x-primary-button>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Updated time
                            </th>
                            <th scope="col" class="px-6 py-3 text-transparent">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $category)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $category->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $category->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {!! date_format($category->updated_at, 'd/m/Y, h:i') !!}
                                </td>
                                <td class="px-6 py-4">
                                    <form class="inline" action="{{ route('news-category-form', $category->id) }}">
                                        <x-primary-button>
                                            {{ __('Edit') }}
                                        </x-primary-button>
                                    </form>

                                    <x-danger-button
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-category-deletion')"
                                        wire:click.prevent="deleteId({{ $category->id }})"
                                    >
                                        {{ __('Delete') }}
                                    </x-danger-button>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td colspan="3" class="px-6 py-4 font-medium text-gray-900 text-center whitespace-nowrap">
                                    {{ __('No category found...') }}
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-modal name="confirm-category-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form class="p-6" wire:submit.prevent="destroy">
            <h2 class="text-lg text-center font-medium text-red-600">
                {{ __('Are you sure you want to delete this category?') }}
            </h2>

            <div class="mt-6 flex justify-center items-center">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3" @click="$dispatch('close')">
                    {{ __('Delete Category') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</div>
