<?php
    // Inclua o arquivo de configuração do banco de dados
    // require_once('form.php');
    $conn = mysqli_connect("localhost:3306","root","","ponto");

    // Função para listar todos os funcionários
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
                echo "<td><a href='editfunc.php'?id=" . $row['func_id'] . "'>Editar</a> | <a href='excluir.php?id=" . $row['func_id'] . "'>Excluir</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum funcionário encontrado.";
        }
    }

    // Exibir a lista de funcionários
    listarFuncionarios($conn);
    ?>