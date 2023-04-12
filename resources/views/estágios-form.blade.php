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
tipologia_estagio.titulo AS tipologia_estagio_titulo,
estágios.data_inicial AS estágios_data_inicial,
estágios.data_final AS estágios_data_final
FROM
estágios
JOIN instituicao_estagio ON estágios.instituicao_estagio_id = instituicao_estagio.id
JOIN curso_estagio ON estágios.curso_estagio_id = curso_estagio.id
JOIN unidade_curricular ON estágios.unidade_curricular_id = unidade_curricular.id
JOIN serviços ON estágios.serviços_id = serviços.id
JOIN tipologia_estagio ON estágios.tipologia_estagio_id = tipologia_estagio.id";

// Fetch data and store in $result variable
$result = $db->query($query);

?>