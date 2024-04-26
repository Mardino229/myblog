<section class = "m-auto">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Information du profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Mettez à jour les informations de votre profil et vote email") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype = "multipart/form-data">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="name" :value="__('Photo de profil')" />
            @if($user->photo)
                <img style="width: 150px;
            height: 150px;
            margin: auto;
            border-radius: 50%; /* Crée un cercle */
            margin-bottom: 4px;
            object-fit: cover;"src="{{$user->imageUrl()}}" id="profil" class="" alt="">
            @endif
            <x-text-input id="photo" name="photo" type="file" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
        </div>
        <div>
            <x-input-label for="name" :value="__('Nom et prénoms')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="about" :value="__('Biographie')" />
            <textarea id="about" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="about" cols="20" rows="5">{{old('about',$user->about)}}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('about')" />
        </div>

        <div>
            <x-input-label for="linkedin" :value="__('Lien de profil linkedin')" />
            <x-text-input id="linkedin" name="linkedin" type="text" class="mt-1 block w-full" :value="old('linkedin', $user->linkedin)"  autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('linkedin')" />
        </div>

        <div>
            <x-input-label for="facebook" :value="__('Lien de profil facebook')" />
            <x-text-input id="facebook" name="facebook" type="text" class="mt-1 block w-full" :value="old('facebook', $user->facebook)"  autofocus  />
            <x-input-error class="mt-2" :messages="$errors->get('facebook')" />
        </div>

        <div>
            <x-input-label for="twitter" :value="__('Lien de profil twitter')" />
            <x-text-input id="twitter" name="twitter" type="text" class="mt-1 block w-full" :value="old('twitter', $user->twitter)" autofocus  />
            <x-input-error class="mt-2" :messages="$errors->get('twitter')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Votre email n\'est pas vérifié.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Cliquer ici pour renvoyer l\'email de vérification.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Un nouveauu lien de vérifiction a été envoyer à votre adressse email') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex gap-2 justify-content-end mt-4">
            <x-primary-button>{{ __('Modifier') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Enregistré.') }}</p>
            @endif
        </div>
    </form>
</section>
