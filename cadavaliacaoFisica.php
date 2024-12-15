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
        require_once './classes/AvaliacaoFisica.php';
          
        if(isset($_POST['cadastrar'])):
        $avaliacaoFisica = new AvaliacaoFisica();
        
        $aluno = $_POST['aluno'];
        $avaliador = $_POST['avaliador'];
        $data = $_POST['data'];
        $peso_aluno = $_POST['peso_aluno'];
        $altura_aluno = $_POST['altura_aluno'];
        $aluno_id = $_POST['aluno_id'];
      
        $avaliacaoFisica->setAluno($aluno);
        $avaliacaoFisica->setAvaliador($avaliador);
        $avaliacaoFisica->setData($data);
        $avaliacaoFisica->setPeso_aluno($peso_aluno);
        $avaliacaoFisica->setAltura_aluno($altura_aluno);
        $avaliacaoFisica->setAluno_id($aluno_id);
       
        
        
       
      if($avaliacaoFisica->salvar()){
                echo "<h3>Salvo com sucesso!</h3>";
                }
                endif;
        ?>
        <h1>Cadastro de Avaliação Física</h1>
         <form method="POST">
            <table>
                 <tr>
                     <td>Aluno:</td><td><input type="text" name="aluno" placeholder="Digite o Nome Do Aluno..."/></td>
                </tr>
                <tr>
                    <td>Avaliador:</td><td><input type="text" name="avaliador" placeholder="Digite o Nome Do Avaliador..."/></td>
                </tr>
                <tr>
                    <td>Data:</td><td><input type="date" name="data" placeholder="Digite a Data..."/></td>
                </tr>
                <tr>
                    <td>Peso do Aluno:</td><td><input type="text" name="peso_aluno" placeholder="Digite o Peso Do Aluno..."/></td>
                </tr>
                <tr>
                    <td>Altura do Aluno:</td><td><input type="text" name="altura_aluno" placeholder="Digite a Altura Do Aluno..."/></td>
                </tr>
                <tr>
                    <td>Código do Aluno:</td><td><input type="text" name="aluno_id" placeholder="Digite o Código do Aluno..."/></td>
                </tr>             
                <tr>
                    <td><button type="submit" name="cadastrar" >Salvar</button></td>
            </tr>
            </table>   
        </form>
        <!-- rodapé  -->
    <script src="load-footer.js"></script>
    </body>
</html>
