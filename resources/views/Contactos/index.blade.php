<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Contactos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2>Orientadores</h2>
                <table class="table">
                  <thead class="table-light">
                    <tr>
                      <th scope="col">Nome</th>
                      <th scope="col">Instituição</th>
                      <th scope="col">Email</th>
                      <th scope="col">Telemóvel</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divider">
                  @foreach($users as $user)
                    @if($user->isOrientador)
                  <tr>
                   <td>{{ $user->name }}</td>
                  @if ($user->historico && $user->historico->estagio && $user->historico->estagio->instituicao_estagio)
                  <td>{{ $user->historico->estagio->instituicao_estagio->nome ?? 'N/A' }}</td>
                  @else
                  <td>N/A</td>
                  @endif
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->telemóvel }}</td>
                  </tr>
                  @endif
                  @endforeach
                  </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>