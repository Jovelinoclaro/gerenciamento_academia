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
        require_once './classes/Aluno.php';
         $aluno = new Aluno();	
        ?>
             <?php
                if(isset($_POST['atualizar'])):

			$id = $_POST['id'];
			$nome = $_POST['nome'];
                        $endereco = $_POST['endereco'];
                        $telefone = $_POST['telefone'];
                        $cpf = $_POST['cpf'];
                        $rg = $_POST['rg'];
                        $sexo = $_POST['sexo'];
                        $data_nascimento = $_POST['data_nascimento'];
                        $email = $_POST['email'];
                        $senha = $_POST['senha'];
                   
			$aluno->setId($id);
			$aluno->setNome($nome);
                        $aluno->setEndereco($endereco);
                        $aluno->setTelefone($telefone);
                        $aluno->setCpf($cpf);
                        $aluno->setRg($rg);
                        $aluno->setSexo($sexo);
                        $aluno->setData_nascimento($data_nascimento);
                        $aluno->setEmail($email);
                        $aluno->setSenha($senha);

			if($aluno->update($id)){
				echo "<h3>Atualizado com sucesso!</h3>";
			}
		endif;	
            ?>
            
            <?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):

			$id = (int)$_GET['id'];
			if($aluno->delete($id)){
				echo "<h3>Deletado com sucesso!</h3>";
			}

		endif;
		?>

		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){

			$id = $_GET['id'];
			$resultado = $aluno->find($id);
		?>
        <center>
        <form method="POST">
            <table>
                <tr>
                    <td>Código:</td><td><input type="text" name="id" value="<?php echo $resultado->id; ?>"/></td>
                </tr>
                 <tr>
                    <td>Nome:</td><td><input type="text" name="nome" value="<?php echo $resultado->nome; ?>"/></td>
                </tr>
                <tr>
                    <td>Endereço:</td><td><input type="text" name="endereco"  value="<?php echo $resultado->endereco; ?>"/></td>
                </tr>  
                <tr>
                    <td>Telefone:</td><td><input type="text" name="telefone"  value="<?php echo $resultado->telefone; ?>"/></td>
                </tr> 
                <tr>
                    <td>CPF:</td><td><input type="text" name="cpf"  value="<?php echo $resultado->cpf; ?>"/></td>
                </tr> 
                <tr>
                    <td>RG:</td><td><input type="text" name="rg"  value="<?php echo $resultado->rg; ?>"/></td>
                </tr> 
                <tr>
                    <td>Sexo:</td><td><input type="text" name="sexo"  value="<?php echo $resultado->sexo; ?>"/></td>
                </tr> 
                <tr>
                    <td>Data_nascimento:</td><td><input type="date" name="data_nascimento"  value="<?php echo $resultado->data_nascimento; ?>"/></td>
                </tr>
                <tr>
                    <td>E-mail:</td><td><input type="text" name="email"  value="<?php echo $resultado->email; ?>"/></td>
                </tr> 
                <tr>
                    <td>Senha:</td><td><input type="password" name="senha"  value="<?php echo $resultado->senha; ?>"/></td>
                </tr> 
            </table>
         <button type="submit" name="atualizar">Atualizar</button>
                  <?php } ?>
        </form>
        
        </center>
              <h1>LISTA DE ALUNOS</h1>
              <center>
            <table border="1">
              
                <tr>
                     <td>Código:</td>
                     <td>Nome:</td>
                     <td>Endereço:</td>
                     <td>Telefone:</td>
                     <td>CPF:</td>
                     <td>RG:</td>
                     <td>Sexo:</td>
                     <td>Data_nascimento:</td>
                     <td>E-mail:</td>
                     <td>Senha:</td>
                     <td>Ação:</td>
                 </tr>
              
              
              <?php foreach($aluno->findAll() as $key => $value): ?>
              
              
                <tr>
                  <td><?php echo $value->id; ?></td>
                  <td><?php echo $value->nome; ?></td>
                  <td><?php echo $value->endereco; ?></td>
                  <td><?php echo $value->telefone; ?></td>
                  <td><?php echo $value->cpf; ?></td>
                  <td><?php echo $value->rg; ?></td>
                  <td><?php echo $value->sexo; ?></td>
                  <td><?php echo $value->data_nascimento; ?></td>
                  <td><?php echo $value->email; ?></td>
                  <td><?php echo $value->senha; ?></td>
                
                  <td>
                        <?php echo "<a  href='listaaluno.php?acao=editar&id=" .$value->id . "'>Editar</a>"; ?> ||
			<?php echo "<a  href='listaaluno.php?acao=deletar&id=" .$value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
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
