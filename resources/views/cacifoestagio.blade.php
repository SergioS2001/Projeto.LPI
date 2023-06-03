<!DOCTYPE html>
<html>
<head>
    <title>Cacifo Estágios Information</title>
    <style>
        /* Define your custom styles for the PDF */
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Cacifo Estágio</h1>
    <table>
        <tr>
            <td>Aluno</td>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <td>Estágio</td>
            <td>{{ $estagio->nome }}</td>
        </tr>
        <tr>
            <td>Número Cacifo</td>
            <td>{{ $cacifo->numero }}</td>
        </tr>
        <tr>
            <td>Estado Caução</td>
            <td>{{ $caucao->isPago ? 'Paga' : 'Não Paga' }}</td>
        </tr>
    </table>
</body>
</html>
