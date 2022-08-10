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
          
        if(isset($_POST['cadastrar'])):
        $funcionario = new Funcionario();
        
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $funcao = $_POST['funcao'];
        $aluno_id = $_POST['aluno_id'];
      
        $funcionario->setNome($nome);
        $funcionario->setEndereco($endereco);
        $funcionario->setTelefone($telefone);
        $funcionario->setEmail($email);
        $funcionario->setFuncao($nome);
        $funcionario->setAluno_id($aluno_id);
        
       
      if($funcionario->salvar()){
                echo "<h3>Salvo com sucesso!</h3>";
                }
                endif;
        ?>
        <h1>Cadastro de Funcionario</h1>
         <form method="POST">
            <table>
                 <tr>
                     <td>Nome:</td><td><input type="text" name="nome" placeholder="Digite o Nome Do Funcionario..."/></td>
                </tr>
                <tr>
                    <td>Endereço:</td><td><input type="text" name="endereco" placeholder="Digite o Endereço..."/></td>
                </tr>
                <tr>
                    <td>Telefone:</td><td><input type="text" name="telefone" placeholder="Digite o Telefone..."/></td>
                </tr>
                <tr>
                    <td>E-mail:</td><td><input type="text" name="email" placeholder="Digite o E-mail..."/></td>
                </tr>
                <tr>
                    <td>Função:</td><td><input type="text" name="funcao" placeholder="Digite a Função..."/></td>
                </tr>
                <tr>
                    <td>Código do Aluno:</td><td><input type="text" name="aluno_id" placeholder="Digite o Código Do Aluno..."/></td>
                </tr>             
                <tr>
                    <td><button type="submit" name="cadastrar" >Salvar</button></td>
            </tr>
            </table>   
        </form>
        <div class="rodape">
            <h3>Desenvolvedores: Wanderson Duarte & Adílio Lemos.</h3>
        </div>
    </body>
</html>
