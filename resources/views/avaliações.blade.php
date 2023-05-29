<h2>Avaliação</h2>
<table>
    <tr>
        <td>Aluno</td>
        <td>{{ $aluno->name }}</td>
    </tr>
    <tr>
        <td>Estágio</td>
        <td>{{ $estagio->nome }}</td>
    </tr>
    <tr>
        <td>Número de Módulos</td>
        <td>{{ $record->module_count }}</td>
    </tr>
    <tr>
        <td>Nota Final</td>
        <td>{{ $record->nota_final }}</td>
    </tr>
    <tr>
        <td>Estado</td>
        <td>{{ $record->isDone ? 'Concluído com sucesso' : 'Não Concluído' }}</td>
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