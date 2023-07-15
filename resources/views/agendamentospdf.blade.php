<h2>Agendamento</h2>
<table>
    <tr>
        <td>Nome</td>
        <td>{{ $record->nome }}</td>
    </tr>
    <tr>
        <td>Descrição</td>
        <td>{{ $record->descrição }}</td>
    </tr>
    <tr>
        <td>Data</td>
        <td>{{ date('d-m-Y', strtotime($record->data)) }}</td>
    </tr>
    <tr>
        <td>Hora de Inicio</td>
        <td>{{ $record->hora }}</td>
    </tr>
    <tr>
        <td>Hora de Encerramento</td>
        <td>{{ $record->hora_fim }}</td>
    </tr>
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
    caption-side: left;
    text-align: left;
  }

</style>