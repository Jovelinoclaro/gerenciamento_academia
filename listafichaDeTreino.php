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
         $fichaDeTreino = new FichaDeTreino();	
        ?>
             <?php
                if(isset($_POST['atualizar'])):

        $id = $_POST['id'];
        $nome_aluno = $_POST['nome_aluno'];
        $data = $_POST['data'];
        $professor = $_POST['professor'];
        $funcionario_id = $_POST['funcionario_id'];
        $aluno_id = $_POST['aluno_id'];
      
        $fichaDeTreino->setId($id);
        $fichaDeTreino->setNome_aluno($nome_aluno);
        $fichaDeTreino->setData($data);
        $fichaDeTreino->setProfessor($professor);
        $fichaDeTreino->setFuncionario_id($funcionario_id);
        $fichaDeTreino->setAluno_id($aluno_id);

			if($fichaDeTreino->update($id)){
				echo "<h3>Atualizado com sucesso!</h3>";
			}
		endif;	
            ?>
            
            <?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):

			$id = (int)$_GET['id'];
			if($fichaDeTreino->delete($id)){
				echo "<h3>Deletado com sucesso!</h3>";
			}

		endif;
		?>

		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){

			$id = $_GET['id'];
			$resultado = $fichaDeTreino->find($id);
		?>
         <center>
        <form method="POST">
            <table>
                <tr>
                    <td>Código:</td><td><input type="text" name="id"  value="<?php echo $resultado->id; ?>"/></td>
                </tr>
                 <tr>
                    <td>Nome do Aluno:</td><td><input type="text" name="nome_aluno"  value="<?php echo $resultado->nome_aluno; ?>"/></td>
                </tr>
                <tr>
                    <td>Data:</td><td><input type="date" name="data"  value="<?php echo $resultado->data; ?>"/></td>
                </tr>  
                <tr>
                    <td>Professor:</td><td><input type="text" name="professor"  value="<?php echo $resultado->professor; ?>"/></td>
                </tr> 
                <tr>
                    <td>Código do Funcionario:</td><td><input type="text" name="funcionario_id"  value="<?php echo $resultado->funcionario_id; ?>"/></td>
                </tr>  
                <tr>
                    <td>Código do Aluno:</td><td><input type="text" name="aluno_id"  value="<?php echo $resultado->aluno_id; ?>"/></td>
                </tr> 
            </table>
         <button type="submit" name="atualizar">Atualizar</button>
                  <?php } ?>
        </form>
        
        </center>
              <h1>LISTA DE FICHA DE TREINO</h1>
              <center>
            <table border="1">
              
                <tr>
                     <td>Código:</td>
                     <td>Nome do Aluno:</td>
                     <td>Data:</td>
                     <td>Professor:</td>
                     <td>Código do Funcionario:</td>
                     <td>Código do Aluno:</td>
                     <td>Ação:</td>
                 </tr>
              
              
              <?php foreach($fichaDeTreino->findAll() as $key => $value): ?>
              
              
                <tr>
                  <td><?php echo $value->id; ?></td>
                  <td><?php echo $value->nome_aluno; ?></td>
                  <td><?php echo $value->data; ?></td>
                  <td><?php echo $value->professor; ?></td>
                  <td><?php echo $value->funcionario_id; ?></td>
                  <td><?php echo $value->aluno_id; ?></td>  
                  <td>
                        <?php echo "<a  href='listafichaDeTreino.php?acao=editar&id=" .$value->id . "'>Editar</a>"; ?> ||
			<?php echo "<a  href='listafichaDeTreino.php?acao=deletar&id=" .$value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
                   </td>
                </tr>
              
              <?php endforeach; ?>
              
            </table>
              </center> 
             <!-- rodapé  -->
    <script src="load-footer.js"></script>
    </body>
</html>
