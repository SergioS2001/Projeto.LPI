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


// SQL query to fetch data
$query1 ="SELECT u.name, u.email, u.telemóvel, i.nome as nome_instituicao
FROM orientação_estagios oe
INNER JOIN orientadores o ON oe.orientadores_id = o.users_id
INNER JOIN estágios e ON oe.estágios_id = e.id
INNER JOIN instituicao_estagio i ON e.instituição_estagio_id = i.id
INNER JOIN users u ON o.users_id = u.id
WHERE u.isAdmin = 1";


$query2 ="SELECT u.name, u.email, u.telemóvel, e.nome as nome_estagio, i.nome as nome_instituicao
FROM users u
LEFT JOIN orientadores o ON u.id = o.users_id
LEFT JOIN orientação_estagios oe ON o.id = oe.orientadores_id
LEFT JOIN estágios e ON oe.estágios_id = e.id
LEFT JOIN instituicao_estagio i ON e.instituição_estagio_id = i.id
WHERE (u.isOrientador = true OR oe.orientadores_id IS NOT NULL)";

// Fetch data and store in $result variable
$result1 = $db->query($query1);
$result2 = $db->query($query2);
?>

<br>
<!-- Table for Orientadores -->
<table class="table caption-left">
<caption>Orientadores</caption>
          <thead>
            <tr>
              <th>Nome</th>
              <th>Estágio</th>
              <th>Instituição</th>
              <th>Email</th>
              <th>Contacto</th>
            </tr>
          </thead>
          <tbody>
    <?php while ($row = $result2->fetch()): ?>
      <tr>
        <td><?= $row['name'] ?></td>
        <td><?= $row['nome_estagio'] ?></td>
        <td><?= $row['nome_instituicao'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['telemóvel'] ?></td>
      </tr>
    <?php endwhile ?>
  </tbody>
</table>

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