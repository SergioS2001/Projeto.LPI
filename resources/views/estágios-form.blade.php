use \PDO;

<?php

// Set up database connection
$host = env('DB_HOST');
$dbname = env('DB_DATABASE');
$user = env('DB_USERNAME');
$password = env('DB_PASSWORD');
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
];


try {
    $db = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}


// SQL query to fetch data
$query = "SELECT estágios.nome AS estágios_nome,
instituicao_estagio.nome AS instituicao_estagio_nome,
curso_estagio.curso AS curso_estagio_curso,
unidade_curricular.nome AS unidade_curricular_nome,
estágios.ano_curricular AS estágios_ano_curricular,
serviços.titulo AS serviços_titulo,
serviços.nome_responsavel AS serviços_nome_responsavel,
tipologiaestagio.titulo AS tipologia_estagio_titulo,
estágios.data_inicial AS estágios_data_inicial,
estágios.data_final AS estágios_data_final
FROM
estágios
JOIN instituicao_estagio ON estágios.instituição_estagio_id = instituicao_estagio.id
JOIN curso_estagio ON estágios.curso_estagio_id = curso_estagio.id
JOIN unidade_curricular ON estágios.unidade_curricular_id = unidade_curricular.id
JOIN serviços ON estágios.serviços_id = serviços.id
JOIN tipologiaestagio ON estágios.tipologiaestagio_id = tipologiaestagio.id";

// Fetch data and store in $result variable
$result = $db->query($query);

?>

<form method="POST" action="{{ route('estagios.store') }}">
    @csrf

    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
    </div>

    <div class="form-group">
    <label for="instituicao_estagio_id">Instituição de Estágio:</label>
    <select name="instituicao_estagio_id" class="form-control">
        @foreach ($instituicao_estagio as $instituicao_estagio)
            <option value="{{ $instituicao_estagio->id }}">{{ $instituicao_estagio->nome }}</option>
        @endforeach
    </select>
    </div>


    <div class="form-group">
        <label for="curso_estagio_id">Curso</label>
        <select class="form-control" id="curso_estagio_id" name="curso_estagio_id" required>
            @foreach ($curso_estagio as $curso_estagio)
                <option value="{{ $curso_estagio->id }}">{{ $curso_estagio->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="unidade_curricular_id">Unidade Curricular</label>
        <select class="form-control" id="unidade_curricular_id" name="unidade_curricular_id" required>
            @foreach ($unidades_curriculares as $unidade_curricular)
                <option value="{{ $unidade_curricular->id }}">{{ $unidade_curricular->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="ano_curricular">Ano Curricular</label>
        <input type="number" class="form-control" id="ano_curricular" name="ano_curricular" required>
    </div>

    <div class="form-group">
        <label for="servico_id">Serviço</label>
        <select class="form-control" id="servico_id" name="servico_id" required>
            @foreach ($serviços as $serviços)
                <option value="{{ $serviços->id }}">{{ $serviços->titulo }} - {{ $serviços->nome_responsavel }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="tipologia_estagio_id">Tipologia de Estágio</label>
        <select class="form-control" id="tipologia_estagio_id" name="tipologia_estagio_id" required>
            @foreach ($tipologiaestagio as $tipologiaestagio)
                <option value="{{ $tipologiaestagio->id }}">{{ $tipologiaestagio->titulo }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="data_inicial">Data Inicial</label>
        <input type="date" class="form-control" id="data_inicial" name="data_inicial" required>
    </div>

    <div class="form-group">
        <label for="data_final">Data Final</label>
        <input type="date" class="form-control" id="data_final" name="data_final" required>
    </div>

    <button type="submit" class="btn btn-primary">
</form>