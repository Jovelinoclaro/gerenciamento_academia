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
          
        if(isset($_POST['cadastrar'])):
        $aluno = new Aluno();
        
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $sexo = $_POST['sexo'];
        $data_nascimento = $_POST['data_nascimento'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
      
        $aluno->setNome($nome);
        $aluno->setEndereco($endereco);
        $aluno->setTelefone($telefone);
        $aluno->setCpf($cpf);
        $aluno->setRg($rg);
        $aluno->setSexo($sexo);
        $aluno->setData_nascimento($data_nascimento);
        $aluno->setEmail($email);
        $aluno->setSenha($senha);
        
       
      if($aluno->salvar()){
                echo "<h3>Salvo com sucesso!</h3>";
                }
                endif;
        ?>
        <h1>Cadastro do Aluno</h1>
         <form method="POST">
            <table>
                 <tr>
                     <td>Nome:</td><td><input type="text" name="nome" placeholder="Digite Seu Nome..."/></td>
                </tr>
                <tr>
                    <td>Endereço:</td><td><input type="text" name="endereco" placeholder="Digite Seu Endereço..."/></td>
                </tr>
                <tr>
                    <td>Telefone:</td><td><input type="text" name="telefone" placeholder="Digite Seu Telefone..."/></td>
                </tr>
                <tr>
                    <td>CPF:</td><td><input type="text" name="cpf" placeholder="Digite Seu CPF..."/></td>
                </tr>
                <tr>
                    <td>RG:</td><td><input type="text" name="rg" placeholder="Digite Seu RG..."/></td>
                </tr>
                <tr>
                    <td>Sexo:</td><td><input type="text" name="sexo" placeholder="Digite Seu Sexo...s"/></td>
                </tr>
                <tr>
                    <td>Data de Nascimento:</td><td><input type="date" name="data_nascimento"/></td>
                </tr>
                <tr>
                    <td>E-mail:</td><td><input type="text" name="email" placeholder="Digite Seu E-mail..."/></td>
                </tr>
                <tr>
                    <td>Senha:</td><td><input type="password" name="senha" placeholder="Digite Sua Senha..."/></td>
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
