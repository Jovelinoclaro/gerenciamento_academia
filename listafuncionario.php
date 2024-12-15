<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="academia.css">
    <title></title>
</head>

<body>
    <img src="logo_academia.png" width="400" height="190">
    <ul>
        <li><a href="home.php">Home</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Cadastrar</a>
            <div class="dropdown-content">
                <a href="cadaluno.php">Aluno</a>
                <a href="cadavaliacaoFisica.php">Avaliação Física</a>
                <a href="cadfichaDeTreino.php">Ficha De Treino</a>
                <a href="cadfuncionario.php">Funcionario</a>
                <a href="cadmatricula.php">Matricula</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Listar</a>
            <div class="dropdown-content">
                <a href="listaaluno.php">Aluno</a>
                <a href="listaavaliacaoFisica.php">Avaliação Física</a>
                <a href="listafichaDeTreino.php">Ficha De Treino</a>
                <a href="listafuncionario.php">Funcionario</a>
                <a href="listamatricula.php">Matricula</a>
            </div>
        </li>
    </ul>
    <?php
    require_once './classes/Funcionario.php';
    $funcionario = new Funcionario();
    ?>
    <?php
    if (isset($_POST['atualizar'])):

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $funcao = $_POST['funcao'];
        $aluno_id = $_POST['aluno_id'];

        $funcionario->setId($id);
        $funcionario->setNome($nome);
        $funcionario->setEndereco($endereco);
        $funcionario->setTelefone($telefone);
        $funcionario->setEmail($email);
        $funcionario->setFuncao($funcao);
        $funcionario->setAluno_id($aluno_id);

        if ($funcionario->update($id))
        {
            echo "<h3>Atualizado com sucesso!</h3>";
        }
    endif;
    ?>

    <?php
    if (isset($_GET['acao']) && $_GET['acao'] == 'deletar'):

        $id = (int)$_GET['id'];
        if ($funcionario->delete($id))
        {
            echo "<h3>Deletado com sucesso!</h3>";
        }

    endif;
    ?>

    <?php
    if (isset($_GET['acao']) && $_GET['acao'] == 'editar')
    {

        $id = $_GET['id'];
        $resultado = $funcionario->find($id);
        ?>
        <center>
            <form method="POST">
                <table>
                    <tr>
                        <td>Código:</td>
                        <td><input type="text" name="id" value="<?php echo $resultado->id; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td><input type="text" name="nome" value="<?php echo $resultado->nome; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Endereço:</td>
                        <td><input type="text" name="endereco" value="<?php echo $resultado->endereco; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Telefone:</td>
                        <td><input type="text" name="telefone" value="<?php echo $resultado->telefone; ?>" /></td>
                    </tr>
                    <tr>
                        <td>E-mail:</td>
                        <td><input type="text" name="email" value="<?php echo $resultado->email; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Função:</td>
                        <td><input type="text" name="funcao" value="<?php echo $resultado->funcao; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Código do Aluno:</td>
                        <td><input type="text" name="aluno_id" value="<?php echo $resultado->aluno_id; ?>" /></td>
                    </tr>
                </table>
                <button type="submit" name="atualizar">Atualizar</button>
            <?php } ?>
        </form>

    </center>
    <h1>LISTA DE FUNCIONARIO</h1>
    <center>
        <table border="1">

            <tr>
                <td>Código:</td>
                <td>Nome:</td>
                <td>Endereço:</td>
                <td>Telefone:</td>
                <td>E-mail:</td>
                <td>Função:</td>
                <td>Código do Aluno:</td>
                <td>Ação:</td>
            </tr>


            <?php foreach ($funcionario->findAll() as $key => $value): ?>


                <tr>
                    <td><?php echo $value->id; ?></td>
                    <td><?php echo $value->nome; ?></td>
                    <td><?php echo $value->endereco; ?></td>
                    <td><?php echo $value->telefone; ?></td>
                    <td><?php echo $value->email; ?></td>
                    <td><?php echo $value->funcao; ?></td>
                    <td><?php echo $value->aluno_id; ?></td>
                    <td>
                        <?php echo "<a  href='listafuncionario.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?> ||
                        <?php echo "<a  href='listafuncionario.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
                    </td>
                </tr>

            <?php endforeach; ?>
        </table>
    </center>
    <!-- rodapé  -->
    <script src="load-footer.js"></script>

</body>

</html>