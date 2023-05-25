@php
    use App\Models\Estágios;
    use App\Models\Orientação_Estagios;
    use App\Models\Presenças;
    $user = Auth::user();
    $presenças = Presenças::whereHas('orientação_estagios', function ($query) use ($user) {
        $query->where('users_id', $user->id);
    })->get();
@endphp

@if ($presenças->isEmpty())
@else
<!-- Include the form-validation.js file -->
<script src="{{ asset('resources/js/presenças-edit.js') }}"></script>

<form class="my-form2" action="{{ route('presenças.edit') }}" method="POST">
    @csrf
    @method('PUT')

    <label for="presença">Escolha uma Presença:</label>
    <select name="presença" id="presença">
        @foreach($presenças as $presença)
        <option value="{{ $presença->id }}">{{ date('d-m-Y', strtotime($presença->data)) }}</option>
        @endforeach
    </select>
    <br>

    <div id="selected-presença" style="display: none;">
        <div class="form-group">
            <label for="data">Data:</label>
            <input class="form-control" type="date" name="data" id="data" min="{{ now()->format('Y-m-d') }}"
                   required>
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

        <button class="btn btn-primary" type="submit">Update</button>
    </div>
</form>
@endif

<style>
    .my-form2 label {
        display: block;
        margin-bottom: 5px;
    }

    .my-form2 input,
    .my-form2 select {
        display: block;
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .my-form2 button {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #007bff;
        border: none;
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
    }

    .my-form2 button:hover {
        background-color: #0069d9;
    }

    .my-form2 .alert {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 4px;
    }

    .my-form2 .alert ul {
        margin: 0;
        padding: 0;
    }

    .my-form2 .alert li {
        margin-left: 20px;
    }
</style>

<script>
var presenças = @json($presenças);

document.getElementById('presença').addEventListener('change', function() {
    var presençaId = this.value;
    var selectedPresençaDiv = document.getElementById('selected-presença');
    var selectedPresença = presenças.find(function(presença) {
        return presença.id == presençaId;
    });

    if (selectedPresença) {
        selectedPresençaDiv.innerHTML = generatePresençaForm(selectedPresença);
        selectedPresençaDiv.style.display = 'block';
    } else {
        selectedPresençaDiv.innerHTML = '';
        selectedPresençaDiv.style.display = 'none';
    }
});

function generatePresençaForm(presença) {
    return `
        <div class="form-group">
            <label for="data">Data:</label>
            <input class="form-control" type="date" name="data" id="data" min="{{ now()->format('Y-m-d') }}" required value="${presença.data}">
            @if ($errors->has('data'))
                <div class="alert alert-danger">{{ $errors->first('data') }}</div>
            @endif
        </div>
        <br>

        <label for="h_entrada">Hora entrada:</label>
        <input class="form-control" type="time" name="h_entrada" id="h_entrada" required value="${presença.hora_entrada}">
        <br>

        <label for="h_saida">Hora saída:</label>
        <input class="form-control" type="time" name="h_saida" id="h_saida" required value="${presença.hora_saida}">
        <br>

        <label for="h_pausa">Tempo de pausa (minutos):</label>
        <input class="form-control" type="number" name="tempo_pausa" id="tempo_pausa" required min="0" step="1" value="${presença.tempo_pausa}">
        <br>

        <button class="btn btn-primary" type="submit">Update</button>
    `;
}

// Trigger change event on page load to pre-fill the fields if a default value is selected
document.getElementById('presença').dispatchEvent(new Event('change'));
</script>