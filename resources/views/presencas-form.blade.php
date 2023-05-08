@php
    use App\Models\Estágios;
@endphp

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

    <label for="estagio">Estágio:</label>
    <select name="estagio" id="estagio">
        @foreach(Estágios::all()->pluck('nome', 'id') as $id => $nome)
            <option value="{{ $id }}">{{ $nome }}</option>
        @endforeach
    </select>
    <br>

    <label for="data">Data:</label>
    <input class="form-control" type="date" name="data" id="data" min="{{ now()->format('Y-m-d') }}" required>
    <br>

    <label for="h_entrada">Hora entrada:</label>
    <input class="form-control" type="text" name="h_entrada" id="h_entrada" required>
    <br>

    <label for="h_saida">Hora saída:</label>
    <input class="form-control" type="text" name="h_saida" id="h_saida" required>
    <br>

    <label for="h_pausa">Tempo de pausa:</label>
    <input class="form-control" type="text" name="h_pausa" id="h_pausa" required>
    <br>

    <button class="btn btn-primary" type="submit">Salvar</button>
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
