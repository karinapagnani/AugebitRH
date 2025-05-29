<?php
include('conecta.php');

// Obtenção dos dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];
$cpf = $_POST['cpf'];
$setor = $_POST['setor'];
$nascimento = $_POST['nascimento'];
$biografia = $_POST['biografia'];
$email_secundario = $_POST['email_secundario'];
$celular = $_POST['celular'];
$cep = $_POST['cep'];
$logadouro = $_POST['logadouro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$linkedin = $_POST['linkedin'];
$github = $_POST['github'];
$instagram = $_POST['instagram'];

// Query de inserção
$query = "INSERT INTO $tabela (
    nome, email, telefone, senha, setor, nascimento, biografia,
    email_secundario, celular, cep, logadouro, numero, complemento,
    bairro, cidade, estado, linkedin, github, instagram
) VALUES (
    '$nome', '$email', '$telefone', '$senha', '$setor', '$nascimento', '$biografia',
    '$email_secundario', '$celular', '$cep', '$logadouro', '$numero', '$complemento',
    '$bairro', '$cidade', '$estado', '$linkedin', '$github', '$instagram'
)";

if ($link->query($query) === TRUE) {
    $ultimo_id = $link->insert_id;
    header("Location: perfil.php?id=$ultimo_id");
    exit();
} else {
    echo "<script>alert('Erro ao gravar os dados: " . $link->error . "');</script>";
}

$link->close();
?>
