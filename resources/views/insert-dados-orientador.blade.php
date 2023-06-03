@php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use App\Models\User;
    use App\Models\Orientadores;
    $user_id = Auth::id();
    $orientador = Orientadores::where('users_id', $user_id)->first();
@endphp

<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Dados Orientador') }}
        </h2>
    </header>

    <form method="post" action="{{ route('orientação.updateDados') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

            <div>
                <x-input-label for="celula_profissional" :value="__('Celular Profissional')" />
                <x-text-input id="celula_profissional" name="celula_profissional" type="text" class="mt-1 block w-full" :value="old('celula_profissional', $orientador ? $orientador->celula_profissional : '')" required autofocus autocomplete="celula_profissional" />
                <x-input-error class="mt-2" :messages="$errors->get('celula_profissional')" />
            </div>

            <div>
                <x-input-label for="admissao" :value="__('Data de Admissão')" />
                <x-text-input id="admissao" name="admissao" type="date" class="mt-1 block w-full" :value="old('admissao', $orientador ? $orientador->admissao : '')" required autofocus autocomplete="admissao" />
                <x-input-error class="mt-2" :messages="$errors->get('admissao')" />
            </div>

            <div>
                <x-input-label for="validade" :value="__('Data de Validade')" />
                <x-text-input id="validade" name="validade" type="date" class="mt-1 block w-full" :value="old('validade', $orientador ? $orientador->validade : '')" required autofocus autocomplete="validade" />
                <x-input-error class="mt-2" :messages="$errors->get('validade')" />
            </div>

            <div class="flex items-center gap-4">
    <x-primary-button>{{ __('Save') }}</x-primary-button>

    @if (session('status') === 'orientação-updateDados')
        <p class="text-sm text-gray-600 dark:text-gray-400">
            {{ __('Saved.') }}
        </p>
    @endif
</div>

    </form>
</section>
