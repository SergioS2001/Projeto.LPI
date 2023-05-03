<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome Completo')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Personal info -->
        <div class="mt-4">
        <x-input-label for="data_nascimento" :value="__('Data nascimento')" />
            <x-text-input id="data_nascimento" class="block mt-1 w-full"  type="date" name="data_nascimento" required autocomplete="data_nascimento" />
            <x-input-error :messages="$errors->get('data_nascimento')" class="mt-2" />
        </div>

        <div class="mt-4">
        <x-input-label for="cartão_cidadão" :value="__('Cartão de Cidadão')" />
            <x-text-input id="cartão_cidadão" class="block mt-1 w-full"  type="text" name="cartão_cidadão" required autocomplete="cartão_cidadão" />
            <x-input-error :messages="$errors->get('cartão_cidadão')" class="mt-2" />
        </div>

        <div class="mt-4">
        <x-input-label for="telemóvel" :value="__('Telemóvel')" />
            <x-text-input id="telemóvel" class="block mt-1 w-full"  type="text" name="telemóvel" required autocomplete="telemóvel" />
            <x-input-error :messages="$errors->get('data_nascimento')" class="mt-2" />
        </div>


        <div class="mt-4">
        <x-input-label for="instituicao" :value="__('Instituição de Ensino')" />
            <x-text-input id="instituicao" name="instituicao" type="text" class="mt-1 block w-full" required autofocus autocomplete="instituicao"/>
            <x-input-error class="mt-2" :messages="$errors->get('instituicao')" />
        </div>

        <div class="mt-4">
            <x-input-label for="numero_aluno" :value="__('Número de Aluno')" />
            <x-text-input id="numero_aluno" name="numero_aluno" type="text" class="mt-1 block w-full" required autofocus autocomplete="numero_aluno"/>
            <x-input-error class="mt-2" :messages="$errors->get('numero_aluno')" />
        </div>

        <div class="mt-4">
            <x-input-label for="curso" :value="__('Curso')" /> 
            <x-text-input id="curso" name="curso" type="text" class="mt-1 block w-full" required autofocus autocomplete="curso" />
            <x-input-error class="mt-2" :messages="$errors->get('curso')" />
        </div>

        <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-3">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
