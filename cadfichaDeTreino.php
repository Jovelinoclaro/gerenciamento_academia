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
        require_once './classes/FichaDeTreino.php';
          
        if(isset($_POST['cadastrar'])):
        $fichaDeTreino = new FichaDeTreino();
        
        $nome_aluno = $_POST['nome_aluno'];
        $data = $_POST['data'];
        $professor = $_POST['professor'];
        $funcionario_id = $_POST['funcionario_id'];
        $aluno_id = $_POST['aluno_id'];
      
        $fichaDeTreino->setNome_aluno($nome_aluno);
        $fichaDeTreino->setData($data);
        $fichaDeTreino->setProfessor($professor);
        $fichaDeTreino->setFuncionario_id($funcionario_id);
        $fichaDeTreino->setAluno_id($aluno_id);
       
      if($fichaDeTreino->salvar()){
                echo "<h3>Salvo com sucesso!</h3>";
                }
                endif;
        ?>
        <h1>Cadastro de Ficha de Treino</h1>
         <form method="POST">
            <table>
                 <tr>
                     <td>Nome do Aluno:</td><td><input type="text" name="nome_aluno" placeholder="Digite o Nome Do Aluno..."/></td>
                </tr>
                <tr>
                    <td>Data:</td><td><input type="date" name="data"/></td>
                </tr>
                <tr>
                    <td>Professor:</td><td><input type="text" name="professor" placeholder="Digite o Nome Do Professor..."/></td>
                </tr>
                <tr>
                    <td>Código do Funcionario:</td><td><input type="text" name="funcionario_id" placeholder="Digite o Código do Funcionario..."/></td>
                </tr>
                <tr>
                    <td>Código do Aluno:</td><td><input type="text" name="aluno_id" placeholder="Digite o Código do Aluno..."/></td>
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
