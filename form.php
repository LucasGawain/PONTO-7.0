<!DOCTYPE html>
<html>
<head>
    <title>Gerenciamento de Funcionários</title>
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
