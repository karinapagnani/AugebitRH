<?php include("conecta.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Férias e Licenças</title>
    <link rel="stylesheet" href="style.css">
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
    <h1>Controle de Férias e Licenças</h1>
    <form method="POST" action="">
        <input type="text" name="funcionario" placeholder="Nome do funcionário" required>
        <label for="inicio">Início das férias</label>
        <input type="date" name="inicio" required>
        <label for="fim">Fim das férias</label>
        <input type="date" name="fim" required>
        <label>Status:</label>
        <select name="status">
            <option value="Pendente">Pendente</option>
            <option value="Aprovada">Aprovada</option>
            <option value="Rejeitada">Rejeitada</option>
        </select>
        <button type="submit">Registrar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $funcionario = $_POST['funcionario'];
        $inicio = $_POST['inicio'];
        $fim = $_POST['fim'];
        $status = $_POST['status'];

        $sql = "INSERT INTO ferias (funcionario, inicio, fim, status)
                VALUES ('$funcionario', '$inicio', '$fim', '$status')";

        if (mysqli_query($conexao, $sql)) {
            echo "<p>Registro salvo com sucesso!</p>";
        } else {
            echo "<p>Erro ao registrar: " . mysqli_error($conexao) . "</p>";
        }
    }
    ?>
</div>
</body>
</html>
