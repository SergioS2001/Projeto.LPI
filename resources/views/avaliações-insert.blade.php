@php
    use App\Models\Estágios;
    use App\Models\User;
    use App\Models\Orientadores;
    use App\Models\Orientação_Estagios;
    $user = Auth::user();
@endphp

<!-- Include the form-validation.js file -->
<script src="{{ asset('resources/js/form-validation.js') }}"></script>

<form class="my-form" action="{{ route('avaliações.storeAvaliação') }}" method="POST">
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
<label for="nota_final">Nota final:</label>
<input class="form-control" type="number" name="nota_final" min=1 max=20 id="nota_final" required>
<label for="file">Ficheiro de Avaliação:</label>
    <input type="file" name="file" id="file"><br>
    <button type="submit">Create</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Event listener for Estágio select change
        $('#estagio').change(function() {
            var estagioId = $(this).val();
            var url = "{{ route('getAlunosByEstagio') }}"; // Replace with your route URL

            // AJAX request to fetch Aluno options based on selected Estágio
            $.ajax({
                url: url,
                type: 'GET',
                data: { estagio_id: estagioId },
                success: function(response) {
                    // Update the Aluno select options
                    var alunoSelect = $('#aluno');
                    alunoSelect.empty(); // Clear existing options

                    // Append new options based on the response
                    response.forEach(function(aluno) {
                        alunoSelect.append('<option value="' + aluno.id + '">' + aluno.name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    // Handle the error if needed
                    console.error(xhr.responseText);
                }
            });
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

