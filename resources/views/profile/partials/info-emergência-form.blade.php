<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Contacto de Emergência') }}
        </h2>
    </header>

    <form method="post" action="{{ route('profile.saveEmergência') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="nome" :value="__('Nome')" />
            <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full" :value="old('nome', optional($user->contactos_emergência)->nome)" required autofocus autocomplete="nome" />
            <x-input-error class="mt-2" :messages="$errors->get('nome')" />
        </div>

        <div>
            <x-input-label for="grau_parentesco" :value="__('Grau de Parentesco')" />
            <x-text-input id="grau_parentesco" name="grau_parentesco" type="text" class="mt-1 block w-full" :value="old('grau_parentesco', optional($user->contactos_emergência)->grau_parentesco)" required autofocus autocomplete="grau_parentesco" />
            <x-input-error class="mt-2" :messages="$errors->get('grau_parentesco')" />
        </div>

        <div>
            <x-input-label for="telemóvel" :value="__('Telemóvel')" />
            <x-text-input id="telemóvel" name="telemóvel" type="text" class="mt-1 block w-full" :value="old('telemóvel', optional($user->contactos_emergência)->telemóvel)" required autofocus autocomplete="telemóvel" />
            <x-input-error class="mt-2" :messages="$errors->get('telemóvel')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'emergência-updated')
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
