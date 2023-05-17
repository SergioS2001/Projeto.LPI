@php
    use App\Models\Estágios;
    use App\Models\User;
    use App\Models\Orientadores;
    use App\Models\Orientação_Estagios;
    $user = Auth::user();
@endphp

<!-- Include the form-validation.js file -->
<script src="{{ asset('resources/js/form-validation.js') }}"></script>

<form class="my-form" action="{{ route('avaliações.storeModulos') }}" method="POST">
    @csrf
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <label for="estagio">Estágio/EC:</label>
<select name="orientacao_estagios_id" id="estagio">
    @foreach(Estágios::whereIn('id', function($query) {
        $query->select('estágios_id')->from('orientação_estagios')
              ->whereIn('orientadores_id', function($subQuery) {
                  $subQuery->select('id')->from('orientadores')->where('users_id', Auth::id());
              });
    })->get() as $estagio)
        <option value="{{ $estagio->id }}">{{ $estagio->nome }}</option>
    @endforeach
</select>
<br>
<label for="aluno">Aluno:</label>
    <select name="aluno" id="aluno">
        @foreach(User::whereIn('id', function($query) {
            $query->select('users_id')->from('orientação_estagios')
                  ->whereIn('estágios_id', function($subQuery) {
                      $subQuery->select('id')->from('estágios')
                              ->whereIn('id', function($innerQuery) {
                                  $innerQuery->select('estágios_id')->from('orientação_estagios')
                                             ->whereIn('orientadores_id', function($subInnerQuery) {
                                                 $subInnerQuery->select('id')->from('orientadores')->where('users_id', Auth::id());
                                             });
                              });
                  });
        })->get() as $aluno)
            <option value="{{ $aluno->id }}">{{ $aluno->name }}</option>
        @endforeach
    </select>
<label for="module_count">Número de Módulos:</label>
<input class="form-control" type="number" name="module_count" min=0 max=10 id="module_count" required>
<div id="module_fields"></div>

    <button type="submit">Salvar</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('#module_count').change(function() {
      var moduleCount = parseInt($(this).val());
      var moduleFields = $('#module_fields');

      // Clear any existing module fields
      moduleFields.empty();

      // Generate module fields dynamically
      for (var i = 1; i <= moduleCount; i++) {
        moduleFields.append('<label for="module' + i + '_nome">Nome do Módulo ' + i + ':</label>');
        moduleFields.append('<input class="form-control" type="text" name="module' + i + '_nome" id="module' + i + '_nome" required>');

        moduleFields.append('<label for="module' + i + '_nota">Nota do Módulo ' + i + ':</label>');
        moduleFields.append('<input class="form-control" type="number" name="module' + i + '_nota" id="module' + i + '_nota" required>');
      }
    });
  });
</script>


<style>
    .my-form label {
        display: block;
        margin-bottom: 5px;
    }

    .my-form input,
    .my-form select {
        display: block;
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .my-form button {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #007bff;
        border: none;
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
    }

    .my-form button:hover {
        background-color: #0069d9;
    }

    .my-form .alert {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 4px;
    }

    .my-form .alert ul {
        margin: 0;
        padding: 0;
    }

    .my-form .alert li {
        margin-left: 20px;
    }
</style>
