<!DOCTYPE html>
<html>
<head>
    <title>Gerenciamento de Funcionários</title>
</head>
<body>
    <h1>Gerenciamento de Funcionários</h1>
    
    <?php
    // Inclua o arquivo de configuração do banco de dados
    require_once('form.php');

    // Função para exibir todos os funcionários
    function listarFuncionarios($conn) {
        $sql = "SELECT * FROM pt_funcionarios";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Lista de Funcionários</h2>";
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Nome</th><th>Cargo</th><th>Ações</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['func_id'] . "</td>";
                echo "<td>" . $row['func_nome'] . "</td>";
                echo "<td>" . $row['func_cargo'] . "</td>";
                echo "<td><a href='editar.php?id=" . $row['func_id'] . "'>Editar</a> | <a href='excluir.php?id=" . $row['func_id'] . "'>Excluir</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum funcionário encontrado.";
        }
    }

    // Verifique se o formulário foi enviado para inserção
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

    // Exibir a lista de funcionários
    listarFuncionarios($conn);
    ?>

    <h2>Adicionar Novo Funcionário</h2>
    <form method="POST" action="">
        <label for="func_id">ID do Funcionário:</label>
        <input type="number" name="func_id" required><br><br>

        <label for="func_nome">Nome do Funcionário:</label>
        <input type="text" name="func_nome" required><br><br>

        <label for="func_cargo">Cargo do Funcionário:</label>
        <input type="text" name="func_cargo"><br><br>

        <input type="submit" value="Adicionar">
    </form>
</body>
</html>