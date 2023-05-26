<!DOCTYPE html>
<html>
<head>
    <title>Avaliação PDF</title>
    <style>
        /* Define your custom styles for the PDF */
        /* You can adjust the layout, font sizes, colors, etc. */
    </style>
</head>
<body>
    <h1>Avaliação</h1>

    <h2>Aluno: {{ $aluno->name }}</h2>
    <h2>Estágio: {{ $estagio->nome }}</h2>
    <h2>Orientador: {{ $orientador->name }}</h2>
    <h2>Nota: {{ $record->nota }}</h2>

    <!-- Add more sections or content as needed -->

</body>
</html>
