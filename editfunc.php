<?php
// Inclua o arquivo de configuração do banco de dados
require_once('form.php');
$conn = mysqli_connect("localhost:3306","root","","ponto");

// Verifique se o ID do funcionário a ser atualizado foi fornecido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['func_id']) && is_numeric($_POST['func_id'])) {
        $func_id = $_POST['func_id'];
        $func_nome = $_POST['func_nome'];
        $func_cargo = $_POST['func_cargo'];

        // Preparar e executar a consulta de atualização
        $sql = "UPDATE pt_funcionarios SET func_nome = ?, func_cargo = ? WHERE func_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $func_nome, $func_cargo, $func_id);

        if ($stmt->execute()) {
            echo "Dados do funcionário atualizados com sucesso!";
        } else {
            echo "Erro ao atualizar os dados do funcionário: " . $stmt->error;
        }

        // Fechar a conexão com o banco de dados
        $stmt->close();
    } else {
        echo "ID de funcionário inválido.";
    }
}

// Redirecionar de volta à página principal após a atualização
header("Location: form.php");
exit();
?>