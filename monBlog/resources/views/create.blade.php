<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if($post->exists)
            {{ __('Modification') }}
            @else
            {{ __('Creation') }}
            @endif
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Les champs obligatoires sont marqués*") }}
                    <div class="container">
                        <form action = "{{route($post->exists? 'updatepost':'store',$post)}}" method='POST' enctype = "multipart/form-data"> 
                            @csrf 
                        <div class="mt-4">
                            <x-input-label for="titre" :value="__('Titre*')" />
                            <input id="titre" value = "{{old('titre',$post->titre)}}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="titre" required autofocus>
                            <x-input-error :messages="$errors->get('titre')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="slug" :value="__('Slug*')" />
                            <input id="slug" value = "{{old('slug',$post->slug)}}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="slug" required autofocus>
                            <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                        </div>
                        <div class="form-group mt-4">
                            <x-input-label for="Catégorie" :value="__('Catégorie*')" />
                            <select multiple name="categories[]" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="exampleFormControlSelect2">
                            @foreach($categories as $k =>$v)
                                <option @selected($post->categorie()->pluck('id')->contains($k)) value="{{$k}}">{{$v}}</option>
                            @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('categories')" class="mt-2" />
                        </div>
                        <div class="form-group mt-4">
                            <x-input-label for="Photo de couverture" :value="__('Photo de couverture*')" />
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name = "image">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="contenu" :value="__('Introduction*')" />
                            <textarea id="contenu" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="contenu" cols="30" rows="10">{{old('contenu',$post->contenu)}}</textarea>
                            <x-input-error :messages="$errors->get('contenu')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="contenu" :value="__('Premier sous-titre*')" />
                            <input id="titre1"  value = "{{old('titre1',$post->titre1)}}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="titre1" required autofocus>
                            <x-input-error :messages="$errors->get('titre1')" class="mt-2" />
                        </div>
                        <div class="form-group mt-4">
                            <x-input-label for="image1" :value="__('Image')" />
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name = "image1">
                            <x-input-error :messages="$errors->get('image1')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="contenu" :value="__('Premier paragraphe*')" />
                            <textarea id="contenu" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="paragraphe1" cols="30" rows="10">{{old('paragraphe1',$post->paragraphe1)}}</textarea>
                            <x-input-error :messages="$errors->get('paragraphe1')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="titre2" :value="__('Second sous-titre*')" />
                            <input id="titre2" value = "{{old('titre2',$post->titre2)}}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="titre2" required autofocus>
                            <x-input-error :messages="$errors->get('titre2')" class="mt-2" />
                        </div>
                        <div class="form-group mt-4">
                            <x-input-label for="image2" :value="__('Image')" />
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name = "image2">
                            <x-input-error :messages="$errors->get('image2')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="paragraphe2" :value="__('Second paragraphe*')" />
                            <textarea id="contenu" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="paragraphe2" cols="30" rows="10">{{old('paragraphe2',$post->paragraphe2)}}</textarea>
                            <x-input-error :messages="$errors->get('paragraphe2')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="titre3" :value="__('Troisième sous-titre')" />
                            <input id="titre3" value = "{{old('titre3',$post->titre3)}}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="titre3" required autofocus>
                            <x-input-error :messages="$errors->get('titre3')" class="mt-2" />
                        </div>
                        <div class="form-group mt-4">
                            <x-input-label for="image3" :value="__('Image')" />
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name = "image3">
                            <x-input-error :messages="$errors->get('image3')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="paragraphe3" :value="__('Troisième paragraphe')" />
                            <textarea id="contenu" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="paragraphe3" cols="30" rows="10">{{old('paragraphe3',$post->paragraphe3)}}</textarea>
                            <x-input-error :messages="$errors->get('paragraphe3')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="conclusion" :value="__('Conclusion*')" />
                            <textarea id="contenu" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="conclusion" cols="30" rows="10">{{old('conclusion',$post->conclusion)}}</textarea>
                            <x-input-error :messages="$errors->get('conclusion')" class="mt-2" />
                        </div>

                        <div class="d-flex gap-2 justify-content-end mt-4">
                            @if ($post->exists)
                            <x-primary-button>{{ __('Modifier') }}</x-primary-button>
                            @else
                            <x-primary-button>{{ __('Rédiger') }}</x-primary-button>
                            @endif
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>


