@php
    use App\Models\Estágios;
    use App\Models\Orientação_Estagios;
    use App\Models\Presenças;
    $user = Auth::user();
    $presenças = Presenças::whereHas('orientação_estagios', function ($query) use ($user) {
        $query->where('users_id', $user->id);
    })->get();
@endphp

<!-- Include the form-validation.js file -->
<script src="{{ asset('resources/js/form-validation.js') }}"></script>

<form class="my-form" action="{{ route('presenças.edit') }}" method="POST">
    @csrf
    @method('PUT')

    <label for="presença">Escolha uma Presença:</label>
    <select name="presença" id="presença">
        @foreach($presenças as $presença)
            <option value="{{ $presença->id }}">{{ $presença->data }}</option>
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

<script>
    document.getElementById('presença').addEventListener('change', function() {
        var presençaId = this.value;
        var selectedPresençaDiv = document.getElementById('selected-presença');
        if (presençaId) {
            selectedPresençaDiv.style.display = 'block';
            var presenças = @json($presenças);
            var presença = presenças.find(function(p) {
                return p.id == presençaId;
            });
            if (presença) {
                document.getElementById('data').value = presença.data;
                document.getElementById('h_entrada').value = presença.hora_entrada;
                document.getElementById('h_saida').value = presença.hora_saida;
                document.getElementById('tempo_pausa').value = presença.tempo_pausa;
            }
        } else {
            selectedPresençaDiv.style.display = 'none';
        }
    });

    // Trigger change event on page load to pre-fill the fields if a default value is selected
    document.getElementById('presença').dispatchEvent(new Event('change'));
</script>

