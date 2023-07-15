<h2>Aluno</h2>
<table>
    <tr>
        <td>Nome</td>
        <td>{{ $record->name }}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{ $record->email }}</td>
    </tr>
    <tr>
        <td>Data de Nascimento</td>
        <td>{{ date('d-m-Y', strtotime($record->data_nascimento)) }}</td>
    </tr>
    <tr>
        <td>Cartão de Cidadão</td>
        <td>{{ $record->cartão_cidadão }}</td>
    </tr>
    <tr>
        <td>Telemóvel</td>
        <td>{{ $record->telemóvel }}</td>
    </tr>
    <tr>
        <td>Morada</td>
        <td>{{ $record->morada }}</td>
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