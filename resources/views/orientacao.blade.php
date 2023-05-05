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

$query = "SELECT estágios.nome AS estágios_nome,
                presenças.data, presenças.isValidated,
                MIN(presenças.h_entrada) AS h_entrada,
                MAX(presenças.h_saida) AS h_saida,
                SUM(presenças.h_pausa) AS h_pausa
          FROM historico
          JOIN estágios ON historico.estágios_id = estágios.id
          JOIN presenças ON presenças.estágios_id = estágios.id
          JOIN orientação_estagios ON orientação_estagios.estágios_id = estágios.id
          JOIN orientadores ON orientadores.users_id = orientação_estagios.orientadores_id
          WHERE historico.users_id = $user_id
          AND (orientadores.users_id = $user_id OR ($user_is_orientador = 1 AND orientação_estagios.orientadores_id = $user_id))
          GROUP BY estágios_nome, presenças.data";

// Fetch data and store in $result variable
$result = $db->query($query);
?>

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
  <tbody>
    <?php while ($row = $result->fetch()): ?>
      <tr>
        <td><?= $row['estágios_nome'] ?></td>
        <td><?= $row['users_id.name'] ?></td>
        <td><?= $row['data'] ?></td>
        <td><?= $row['h_entrada'] ?></td>
        <td><?= $row['h_saida'] ?></td>
        <td><?= $row['h_pausa'] ?></td>
        <td><?= $row['isValidated'] ? 'Sim' : 'Não' ?></td>
        <td>
          <?php if (!$row['isValidated']): ?>
            <form action="<?= route('orientacaoestagios.update', ['id' => $row['id']]) ?>" method="POST">
              <input type="hidden" name="_token" value="<?= csrf_token() ?>">
              <button type="submit" class="btn btn-primary">Validar</button>
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