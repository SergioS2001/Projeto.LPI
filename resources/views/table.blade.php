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
  $db = new PDO($dsn, $user, $password, $options);
  //$db = new PDO('mysql:host=localhost;dbname=lpi','root','root');

} catch (PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
}

// Get authenticated user's ID
$user_id = Auth::id();

// SQL query to fetch data
$query1 ="SELECT DISTINCT
estágios.id,
estágios.nome AS estágios_nome,
instituicao_estagio.nome AS instituicao_estagio_nome,
curso_estagio.curso AS curso_estagio_curso,
unidade_curricular.nome AS unidade_curricular_nome,
estágios.data_inicial AS estágios_data_inicial,
estágios.data_final AS estágios_data_final,
serviços.titulo AS serviços_titulo,
tipologia_estagio.titulo AS tipologia_estagio_titulo,
estágios.ano_curricular AS estágios_ano_curricular,
users.name AS orientador_nome
FROM orientação_estagios
JOIN estágios ON orientação_estagios.estágios_id = estágios.id
JOIN instituicao_estagio ON estágios.instituição_estagio_id = instituicao_estagio.id
JOIN curso_estagio ON estágios.curso_estagio_id = curso_estagio.id
JOIN unidade_curricular ON estágios.unidade_curricular_id = unidade_curricular.id
JOIN serviços ON estágios.serviços_id = serviços.id
JOIN tipologia_estagio ON estágios.tipologia_estagio_id = tipologia_estagio.id
JOIN orientadores ON orientação_estagios.orientadores_id = orientadores.id
JOIN users ON orientadores.users_id = users.id
WHERE orientação_estagios.users_id = $user_id";

$query2 = "SELECT agendamentos.data AS agendamentos_data,agendamentos.nome AS agendamentos_nome,agendamentos.hora AS agendamentos_hora, agendamentos.descrição AS agendamentos_descrição,agendamentos.duração AS agendamentos_duração
FROM historico_agendamentos
JOIN agendamentos ON historico_agendamentos.agendamentos_id = agendamentos.id
WHERE historico_agendamentos.users_id=$user_id";

$query3 = "SELECT 
    users.name AS orientador_nome,
    estágios.nome AS estágios_nome,
    avaliacao_modulos.nota_final AS avaliações_nota,
    isDone AS avaliações_isDone
FROM avaliacao_modulos
JOIN avaliações ON avaliacao_modulos.avaliações_id = avaliações.id
JOIN orientação_estagios ON avaliações.orientação_estagios_id = orientação_estagios.id
JOIN orientadores ON orientação_estagios.orientadores_id = orientadores.id
JOIN users ON orientadores.users_id = users.id
JOIN estágios ON orientação_estagios.estágios_id = estágios.id
WHERE orientação_estagios.users_id = $user_id";


$query4 = "SELECT estágios.nome as estágios_nome, cacifos.numero as cacifo_nome, cauções.isPago as cauções_isPago, cauções.isDevolvido as cauções_isDevolvido
FROM cacifo_estagio
JOIN estágios ON cacifo_estagio.estágios_id = estágios.id
JOIN cacifos ON cacifo_estagio.cacifos_id = cacifos.id
JOIN cauções ON cacifo_estagio.cauções_id = cauções.id
WHERE cacifo_estagio.users_id = $user_id";

// Fetch data and store in $result variable
$result1 = $db->query($query1); //Estágios
$result2 = $db->query($query2); //Eventos
$result3 = $db->query($query3); //avaliações
$result4 = $db->query($query4); //Cacifos
?>

<?php if ($result1->rowCount() > 0): ?>
  <!-- Table for Estagios -->
<table class="table caption-left">
  <caption>Estágios/EC</caption>
  <thead>
    <tr>
      <th>Nome</th>
      <th>Orientador</th>
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
    <?php while ($row = $result1->fetch()): ?>
      <tr>
        <td><?= $row['estágios_nome'] ?></td>
        <td><?= $row['orientador_nome'] ?></td>
        <td><?= $row['instituicao_estagio_nome'] ?></td>
        <td><?= $row['curso_estagio_curso'] ?></td>
        <td><?= $row['unidade_curricular_nome'] ?></td>
        <td><?= $row['estágios_ano_curricular'] ?></td>
        <td><?= $row['serviços_titulo'] ?></td>
        <td><?= $row['tipologia_estagio_titulo'] ?></td>
        <td><?= $row['estágios_data_inicial'] ?></td>
        <td><?= $row['estágios_data_final'] ?></td>
      </tr>
    <?php endwhile ?>
  </tbody>
</table>
<?php else: ?>
<?php endif; ?>

<br><br>
<!-- Table for Avaliações -->
<?php if ($result3->rowCount() > 0): ?>
<table class="table caption-left">
  <caption>Avaliações</caption>
  <thead>
    <tr>
      <th>Estágio</th>
      <th>Orientador</th>
      <th>Nota</th>
      <th>Concluído</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result3->fetch()): ?>
      <tr>
        <td><?= $row['estágios_nome'] ?></td>
        <td><?= $row['orientador_nome'] ?></td>
        <td><?= $row['avaliações_nota'] ?></td>
        <td><?= $row['avaliações_isDone'] ? 'Sim' : 'Não' ?></td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>
<?php else: ?>
<?php endif; ?>

<br><br>
<!-- Table for Cacifos -->
<?php if ($result4->rowCount() > 0): ?>
<table class="table caption-left">
  <caption>Cacifos</caption>
  <thead>
    <tr>
      <th>Estágio</th>
      <th>Cacifo</th>
      <th>Pagamento Caução</th>
      <th>Reembolso Caução</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result4->fetch()): ?>
      <tr>
      <td><?= $row['estágios_nome'] ?></td>
      <td><?= $row['cacifo_nome'] ?></td>
      <td><?= $row['cauções_isPago'] ? 'Sim' : 'Não' ?></td>
      <td><?= $row['cauções_isDevolvido'] ? 'Sim' : 'Não' ?></td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>
<?php else: ?>
<?php endif; ?>

<br><br><br>
<?php if ($result2->rowCount() > 0): ?>
<!-- Table for Agendamentos -->
<table class="table caption-left">
<caption>Agendamentos</caption>
  <thead>
    <tr>
    <th>Nome</th>
    <th>Descrição</th>
    <th>Data</th>
    <th>Hora</th>
    <th>Duração(minutos)</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result2->fetch()): ?>
      <tr>
      <td><?= $row['agendamentos_nome'] ?></td>
      <td><?= $row['agendamentos_descrição'] ?></td>
      <td><?= $row['agendamentos_data'] ?></td>
      <td><?= number_format($row['agendamentos_hora'], 2) ?></td>
      <td><?= $row['agendamentos_duração'] ?></td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>
<?php else: ?>
<?php endif; ?>


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