<?php include("conecta.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Recrutamento</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #fff;
    color: #000;
    margin: 0;
    padding: 0;
}

h1 {
    color: #6c63ff;
    margin-bottom: 20px;
}

.container {
    padding: 40px;
    max-width: 800px;
    margin: auto;
}

input, select, textarea {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 6px;
}

button {
    background-color: #6c63ff;
    color: #fff;
    border: none;
    padding: 12px 20px;
    border-radius: 6px;
    cursor: pointer;
}

button:hover {
    background-color: #5549d3;
}

</style>
<body>
<div class="container">
    <h1>Cadastro de Candidatos</h1>
    <form action="recrutamento.php" method="POST">
        <input type="text" name="nome" placeholder="Nome completo" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="text" name="vaga" placeholder="Vaga de interesse" required>
        <input type="file" name="curriculo" placeholder="Resumo do currículo"></input>
        <button type="submit">Enviar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $vaga = $_POST['vaga'];
        $curriculo = $_POST['curriculo'];

        $sql = "INSERT INTO recrutamento (nome, email, vaga, curriculo)
                VALUES ('$nome', '$email', '$vaga', '$curriculo')";
        if (mysqli_query($conexao, $sql)) {
            echo "<p>Candidato cadastrado com sucesso!</p>";
        } else {
            echo "<p>Erro: " . mysqli_error($conexao) . "</p>";
        }
    }
    ?>
</div>
</body>
</html>
