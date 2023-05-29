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
$query = "SELECT
    estágios.nome AS estágios_nome,
    users.name AS user_name,
    orientador_user.name AS orientador_name,
    instituicao_estagio.nome AS instituicao_estagio_nome,
    curso_estagio.curso AS curso_estagio_curso,
    unidade_curricular.nome AS unidade_curricular_nome,
    estágios.ano_curricular AS estágios_ano_curricular,
    COALESCE(presenças_count, 0) AS avaliações_count_presenças,
    COALESCE(presenças_total_horas, 0) AS avaliações_total_horas,
    COALESCE(avaliações.nota_final, 0) AS avaliações_nota
FROM orientação_estagios
JOIN estágios ON orientação_estagios.estágios_id = estágios.id
JOIN instituicao_estagio ON estágios.instituição_estagio_id = instituicao_estagio.id
JOIN curso_estagio ON estágios.curso_estagio_id = curso_estagio.id
JOIN unidade_curricular ON estágios.unidade_curricular_id = unidade_curricular.id
JOIN orientadores ON orientação_estagios.orientadores_id = orientadores.id
JOIN users ON orientação_estagios.users_id = users.id
JOIN users AS orientador_user ON orientadores.users_id = orientador_user.id
LEFT JOIN (
    SELECT orientação_estagios_id, COUNT(*) AS presenças_count, SUM(tempo_pausa) AS presenças_total_horas
    FROM presenças
    WHERE isValidated = 1
    GROUP BY orientação_estagios_id
) AS presenças ON orientação_estagios.id = presenças.orientação_estagios_id
JOIN avaliações ON avaliações.orientação_estagios_id = orientação_estagios.id
WHERE orientação_estagios.users_id = $user_id";


// Fetch data and store in $result variable
$result = $db->query($query); 
?>

<?php if ($result->rowCount() > 0): ?>
  <!-- Table for Estagios -->
<table class="table caption-left">
  <thead>
    <tr>
      <th>Aluno</th>
      <th>Estágios/EC</th>
      <th>Orientador</th>
      <th>Instituição</th>
      <th>Curso</th>
      <th>UC</th>
      <th>Número de presenças</th>
      <th>Carga Horária Realizada</th>
      <th>Nota Final</th>
      
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result->fetch()): ?>
      <tr>
      <td><?= $row['user_name'] ?></td>
        <td><?= $row['estágios_nome'] ?></td>
        <td><?= $row['orientador_name'] ?></td>
        <td><?= $row['instituicao_estagio_nome'] ?></td>
        <td><?= $row['curso_estagio_curso'] ?></td>
        <td><?= $row['unidade_curricular_nome'] ?></td>
        <td><?= $row['avaliações_count_presenças'] ?></td>
        <td><?= $row['avaliações_total_horas'] ?></td>
        <td><?= $row['avaliações_nota'] ?></td>
      </tr>
    <?php endwhile ?>
  </tbody>
</table>

<br>
<a href="{{ route('certificadoaluno') }}" id="downloadBtn">Download as PDF</a>
<?php else: ?>
  <p>Não existem certificados!</p>
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
  #downloadBtn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007bff;
  color: #ffffff;
  text-decoration: none;
  border-radius: 4px;
  border: none;
  cursor: pointer;
}

#downloadBtn:hover {
  background-color: #0069d9;
}


</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
<script>
  document.getElementById('downloadBtn').addEventListener('click', function() {
    // Initialize jsPDF
    var doc = new jsPDF();

    // Get the table element
    var table = document.getElementById('yourTableId');

    // Convert table to HTML string
    var tableHtml = table.outerHTML;

    // Generate PDF
    doc.fromHTML(tableHtml, 10, 10);

    // Save the PDF
    doc.save('table.pdf');
  });
</script>
