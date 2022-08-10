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
        require_once './classes/Matricula.php';
          
        if(isset($_POST['cadastrar'])):
        $matricula = new Matricula();
        
        $aluno = $_POST['aluno'];
        $valor = $_POST['valor'];
        $situacao = $_POST['situacao'];
        $data_fim = $_POST['data_fim'];
        $aluno_id = $_POST['aluno_id'];
      
        $matricula->setAluno($aluno);
        $matricula->setValor($valor);
        $matricula->setSituacao($situacao);
        $matricula->setData_fim($data_fim);
        $matricula->setAluno_id($aluno_id);
        
        
       
      if($matricula->salvar()){
                echo "<h3>Salvo com sucesso!</h3>";
                }
                endif;
        ?>
        <h1>Cadastro de Matricula</h1>
         <form method="POST">
            <table>
                 <tr>
                     <td>Aluno:</td><td><input type="text" name="aluno" placeholder="Digite o Nome Do Aluno..."/></td>
                </tr>
                <tr>
                    <td>Valor:</td><td><input type="text" name="valor" placeholder="Digite o Valor..."/></td>
                </tr>
                <tr>
                    <td>Situação:</td><td><input type="text" name="situacao" placeholder="Digite a Situação Do Aluno..."/></td>
                </tr>
                <tr>
                    <td>Data do Fim:</td><td><input type="date" name="data_fim"/></td>
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


