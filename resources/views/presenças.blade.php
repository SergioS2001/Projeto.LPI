<!DOCTYPE html>
<html>
<head>
    <title>Presenças</title>
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
</head>
<body>
<h2>Presença Registada</h2>
<table>
    <tr>
        <td>Aluno</td>
        <td>{{ $aluno }}</td>
    </tr>
    <tr>
        <td>Estágio/EC</td>
        <td>{{ $estagio }}</td>
    </tr>
    <tr>
        <td>Data</td>
        <td>{{ date('d-m-Y', strtotime($record->data)) }}</td>
    </tr>
    <tr>
        <td>Hora de Entrada</td>
        <td>{{ $record->h_entrada }}</td>
    </tr>
    <tr>
        <td>Hora de Saída</td>
        <td>{{ $record->h_saida }}</td>
    </tr>
    <tr>
        <td>Tempo de Pausa</td>
        <td>{{ $record->tempo_pausa }} minutos</td>
    </tr>
    <tr>
        <td>Estado</td>
        <td>{{ $record->isValidated ? 'Validada por Orientador local' : 'Não Validada por Orientador local'}}</td>
    </tr>
</table>
</body>
</html>


