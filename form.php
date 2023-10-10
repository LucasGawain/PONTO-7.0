<!DOCTYPE html>
<html>
<head>
    <title>Gerenciamento de Funcionários</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1, h2 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Gerenciamento de Funcionários</h1>

    <h2>Adicionar Novo Funcionário</h2>
    <form method="POST" action="addfunc.php">
        <label for="func_id">ID do Funcionário:</label>
        <input type="number" name="func_id" required><br><br>

        <label for="func_nome">Nome do Funcionário:</label>
        <input type="text" name="func_nome" required><br><br>

        <label for="func_cargo">Cargo do Funcionário:</label>
        <input type="text" name="func_cargo"><br><br>

        <input type="submit" value="Adicionar">
    </form>

    <h2>Consultar Funcionário</h2>
    <form method="GET" action="queryfunc.php">
        <label for="consulta">Consultar por Nome:</label>
        <input type="text" name="consulta" required><br><br>
        <input type="submit" value="Consultar">
    </form>

    <h2>Atualizar Funcionário</h2>
    <form method="POST" action="editfunc.php">
        <label for="func_id">ID do Funcionário:</label>
        <input type="number" name="func_id" required><br><br>

        <label for="func_nome">Novo Nome:</label>
        <input type="text" name="func_nome" required><br><br>

        <label for="func_cargo">Novo Cargo:</label>
        <input type="text" name="func_cargo"><br><br>

        <input type="submit" value="Atualizar">
    </form>

    <h2>Excluir Funcionário</h2>
    <form method="POST" action="exclfunc.php">
        <label for="func_id">ID do Funcionário a ser Excluído:</label>
        <input type="number" name="func_id" required><br><br>
        <input type="submit" value="Excluir">
    </form>
</body>
</html>