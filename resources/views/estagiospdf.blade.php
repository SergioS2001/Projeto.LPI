<h2>Estágio/EC</h2>
<table>
    <tr>
        <td>Nome</td>
        <td>{{ $record->nome }}</td>
    </tr>
    <tr>
        <td>Instituição</td>
    </tr>
    <tr>
        <td>Curso</td>
    </tr>
    <tr>
        <td>Unidade Curricular</td>
    </tr>
    <tr>
        <td>Ano Curricular</td>
        <td>{{ $record->ano_curricular }}</td>
    </tr>
    <tr>
        <td>Serviços</td>
    </tr>
    <tr>
        <td>Tipologia</td>
    </tr>
    <tr>
        <td>Data Inicial</td>
        <td>{{ date('d-m-Y', strtotime($record->data_inicial)) }}</td>
    </tr>
    <tr>
        <td>Data Final</td>
        <td>{{ date('d-m-Y', strtotime($record->data_final)) }}</td>
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