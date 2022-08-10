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
         $matricula = new Matricula();	
        ?>
             <?php
                if(isset($_POST['atualizar'])):

        $id = $_POST['id'];
        $aluno = $_POST['aluno'];
        $valor = $_POST['valor'];
        $situacao = $_POST['situacao'];
        $data_fim = $_POST['data_fim'];
        $aluno_id = $_POST['aluno_id'];
      
        $matricula->setId($id);
        $matricula->setAluno($aluno);
        $matricula->setValor($valor);
        $matricula->setSituacao($situacao);
        $matricula->setData_fim($data_fim);
        $matricula->setAluno_id($aluno_id);

			if($matricula->update($id)){
				echo "<h3>Atualizado com sucesso!</h3>";
			}
		endif;	
            ?>
            
            <?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):

			$id = (int)$_GET['id'];
			if($matricula->delete($id)){
				echo "<h3>Deletado com sucesso!</h3>";
			}

		endif;
		?>

		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){

			$id = $_GET['id'];
			$resultado = $matricula->find($id);
		?>
         <center>
        <form method="POST">
            <table>
                <tr>
                    <td>Código:</td><td><input type="text" name="id"  value="<?php echo $resultado->id; ?>"/></td>
                </tr>
                 <tr>
                    <td>Aluno:</td><td><input type="text" name="aluno"  value="<?php echo $resultado->aluno; ?>"/></td>
                </tr> 
                <tr>
                    <td>Valor:</td><td><input type="text" name="valor"  value="<?php echo $resultado->valor; ?>"/></td>
                </tr> 
                <tr>
                    <td>Situação:</td><td><input type="text" name="situacao"  value="<?php echo $resultado->situacao; ?>"/></td>
                </tr>  
                <tr>
                    <td>Data do Fim:</td><td><input type="text" name="data_fim"  value="<?php echo $resultado->data_fim; ?>"/></td>
                </tr> 
                <tr>
                    <td>Código do Aluno:</td><td><input type="text" name="aluno_id"  value="<?php echo $resultado->aluno_id; ?>"/></td>
                </tr> 
            </table>
         <button type="submit" name="atualizar">Atualizar</button>
                  <?php } ?>
        </form>
        
        </center>
              <h1>LISTA DE MATRICULA</h1>
              <center>
            <table border="1">
              
                <tr>
                     <td>Código:</td>
                     <td>Aluno:</td>
                     <td>Valor:</td>
                     <td>Situação:</td>
                     <td>Data do Fim:</td>
                     <td>Código do Aluno:</td>
                     <td>Ação:</td>
                 </tr>
              
              
              <?php foreach($matricula->findAll() as $key => $value): ?>
              
              
                <tr>
                  <td><?php echo $value->id; ?></td>
                  <td><?php echo $value->aluno; ?></td>
                  <td><?php echo $value->valor; ?></td>
                  <td><?php echo $value->situacao; ?></td>
                  <td><?php echo $value->data_fim; ?></td>
                  <td><?php echo $value->aluno_id; ?></td>  
                  <td>
                        <?php echo "<a  href='listamatricula.php?acao=editar&id=" .$value->id . "'>Editar</a>"; ?> ||
			<?php echo "<a  href='listamatricula.php?acao=deletar&id=" .$value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
                   </td>
                </tr>
              
              <?php endforeach; ?>
            </table>
              </center>
              <div class="rodape">
            <h3>Desenvolvedores: Wanderson Duarte & Adílio Lemos.</h3>
        </div>
    </body>
</html>
