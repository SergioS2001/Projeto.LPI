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