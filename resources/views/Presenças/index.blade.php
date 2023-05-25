@php
    use App\Models\Estágios;
    use App\Models\Orientação_Estagios;
    use App\Models\Presenças;
    $user = Auth::user();
    $presenças = Presenças::whereHas('orientação_estagios', function ($query) use ($user) {
        $query->where('users_id', $user->id);
    })->get();
    $estagios = Estágios::whereIn('id', function($query) {
        $query->select('estágios_id')->from('orientação_estagios')->where('users_id', Auth::id());
    })->where('isAdmitido', true)->get();
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Presenças') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h4 class="text-xl font-semibold mb-4">Adicionar presenças:</h4>
                        @include('presencas-form')
                        <br><br>
                        @if ($presenças->isEmpty())
                        @else
                            @include('presenças-table')
                        @endif
                </div>
            </div>
        </div>
    </div>

    @if ($estagios->isEmpty() || $presenças->isEmpty())
    @else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h4 class="text-xl font-semibold mb-4">Editar presenças:</h4>
                        @include('presenças-edit')
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
