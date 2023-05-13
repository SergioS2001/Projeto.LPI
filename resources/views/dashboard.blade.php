<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        <div>Bem vindo, {{ Auth::user()->name }}!</div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">  
                @if (!Auth::user()->politica_dados_accepted)
                        @include('politica-dados')
                @elseif  (!Auth::user()->profile_updated)
                @include('profile-update-alert')
                @else
                //Info Plataforma + estágios HE-UFP
                @endif

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
