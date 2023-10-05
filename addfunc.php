<?php
// Inclua o arquivo de configuração do banco de dados
require_once('form.php');
$conn = mysqli_connect("localhost:3306","root","","ponto");

// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar os dados do formulário
    $func_id = $_POST['func_id'];
    $func_nome = $_POST['func_nome'];
    $func_cargo = $_POST['func_cargo'];

    // Inserir os dados na tabela
    $sql = "INSERT INTO pt_funcionarios (func_id, func_nome, func_cargo) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $func_id, $func_nome, $func_cargo);

    if ($stmt->execute()) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir os dados: " . $stmt->error;
    }
    
    // Fechar a conexão com o banco de dados
    $stmt->close();
}

// Redirecionar de volta à página principal após a inserção
header("Location: form.php");
exit();
?>