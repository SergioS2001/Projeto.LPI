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
$query = "SELECT historico.id, agendamentos.data AS agendamentos_data,agendamentos.nome AS agendamentos_nome,agendamentos.hora AS agendamentos_hora, agendamentos.descrição AS agendamentos_descrição,agendamentos.duração AS agendamentos_duração, estágios.nome AS estágios_nome, tipo_agendamento.nome_evento AS tipo_agendamento_nome_evento, instituicao_estagio.nome AS instituicao_estagio_nome, curso_estagio.curso AS curso_estagio_curso, unidade_curricular.nome AS unidade_curricular_nome, estágios.data_inicial AS estágios_data_inicial, estágios.data_final AS estágios_data_final, serviços.titulo AS serviços_titulo, tipologia_estagio.titulo AS tipologia_estagio_titulo, estágios.ano_curricular AS estágios_ano_curricular
FROM historico
JOIN agendamentos ON historico.agendamentos_id = agendamentos.id
JOIN estágios ON historico.estágios_id = estágios.id
JOIN tipo_agendamento ON agendamentos.tipo_agendamento_id = tipo_agendamento.id
JOIN instituicao_estagio ON estágios.instituição_estagio_id = instituicao_estagio.id
JOIN curso_estagio ON estágios.curso_estagio_id = curso_estagio.id
JOIN unidade_curricular ON estágios.unidade_curricular_id = unidade_curricular.id
JOIN serviços ON estágios.serviços_id = serviços.id
JOIN tipologia_estagio ON estágios.tipologia_estagio_id = tipologia_estagio.id";


// Fetch data and store in $result variable
$result = $db->query($query);

?>


<!-- Table for Agendamentos -->
<table class="table caption-top">
<caption>Agendamentos</caption>
  <thead>
    <tr>
    <th>Nome</th>
    <th>Data</th>
    <th>Hora</th>
    <th>Tipo</th>
    <th>Descrição</th>
    <th>Duração(minutos)</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result->fetch()): ?>
      <tr>
      <td><?= $row['agendamentos_nome'] ?></td>
      <td><?= $row['agendamentos_data'] ?></td>
      <td><?= number_format($row['agendamentos_hora'], 2) ?></td>
      <td><?= $row['tipo_agendamento_nome_evento'] ?></td>
      <td><?= $row['agendamentos_descrição'] ?></td>
      <td><?= $row['agendamentos_duração'] ?></td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<br><br>
<!-- Table for Estagios -->
<table class="table caption-top">
<caption>Estágios</caption>
  <thead>
    <tr>
      <th>Nome</th>
      <th>Instituição</th>
      <th>Curso</th>
      <th>Unidade Curricular</th>
      <th>Ano Curricular</th>
      <th>Serviços</th>
      <th>Tipologia</th>
      <th>Data inicial</th>
      <th>Data final</th>

    </tr>
  </thead>
  <tbody>
    <?php $result->execute(); // reset the result pointer ?>
    <?php while ($row = $result->fetch()): ?>
      <tr>
        <td><?= $row['estágios_nome'] ?></td>
        <td><?= $row['instituicao_estagio_nome'] ?></td>
        <td><?= $row['curso_estagio_curso'] ?></td>
        <td><?= $row['unidade_curricular_nome'] ?></td>
        <td><?= $row['estágios_ano_curricular'] ?></td>
        <td><?= $row['serviços_titulo'] ?></td>
        <td><?= $row['tipologia_estagio_titulo'] ?></td>
        <td><?= $row['estágios_data_inicial'] ?></td>
        <td><?= $row['estágios_data_final'] ?></td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<!-- Add this CSS to your stylesheet or HTML -->
<style>
  table {
    border-collapse: collapse;
    width: 100%;
  }
  
  th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    width: 220px; /* or any other desired width */
  }
  
  th {
    background-color: DeepSkyBlue;
    color: white;
  }
  
  tr:hover {
    background-color: #ADD8E6;
  }
  
  caption {
    font-size: 1.2em;
    font-weight: bold;
    margin-bottom: 1em;
  }
</style>