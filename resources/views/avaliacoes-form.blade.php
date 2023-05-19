@php
    use App\Models\Estágios;
    use App\Models\User;
    use App\Models\Orientadores;
    use App\Models\Orientação_Estagios;
    $user = Auth::user();
@endphp


<form class="my-form" action="{{ route('avaliações.store') }}" method="POST">>
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
    <select name="estagio" id="estagio">
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

    <br>


    <button class="btn btn-primary" type="submit">Create</button>
</form>


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
