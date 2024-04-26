<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Management') }}
        </h2>
        <div class="d-flex gap-2 justify-content-end">
            <a href="{{route('create')}}"><x-primary-button>{{ __('Rédiger') }}</x-primary-button></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Vos articles") }}
                    <div class="container">
                        <div class='row justify-center gap-4'>
                            @foreach ($posts as $post)
                            <div class="card mt-4">
                                <img src="{{$post->imageUrl()}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title fw-b" style="font-weight: bold;">{{$post->titre}}</h5>
                                    <p class="card-text">>@foreach ($post->categorie as $categorie) 
                                         {{$categorie->name}}
                                         @endforeach</p>
                                    <div class='d-flex justify-end gap-2 mt-1'>
                                        <a href="{{route('editpost', $post)}}">
                                        <x-primary-button>{{ __('Editer') }}</x-primary-button>
                                        </a>
                                        
                                        <form action="{{route('deletepost', $post)}}" method = "post">
                                            @csrf
                                            <x-danger-button>{{ __('Supprimer') }}</x-danger-button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
