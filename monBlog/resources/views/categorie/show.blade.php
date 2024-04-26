<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <div class="d-flex gap-2 justify-content-end">
            <a href="{{route('new')}}" ><x-primary-button>{{ __('Ajouter') }}</x-primary-button></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Tableau de bord") }}
                    <div class="container">
                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col" class="d-flex gap-2 justify-content-end">Options</th>
                                    </tr>
                                </thead>
                            <tbody>
                                @foreach ($categories as $categorie)
                                <tr>
                                    <td>{{$categorie->name}}</td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-end w-100">
                                            <form action="{{route('deletecategorie', $categorie)}}" method = "post">
                                                @csrf
                                                <x-danger-button>{{ __('Supprimer') }}</x-danger-button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>