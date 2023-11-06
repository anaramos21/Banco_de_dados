<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Conectar ao banco de dados
    $con = mysqli_connect("localhost", "root", "", "cad_usuario");

    // Consultar o banco de dados para verificar as credenciais
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($con, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($senha, $row['senha'])) {
            echo "Login bem-sucedido!";
            // Você pode redirecionar o usuário para uma página interna aqui
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "E-mail não encontrado!";
    }

    mysqli_close($con);
}
?>

