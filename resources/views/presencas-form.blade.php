@php
    use App\Models\Estágios;
@endphp


<form action="{{ route('presenças.store') }}" method="POST">
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
    <input type="date" name="data" id="data" min="{{ now()->format('Y-m-d') }}" required>
    <br>
    <label for="h_entrada">Hora entrada:</label>
    <input type="text" name="h_entrada" id="h_entrada"equired>
    <br>
    <label for="h_saida">Hora saída:</label>
    <input type="text" name="h_saida" id="h_saida" required>
    <br>
    <label for="h_pausa">Tempo de pausa:</label>
    <input type="text" name="h_pausa" id="h_pausa" required>
    <br>
    <button type="submit">Salvar</button>
</form>
