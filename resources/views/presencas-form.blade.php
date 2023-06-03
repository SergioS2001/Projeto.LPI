@php
    use App\Models\Estágios;
    use App\Models\Orientação_Estagios;
    $user = Auth::user();
    $estagios = Estágios::whereIn('id', function($query) {
        $query->select('estágios_id')->from('orientação_estagios')->where('users_id', Auth::id());
    })->where('isAdmitido', true)->get();
@endphp

@if ($estagios->isEmpty())
    <p>Não está registado em nenhum Estágio/Ensino Clinico!</p>
@else
<!-- Include the form-validation.js file -->
<script src="{{ asset('resources/js/form-validation.js') }}"></script>

<form class="my-form" action="{{ route('presenças.store') }}" method="POST">
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
    $query->select('estágios_id')->from('orientação_estagios')->where('users_id', Auth::id());
})->where('isAdmitido', true)->get() as $estagio)
    <option value="{{ $estagio->id }}">{{ $estagio->nome }}</option>
@endforeach

    </select>
    <br>
    <div class="form-group">
        <label for="data">Data:</label>
        <input class="form-control" type="date" name="data" id="data" min="{{ now()->format('Y-m-d') }}" required value="{{ old('data') }}">
        @if ($errors->has('data'))
            <div class="alert alert-danger">{{ $errors->first('data') }}</div>
        @endif
    </div>
    <br>
    <label for="h_entrada">Hora entrada:</label>
    <input class="form-control" type="time" name="h_entrada" id="h_entrada" required>
    <br>
    <label for="h_saida">Hora saída:</label>
    <input class="form-control" type="time" name="h_saida" id="h_saida" required>
    <br>
    <label for="h_pausa">Tempo de pausa (minutos):</label>
    <input class="form-control" type="number" name="tempo_pausa" id="tempo_pausa" required min="0" step="1">
    <br>
    <button class="btn btn-primary" type="submit">Create</button>
</form>
@endif


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
