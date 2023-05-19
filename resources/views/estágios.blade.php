<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
  //$db = new PDO('mysql:host=localhost;dbname=lpi','root','root');

} catch (PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$user_id = Auth::id();

$query = "SELECT estágios.id,
estágios.nome AS estágios_nome,
instituicao_estagio.nome AS instituicao_estagio_nome,
curso_estagio.curso AS curso_estagio_curso,
unidade_curricular.nome AS unidade_curricular_nome,
estágios.data_inicial AS estágios_data_inicial,
estágios.data_final AS estágios_data_final,
serviços.titulo AS serviços_titulo,
tipologia_estagio.titulo AS tipologia_estagio_titulo,
estágios.ano_curricular AS estágios_ano_curricular,
users.name AS orientador_nome,
orientação_estagios.horario_apresentacao AS horario_apresentacao
FROM estágios
JOIN instituicao_estagio ON estágios.instituição_estagio_id = instituicao_estagio.id
JOIN curso_estagio ON estágios.curso_estagio_id = curso_estagio.id
JOIN unidade_curricular ON estágios.unidade_curricular_id = unidade_curricular.id
JOIN serviços ON estágios.serviços_id = serviços.id
JOIN tipologia_estagio ON estágios.tipologia_estagio_id = tipologia_estagio.id
JOIN orientação_estagios ON estágios.id = orientação_estagios.estágios_id
JOIN orientadores ON orientação_estagios.orientadores_id = orientadores.id
JOIN users ON orientadores.users_id = users.id
WHERE orientação_estagios.users_id = $user_id AND estágios.isAdmitido = 1";

// Fetch data and store in $result variable
$result1 = $db->query($query);

?>

<table class="table caption-top">
  <caption>Estágio/EC Admitido</caption>
  <thead>
    <tr>
      <th>Nome</th>
      <th>Orientador</th>
      <th>Apresentação</th>
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
    <?php $result1->execute(); // reset the result pointer ?>
    <?php while ($row = $result1->fetch()): ?>
      <tr>
        <td><?= $row['estágios_nome'] ?></td>
        <td><?= $row['orientador_nome'] ?></td>
        <td><?= $row['horario_apresentacao'] ?></td>
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

  button {
  background-color: grey;
  border: black;
  color: white;
  padding: 12px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 4px;
}

</style>