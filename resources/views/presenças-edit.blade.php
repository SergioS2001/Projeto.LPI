@php
    use App\Models\Estágios;
    use App\Models\Orientação_Estagios;
    use App\Models\Presenças;
    $user = Auth::user();
    $has_presenças = Presenças::whereHas('orientação_estagios', function ($query) use ($user) {
        $query->where('users_id', $user->id);
    })->get();
@endphp

@if (!$has_presenças->isEmpty())
<!-- Include the form-validation.js file -->
<script src="{{ asset('resources/js/presenças-edit.js') }}"></script>

<form class="my-form2" action="{{ route('presenças.update', ['id' => $has_presenças[0]->id]) }}" method="POST" novalidate>
    @csrf
    @method('PUT')

    <label for="presença">Escolha uma Presença:</label>
    <select name="presença" id="presença">
        @foreach($has_presenças as $presença)
            <option value="{{ $presença->id }}" @if ($presença->isValidated) disabled @endif>{{ date('d-m-Y', strtotime($presença->data)) }}</option>
        @endforeach
    </select>
    <br>

    <div id="selected-presença" style="display: none;"></div>

    <button class="btn btn-primary" type="submit">Update</button>
</form>
@endif


@php
    $presençasJson = $presenças->toJson();
@endphp

<script>
    var presenças = @json($presenças);

    document.getElementById('presença').addEventListener('change', function() {
        var selectedPresençaId = this.value;
        var selectedPresençaDiv = document.getElementById('selected-presença');
        var selectedPresença = presenças.find(function(presença) {
            return presença.id == selectedPresençaId;
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
        var horaEntrada = presença.hora_entrada ? presença.hora_entrada : '';
        var horaSaida = presença.hora_saida ? presença.hora_saida : '';

        return `
            <div class="form-group">
                <label for="data">Data:</label>
                <input class="form-control" type="date" name="data" id="data" min="{{ now()->format('Y-m-d') }}" value="${presença.data}">
                @error('data')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>

            <label for="h_entrada">Hora entrada:</label>
            <input class="form-control" type="time" name="h_entrada" id="h_entrada" value="${horaEntrada}">
            <br>

            <label for="h_saida">Hora saída:</label>
            <input class="form-control" type="time" name="h_saida" id="h_saida" value="${horaSaida}">
            <br>

            <label for="h_pausa">Tempo de pausa (minutos):</label>
            <input class="form-control" type="number" name="tempo_pausa" id="tempo_pausa" min="0" step="1" value="${presença.tempo_pausa}">
            <br>
        `;
    }

    // Trigger change event on page load to pre-fill the fields if a default value is selected
    document.getElementById('presença').dispatchEvent(new Event('change'));
</script>



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

