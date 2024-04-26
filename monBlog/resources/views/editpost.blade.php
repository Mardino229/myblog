<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edition') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Vos articles") }}
                    <div class="container">
                        <form method="POST" action="{{ route('updatepost', $post) }}"  enctype = "multipart/form-data" >
                            @csrf
                            @method('post')
                            
                            <div>
                                <x-input-label for="titre" :value="__('Titre')" />
                                <input id="titre" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="titre" value = "{{$post->titre}}" required autofocus>
                                <x-input-error :messages="$errors->get('titre')" class="mt-2" />
                            </div>
                            
                            <div class="mt-4">
                                <x-input-label for="slug" :value="__('Slug')" />
                                <input id="slug" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="slug" value = "{{$post->slug}}">
                                <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                            </div>
                            <div class="form-group mt-4">
                                <x-input-label for="slug" :value="__('Catégorie')" />
                                <select multiple name="categories[]" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="exampleFormControlSelect2">
                                @foreach($categories as  $k =>$v)
                                    <option @selected($post->categorie()->pluck('id')->contains($k)) value="{{$k}}">{{$v}}</option>
                                @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('categories')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="contenu" :value="__('Contenu')" />
                                <textarea id="contenu" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="contenu" cols="30" rows="10">{{$post->contenu}}</textarea>
                                <x-input-error :messages="$errors->get('contenu')" class="mt-2" />
                            </div>
                            @if ($post->image)
                                <figure class="figure mt-4">
                                    <img src="{{$post->imageUrl()}}" class="" alt="..." >
                                    <figcaption class="figure-caption">Image actuelle</figcaption>
                                </figure>
                            @endif
                            <div class="form-group mt-4">
                                <x-input-label for="image" :value="__('Image')" />
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name = "image">
                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-primary-button class="ms-3">
                                    {{ __('Editer') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
