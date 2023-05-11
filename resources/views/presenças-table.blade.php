<?php
use Illuminate\Support\Facades\Auth;

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

// Get authenticated user's ID
$user_id = Auth::id();

// SQL query to fetch data
$query = "SELECT estágios.nome AS estágios_nome, 
                presenças.data, presenças.isValidated,
                MIN(presenças.h_entrada) AS h_entrada, 
                MAX(presenças.h_saida) AS h_saida, 
                SUM(presenças.tempo_pausa) AS tempo_pausa
          FROM orientação_estagios
          JOIN estágios ON orientação_estagios.estágios_id = estágios.id
          JOIN presenças ON presenças.orientação_estagios_id = orientação_estagios.id
          WHERE orientação_estagios.users_id = $user_id
          GROUP BY estágios_nome, presenças.data";

// Fetch data and store in $result variable
$result = $db->query($query);

?>


<!-- Table for Agendamentos -->
<table class="table caption-top">
<caption>Presenças</caption>
  <thead>
    <tr>
      <th>Estágio</th>
      <th>Data</th>
      <th>Hora de entrada</th>
      <th>Hora de saída</th>
      <th>Pausa(Minutos)</th>
      <th>Validada por Orientador</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result->fetch()): ?>
      <tr>
      <td><?= $row['estágios_nome'] ?></td>
      <td><?= $row['data'] ?></td>
      <td><?= $row['h_entrada'] ?></td>
      <td><?= $row['h_saida'] ?></td>
      <td><?= $row['tempo_pausa'] ?></td>
      <td><?= $row['isValidated'] ? 'Sim' : 'Não' ?></td>
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