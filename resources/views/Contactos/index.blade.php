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
      CONTACTOS DO SERVIÇO<br>
Centro de Ensino graduado, de Formação contínua e de Educação para a Saúde<br>

Avenida Fernando Pessoa, 150 4420-096 Gondomar, Portugal (GPS: 41.14313,-8.544427)<br>

Telefone: +351 222 455 455<br>

E-mail: cefes.he@ufp.edu.pt<br>

Presidente: Prof. Doutor José Calheiros<br>

Coordenação Administrativa-Funcional: Dr.ª Carla Sousa<br><br>

      @include('contactos')
      </div>
    </div>
  </div>
</div>
</x-app-layout>
