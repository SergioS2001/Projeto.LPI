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
<table class="table caption-top">
<caption>Responsáveis</caption>
          <thead>
            <tr>
              <th>Nome</th>
              <th>Instituição</th>
              <th>Email</th>
              <th>Contacto</th>
            </tr>
          </thead>
          <tbody>
           
          </tbody>
        </table>
        <br><br><br>

        <table>
<caption>Orientadores</caption>
          <thead>
            <tr>
              <th>Nome</th>
              <th>Instituição</th>
              <th>Email</th>
              <th>Contacto</th>
            </tr>
          </thead>
          <tbody>
           
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<style>
  table {
    border-collapse: collapse;
    width: 100%;
  }
  
  th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    width: 220px; /* or any other desired width */
  }
  
  th {
    background-color: DeepSkyBlue;
    color: white;
  }
  
  tr:hover {
    background-color: #ADD8E6;
  }
  
  caption {
    font-size: 1.2em;
    font-weight: bold;
    margin-bottom: 1em;
  }
</style>

</x-app-layout>
