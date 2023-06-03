<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyNotification;

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
                users.email AS user_email,
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
          WHERE orientadores.users_id = $user_id
          GROUP BY orientação_estagios.id, estágios_nome, user_name, presenças.data";

// Fetch data and store in $result variable
$result = $db->query($query);

?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    // Check if the submitted action is "Sim"
    if ($action === 'Sim') {
        // Iterate through the table rows and handle the selected action for each row
        while ($row = $result->fetch()) {
            if (!$row['isValidated'] && $row['presenças_id'] === $_POST['presenças_id']) {
                // Get the user's email address from the query result
                $userEmail = $row['user_email'];

                // Send the email notification
                Mail::to($userEmail)->send(new MyNotification($row['user_name'], $row['estágios_nome'], $row['data']));

                // Update the database or perform any other necessary actions based on the selected action
                // ...

                // Redirect or display a success message to the user
                return redirect()->back()->with('success', 'Email notification sent successfully.');
            }
        }
    } elseif ($action === 'Não') {
        // Get the user's email address from the query result
        $userEmail = $row['user_email'];

        // Send the email notification
        Mail::to($userEmail)->send(new MyNotification($row['user_name'], $row['estágios_nome'], $row['data']));

        // Redirect or display a success message to the user
        return redirect()->back()->with('success', 'Email notification sent successfully.');
    }
}
?>


<?php if ($result->rowCount() > 0): ?>
<!-- Table for Orientacao -->
<table class="table caption-top">
    <caption>Validar Presenças</caption>
    <thead>
    <tr>
        <th>Estágio/EC</th>
        <th>Aluno</th>
        <th>Data</th>
        <th>Hora de entrada</th>
        <th>Hora de saída</th>
        <th>Minutos de pausa</th>
        <th>Estado</th>
        <th colspan="2" style="text-align: center;">Validação</th>
    </tr>
    </thead>
    <tbody id="tableBody">
    <?php while ($row = $result->fetch()): ?>
        <tr>
            <td><?= $row['estágios_nome'] ?></td>
            <td><?= $row['user_name'] ?></td>
            <td><?= date('d/m/Y', strtotime($row['data'])) ?></td>
            <td><?= $row['h_entrada'] ?></td>
            <td><?= $row['h_saida'] ?></td>
            <td><?= $row['tempo_pausa'] ?></td>
            <td><?= $row['isValidated'] ? 'Validada' : 'Não Validada' ?></td>
            <td>
                <?php if (!$row['isValidated']): ?>
                <form action="{{ route('orientação.update', $row['presenças_id']) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="button-18 btn-primary" name="action" value="Sim">Sim</button>
                </form>
                <?php endif; ?>
            </td>
            <td>
                <?php if (!$row['isValidated']): ?>
                <form>
                    <button type="submit" class="button-18 btn-primary" name="action" value="Não">Não</button>
                </form>
                <?php endif; ?>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
<?php else: ?>
<p>Não existem presenças registadas por alunos!</p>
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
  }
  
.button-18 {
  align-items: center;
  background-color: #0A66C2;
  border: 0;
  border-radius: 100px;
  box-sizing: border-box;
  color: #ffffff;
  cursor: pointer;
  display: inline-flex;
  font-family: -apple-system, system-ui, system-ui, "Segoe UI", Roboto, "Helvetica Neue", "Fira Sans", Ubuntu, Oxygen, "Oxygen Sans", Cantarell, "Droid Sans", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Lucida Grande", Helvetica, Arial, sans-serif;
  font-size: 16px;
  font-weight: 600;
  justify-content: center;
  line-height: 20px;
  max-width: 480px;
  min-height: 40px;
  min-width: 0px;
  overflow: hidden;
  padding: 0px;
  padding-left: 20px;
  padding-right: 20px;
  text-align: center;
  touch-action: manipulation;
  transition: background-color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, box-shadow 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s;
  user-select: none;
  -webkit-user-select: none;
  vertical-align: middle;
}

.button-18:hover,
.button-18:focus { 
  background-color: #16437E;
  color: #ffffff;
}

.button-18:active {
  background: #09223b;
  color: rgb(255, 255, 255, .7);
}

.button-18:disabled { 
  cursor: not-allowed;
  background: rgba(0, 0, 0, .08);
  color: rgba(0, 0, 0, .3);
}

.button-14 {
  background-image: linear-gradient(#f7f8fa ,#e7e9ec);
  border-color: #adb1b8 #a2a6ac #8d9096;
  border-style: solid;
  border-width: 1px;
  border-radius: 3px;
  box-shadow: rgba(255,255,255,.6) 0 1px 0 inset;
  box-sizing: border-box;
  color: #0f1111;
  cursor: pointer;
  display: inline-block;
  font-family: "Amazon Ember",Arial,sans-serif;
  font-size: 14px;
  height: 29px;
  font-size: 13px;
  outline: 0;
  overflow: hidden;
  padding: 0 11px;
  text-align: center;
  text-decoration: none;
  text-overflow: ellipsis;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: nowrap;
}

.button-14:active {
  border-bottom-color: #a2a6ac;
}

.button-14:active:hover {
  border-bottom-color: #a2a6ac;
}

.button-14:hover {
  border-color: #a2a6ac #979aa1 #82858a;
}

.button-14:focus {
  border-color: #e77600;
  box-shadow: rgba(228, 121, 17, .5) 0 0 3px 2px;
  outline: 0;
}
</style>