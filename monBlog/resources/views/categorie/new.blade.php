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
                    {{ __("") }}
                    <div class="container">
                        <form action = "{{route('save')}}" method='POST' enctype = "multipart/form-data"> 
                            @csrf 
                            <div class="mt-4">
                                <x-input-label for="name" :value="__('Nom de la nouvelle catégorie')" />
                                <input id="categorie" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="name" required autofocus>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="d-flex gap-2 justify-content-end mt-4">
                                <x-primary-button class="ml-4">
                                    {{ __('Ajouter') }}
                                </x-primary-button>
                            </div>
                        </form>
                    <div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>