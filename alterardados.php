<?php
session_start();

include('conexao.php');

$cpf = $_SESSION['cpf'];
$select = "SELECT nome, cpf, telefone FROM usuario WHERE cpf = '$cpf'";
$query = mysqli_query($conexao, $select);
$dados = mysqli_fetch_row($query);

$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
if ($telefone <> null) {
    $uptade = "UPDATE usuario SET telefone = '$telefone' WHERE cpf = '$cpf'";
    $queryuptade = mysqli_query($conexao, $uptade);
    header('Location: alterardados.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <form id="form-altera" action="#" method="POST">
            <table border="1px">
                <tr>
                    <td>Nome</td>
                    <td>CPF</td>
                    <td>Telefone</td>
                    <td>Atualizar</td>
                </tr>
                <tr>
                    <td>
                        <?php echo $dados[0] ?>
                    </td>
                    <td>
                        <?php echo $dados[1] ?>
                    </td>
                    <td>
                        <input type="text" name="telefone" value="<?php echo $dados[2] ?> ">
                    </td>
                    <td>
                        <input type="submit" name="atualizar" value="Atualizar">
                    </td>

                </tr>
            </table>
        </form>
        <h3>Alterar Senha</h3>
        <form id="alterar-senha" action="alterarsenha.php" method="POST">
            Nova senha:<br>
            <input type="password" name="senha" required><br>
            Confirmar senha:<br>
            <input type="password" name="confirmarsenha" required><br>
            <input type="submit" name="alterar" value="Alterar Senha">
        </form>
        <a href="principal.php">Voltar</a>
    </center>
</body>

</html>