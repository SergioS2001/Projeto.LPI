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
$query = "SELECT nota_final AS nota_final,
                users.name AS user_name,
                estágios.nome AS estágios_nome
          FROM avaliações
          JOIN orientação_estagios ON avaliações.orientação_estagios_id = orientação_estagios.id
          JOIN orientadores ON orientação_estagios.orientadores_id = orientadores.id
          JOIN users ON orientação_estagios.users_id = users.id
          JOIN estágios ON orientação_estagios.estágios_id = estágios.id
          WHERE orientadores.users_id = $user_id";

// Fetch data and store in $result variable
$result = $db->query($query);
?>


<table class="table caption-left">
<caption>Avaliações registadas:</caption>
  <thead>
    <tr>
      <th>Estágio/EC</th>
      <th>Aluno</th>
      <th>Nota Final</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result->fetch()): ?>
      <tr>
      <td><?= $row['estágios_nome'] ?></td>
      <td><?= $row['user_name'] ?></td>
      <td><?= $row['nota_final'] ?></td>
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
    caption-side: left;
    text-align: left;
  }
</style>