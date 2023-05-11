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
  //$db = new PDO($dsn, $user, $password, $options);
  $db = new PDO('mysql:host=localhost;dbname=lpi','root','root');

} catch (PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$user_id = Auth::id();
$user_is_orientador = DB::table('users')->where('id', $user_id)->value('isOrientador');

$query = "SELECT orientação_estagios.id AS orientação_estagios_id,
                estágios.nome AS estágios_nome,
                users.name AS user_name,
                presenças.data,
                presenças.isValidated,
                MIN(presenças.h_entrada) AS h_entrada,
                MAX(presenças.h_saida) AS h_saida,
                SUM(presenças.tempo_pausa) AS tempo_pausa,
                presenças.id AS presenças_id
          FROM orientação_estagios
          JOIN estágios ON orientação_estagios.estágios_id = estágios.id
          JOIN users ON orientação_estagios.users_id = users.id
          JOIN presenças ON presenças.orientação_estagios_id = orientação_estagios.id
          JOIN orientadores ON orientação_estagios.orientadores_id = orientadores.id
          WHERE orientação_estagios.users_id = $user_id
          AND (orientadores.users_id = $user_id OR ($user_is_orientador = 1 AND orientação_estagios.orientadores_id = $user_id))
          GROUP BY orientação_estagios.id, estágios_nome, user_name, presenças.data";

// Fetch data and store in $result variable
$result = $db->query($query);

?>

<!-- Search form -->
<form id="searchForm" action="{{ route('orientação.search') }}" method="GET">
    <input type="text" id="searchInput" name="search" placeholder="Search...">
    <button type="submit">Search</button>
</form>

<!-- Table for Orientacao -->
<table class="table caption-top">
  <caption>Validar Presenças</caption>
  <thead>
    <tr>
      <th>Estágio</th>
      <th>Aluno</th>
      <th>Data</th>
      <th>Hora de entrada</th>
      <th>Hora de saída</th>
      <th>Tempo de pausa (Minutos)</th>
      <th>Validada</th>
      <th>Validar</th>
    </tr>
  </thead>
  <tbody id="tableBody">
    <?php while ($row = $result->fetch()): ?>
      <tr>
        <td><?= $row['estágios_nome'] ?></td>
        <td><?= $row['user_name'] ?></td>
        <td><?= $row['data'] ?></td>
        <td><?= $row['h_entrada'] ?></td>
        <td><?= $row['h_saida'] ?></td>
        <td><?= $row['tempo_pausa'] ?></td>
        <td><?= $row['isValidated'] ? 'Sim' : 'Não' ?></td>
        <td>
    <?php if (!$row['isValidated']): ?>
      <form action="{{ route('orientação.update', $row['presenças_id']) }}" method="POST">
            @method('PUT')
            @csrf
            <button type="submit" class="btn btn-primary" style="background-color: darkgrey; color: white;">Validar</button>
        </form>
    <?php endif; ?>
</td>
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