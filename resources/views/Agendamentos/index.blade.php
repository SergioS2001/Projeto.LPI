<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Agendamentos') }}
        </h2>
    </x-slot>

    <div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 text-gray-900 dark:text-gray-100">
      @include('calendar')
        <br><br>
        <style>
  table {
    border-collapse: collapse;
    width: 100%;
    font-family: Arial, sans-serif;
    font-size: 14px;
  }

  th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: DeepSkyBlue;
  }

</style>
        <br><br><br>
        <table>
          <thead>
            <tr>
              <th>Nome</th>
              <th>Descrição</th>
              <th>Data</th>
              <th>Hora</th>
              <th>Duração(minutos)</th>
            </tr>
          </thead>
          <tbody>
            @foreach($agendamentos as $agendamento)
            <tr>
              <td>{{ $agendamento->nome }}</td>
              <td>{{ $agendamento->descrição }}</td>
              <td>{{ $agendamento->data }}</td>
              <td>{{ number_format($agendamento->hora, 2, '.', '') }}</td>
              <td>{{ $agendamento->duração }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</x-app-layout>
