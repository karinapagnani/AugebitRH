<?php
include('conecta.php');

if (!isset($_GET['id'])) {
    echo "ID do usuário não fornecido.";
    exit;
}

$id = $_GET['id'];

$query = "SELECT * FROM $tabela WHERE id = $id";
$resultado = $link->query($query);

if ($resultado && $resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();
} else {
    echo "Usuário não encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perfil do Usuário</title>
    <style>
        body { font-family: Arial; margin: 20px; background: #f5f5f5; }
        .container { background: white; padding: 20px; border-radius: 10px; width: 80%; margin: auto; box-shadow: 0 0 10px #ccc; }
        h2 { text-align: center; }
        p { margin: 10px 0; }
        label { font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <h2>Perfil de <?= htmlspecialchars($usuario['nome']) ?></h2>
    <p><label>Email:</label> <?= htmlspecialchars($usuario['email']) ?></p>
    <p><label>Telefone:</label> <?= htmlspecialchars($usuario['telefone']) ?></p>
    <p><label>CPF:</label> <?= htmlspecialchars($usuario['cpf']) ?></p>
    <p><label>Setor:</label> <?= htmlspecialchars($usuario['setor']) ?></p>
    <p><label>Nascimento:</label> <?= htmlspecialchars($usuario['nascimento']) ?></p>
    <p><label>Biografia:</label> <?= nl2br(htmlspecialchars($usuario['biografia'])) ?></p>
    <p><label>Email Secundário:</label> <?= htmlspecialchars($usuario['email_secundario']) ?></p>
    <p><label>Celular:</label> <?= htmlspecialchars($usuario['celular']) ?></p>
    <p><label>Endereço:</label> <?= htmlspecialchars($usuario['logadouro']) . ', ' . htmlspecialchars($usuario['numero']) . ' - ' . htmlspecialchars($usuario['bairro']) . ', ' . htmlspecialchars($usuario['cidade']) . ' - ' . htmlspecialchars($usuario['estado']) . ', ' . htmlspecialchars($usuario['cep']) ?></p>
    <p><label>Complemento:</label> <?= htmlspecialchars($usuario['complemento']) ?></p>
    <p><label>LinkedIn:</label> <a href="<?= htmlspecialchars($usuario['linkedin']) ?>" target="_blank"><?= htmlspecialchars($usuario['linkedin']) ?></a></p>
    <p><label>GitHub:</label> <a href="<?= htmlspecialchars($usuario['github']) ?>" target="_blank"><?= htmlspecialchars($usuario['github']) ?></a></p>
    <p><label>Instagram:</label> <a href="<?= htmlspecialchars($usuario['instagram']) ?>" target="_blank"><?= htmlspecialchars($usuario['instagram']) ?></a></p>
</div>
</body>
</html>
