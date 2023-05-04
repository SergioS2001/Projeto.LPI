@php
    use App\Models\Estágios;
@endphp


<form action="{{ route('presenças.store') }}" method="POST">
    @csrf
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
    <input type="number" name="h_entrada" id="h_entrada" min="1" max="24" required>
    <br>
    <label for="h_saida">Hora saída:</label>
    <input type="number" name="h_saida" id="h_saida" min="1" max="24" required>
    <br>
    <label for="h_pausa">Tempo de pausa:</label>
    <input type="number" name="h_pausa" id="h_pausa" min="1" max="24" required>
    <br>
    <button type="submit">Salvar</button>
</form>
