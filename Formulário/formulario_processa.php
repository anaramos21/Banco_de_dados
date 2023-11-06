<?php
// Conectar ao banco de dados (substitua com suas credenciais)
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "cadastro";

$mysqli = new mysqli($host, $usuario, $senha, $banco);

// Verificar a conexão
if ($mysqli->connect_error) {
    die("Erro na conexão: " . $mysqli->connect_error);
}

// Capturar os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

// Inserir os dados no banco de dados
$sql = "INSERT INTO cad_clientes (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";

if ($mysqli->query($sql) === TRUE) {
    echo "Dados inseridos com sucesso!";
} else {
    echo "Erro ao inserir os dados: " . $mysqli->error;
}
// Fechar conexão com o banco de dados
$mysqli->close();
?>