<!DOCTYPE html>
<?php session_start(); ?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de tarefas </title>
</head>
<body>
    <h1>Gerenciador de Contatos</h1>
    <form method="GET">
        <fieldset>
            <legend>Dados Cadastrais </legend>
            <label >
                Nome Completo:
                <input type="text" name= "nome">
            </label>
            <br><label >
                Telefone de Contato:
                <input type="text" name= "telefone">
            </label>
            <br><label >
                E-mail:
                <input type="text" name= "email">
            </label>
            <br><input type="submit" value= "Cadastrar">
        </fieldset>
    </form>
    <?php 
        if (isset($_GET['nome']) && isset($_GET['telefone']) && isset($_GET['email'])){ 
            $contato = [
                'nome' => $_GET ['nome'],
                'telefone' => $_GET ['telefone'],
                'email' => $_GET ['email']
            ];
            if (!isset($_SESSION['lista'])){
                $_SESSION['lista'] = [];
            }
            $_SESSION['lista'][] = $contato;
        }
        $lista = [];
        if (isset($_SESSION['lista'])) {
            $lista = $_SESSION['lista'];
        }
    ?>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>E-mail</th>
        </tr>
        <?php if (!empty ($lista)) : ?>
            <?php foreach($lista as $contato) : ?>
                <tr>
                    <td><?php echo isset($contato['nome']) ? htmlspecialchars($contato['nome']) : '' ; ?></td>
                    <td><?php echo isset($contato['telefone']) ? htmlspecialchars($contato['telefone']) : '' ; ?></td>
                    <td><?php echo isset($contato['email']) ? htmlspecialchars($contato['email']) : '' ; ?></td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
    </table>
</body>
</html>