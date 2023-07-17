<h2>Solicitação Estágio/EC</h2>
<table>
    <tr>
        <td>Estágio</td>
        <td>{{ $record->estágios_id }}</td>
    </tr>
    <tr>
        <td>Designação</td>
        <td>{{ $record->designação }}</td>
    </tr>
    <tr>
        <td>Objetivos</td>
        <td>{{ $record->objetivos }}</td>
    </tr>
    <tr>
        <td>Ano Letivo</td>
        <td>{{ $record->ano_letivo }}</td>
    </tr>
    <tr>
        <td>Número de Vagas</td>
        <td>{{ $record->vagas }}</td>
    </tr>
    <tr>
        <td>Carga Horária Total</td>
        <td>{{ $record->carga_horaria_total }} horas</td>
    </tr>
    <tr>
        <td>Metodologia de Avaliação</td>
        <td>{{ $record->metodologia_avaliação }}</td>
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