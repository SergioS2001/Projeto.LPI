<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Instituição') }}
        </h2>

    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="instituicao" :value="__('Instituição de Ensino')" />
            <x-text-input id="instituicao" name="instituicao" type="text" class="mt-1 block w-full" :value="old('instituicao', $user->instituicao_aluno->nome)" required autofocus autocomplete="instituicao" readonly/>
            <x-input-error class="mt-2" :messages="$errors->get('instituicao')" />
        </div>
        <div>
            <x-input-label for="numero_aluno" :value="__('Número de Aluno')" />
            <x-text-input id="numero_aluno" name="numero_aluno" type="text" class="mt-1 block w-full" :value="old('numero_aluno', $user->instituicao_aluno->numero_aluno)" required autofocus autocomplete="numero_aluno" readonly/>
            <x-input-error class="mt-2" :messages="$errors->get('numero_aluno')" />
        </div>


        <div>
            <x-input-label for="curso" :value="__('Curso')" />  
            <x-text-input id="curso" name="curso" type="text" class="mt-1 block w-full" :value="old('curso', $user->instituicao_aluno->curso_aluno->curso)" required autofocus autocomplete="curso" />
            <x-input-error class="mt-2" :messages="$errors->get('curso')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
        </form>
</section>
