<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="email_alternativo" :value="__('Email alternativo')" />
            <x-text-input id="email_alternativo" name="email_alternativo" type="email" class="mt-1 block w-full" :value="old('email_alternativo', $user->email_alternativo)" required autofocus autocomplete="email_alternativo" />
            <x-input-error class="mt-2" :messages="$errors->get('email_alternativo')" />
        </div>

        <div>
            <x-input-label for="data_nascimento" :value="__('Data de Nascimento')" />
            <x-text-input id="data_nascimento" name="data_nascimento" type="date" class="mt-1 block w-full" :value="old('data_nascimento', $user->data_nascimento)" required autofocus autocomplete="data_nascimento" />
            <x-input-error class="mt-2" :messages="$errors->get('data_nascimento')" />
        </div>

        <div>
            <x-input-label for="telemóvel" :value="__('Telemóvel')" />
            <x-text-input id="telemóvel" name="telemóvel" type="text" class="mt-1 block w-full" :value="old('telemóvel', $user->telemóvel)" required autofocus autocomplete="telemóvel" />
            <x-input-error class="mt-2" :messages="$errors->get('telemóvel')" />
        </div>

        <div>
            <x-input-label for="cartão_cidadão" :value="__('Cartão de Cidadão')" />
            <x-text-input id="cartão_cidadão" name="cartão_cidadão" type="text" class="mt-1 block w-full" :value="old('cartão_cidadão', $user->cartão_cidadão)" required autofocus autocomplete="cartão_cidadão" />
            <x-input-error class="mt-2" :messages="$errors->get('cartão_cidadão')" />
        </div>

        <div>
            <x-input-label for="morada" :value="__('Morada')" />
            <x-text-input id="morada" name="morada" type="text" class="mt-1 block w-full" :value="old('morada', $user->morada)" required autofocus autocomplete="morada" />
            <x-input-error class="mt-2" :messages="$errors->get('morada')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
