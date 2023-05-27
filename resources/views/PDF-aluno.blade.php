<!DOCTYPE html>
<html>
<head>
    <title>Certificado Conclusão</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.4;
            color: #333333;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            border: 1px solid #dddddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Certificado</h1>
    <?php
    use Illuminate\Support\Facades\Auth;
    $user_id = Auth::id();
    $query = "SELECT
    estágios.nome AS estágios_nome,
    users.name AS user_name,
    users.cartão_cidadão AS cartão_cidadao,
    users.data_nascimento AS data_nascimento,
    estágios.data_inicial AS estágios_data_inicial,
estágios.data_final AS estágios_data_final,
    orientador_user.name AS orientador_name,
    instituicao_estagio.nome AS instituicao_estagio_nome,
    curso_estagio.curso AS curso_estagio_curso,
    serviços.titulo AS serviços_titulo,
tipologia_estagio.titulo AS tipologia_estagio_titulo,
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
JOIN serviços ON estágios.serviços_id = serviços.id
JOIN tipologia_estagio ON estágios.tipologia_estagio_id = tipologia_estagio.id
JOIN users ON orientação_estagios.users_id = users.id
JOIN users AS orientador_user ON orientadores.users_id = orientador_user.id
LEFT JOIN (
    SELECT orientação_estagios_id, COUNT(*) AS presenças_count, SUM(tempo_pausa) AS presenças_total_horas
    FROM presenças
    WHERE isValidated = 1 -- Condition added
    GROUP BY orientação_estagios_id
) AS presenças ON orientação_estagios.id = presenças.orientação_estagios_id
LEFT JOIN avaliações ON avaliações.orientação_estagios_id = orientação_estagios.id
WHERE orientação_estagios.users_id = $user_id";

    $db = new PDO('mysql:host=localhost;dbname=lpi', 'root', 'root');
    $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <?php foreach ($result as $row): ?>
        <p><strong>Aluno:</strong> <?= $row['user_name'] ?></p>
        <p><strong>Data de Nascimento:</strong> <?= $row['data_nascimento'] ?></p>
        <p><strong>Cartão de Cidadão:</strong> <?= $row['cartão_cidadao'] ?></p>
        <p><strong>Estágios/EC:</strong> <?= $row['estágios_nome'] ?></p>
        <p><strong>Orientador:</strong> <?= $row['orientador_name'] ?></p>
        <p><strong>Instituição:</strong> <?= $row['instituicao_estagio_nome'] ?></p>
        <p><strong>Curso:</strong> <?= $row['curso_estagio_curso'] ?></p>
        <p><strong>Unidade Curricular:</strong> <?= $row['unidade_curricular_nome'] ?></p>
        <p><strong>Ano Curricular:</strong> <?= $row['estágios_ano_curricular'] ?></p>
        <p><strong>Serviços:</strong> <?= $row['serviços_titulo'] ?></p>
        <p><strong>Tipologia:</strong> <?= $row['tipologia_estagio_titulo'] ?></p>
        <p><strong>Data inicial:</strong> <?= date('d-m-Y', strtotime($row['estágios_data_inicial'])) ?></p>
        <p><strong>Data final:</strong> <?= date('d-m-Y', strtotime($row['estágios_data_final'])) ?></p>
        <p><strong>Número de presenças:</strong> <?= $row['avaliações_count_presenças'] ?></p>
        <p><strong>Carga Horária Realizada:</strong> <?= $row['avaliações_total_horas'] ?></p>
        <p><strong>Nota Final:</strong> <?= $row['avaliações_nota'] ?></p>
        <hr>
    <?php endforeach; ?>
</body>
</html>