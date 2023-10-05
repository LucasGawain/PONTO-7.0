<?php
// Inclua o arquivo de configuração do banco de dados
 require_once('form.php');
$conn = mysqli_connect("localhost:3306","root","","ponto");

// Verifique se o ID do funcionário a ser excluído foi fornecido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['func_id']) && is_numeric($_POST['func_id'])) {
        $func_id = $_POST['func_id'];

        // Preparar e executar a consulta de exclusão
        $sql = "DELETE FROM pt_funcionarios WHERE func_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $func_id);

        if ($stmt->execute()) {
            echo "Funcionário excluído com sucesso!";
        } else {
            echo "Erro ao excluir o funcionário: " . $stmt->error;
        }

        // Fechar a conexão com o banco de dados
        $stmt->close();
    } else {
        echo "ID de funcionário inválido.";
    }
}

// Redirecionar de volta à página principal após a exclusão
header("Location: form.php");
exit();
?>
