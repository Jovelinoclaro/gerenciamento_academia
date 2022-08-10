<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once '../classes/Aluno.php';
          
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
      
        $aluno->setNome($nome);
        $aluno->setEndereco($endereco);
        $aluno->setTelefone($telefone);
        $aluno->setCpf($cpf);
        $aluno->setRg($rg);
        $aluno->setSexo($sexo);
        $aluno->setData_nascimento($data_nascimento);
        $aluno->setEmail($email);
        
       
      if($aluno->salvar()){
                echo "<h3>Salvo com sucesso!</h3>";
                }
                endif;
        ?>
         <form method="POST">
            <table>
                 <tr>
                    <td>Nome:</td><td><input type="text" name="nome"/></td>
                </tr>
                <tr>
                    <td>Endereço:</td><td><input type="text" name="endereco"/></td>
                </tr>
                <tr>
                    <td>Telefone:</td><td><input type="text" name="telefone"/></td>
                </tr>
                <tr>
                    <td>CPF:</td><td><input type="text" name="cpf"/></td>
                </tr>
                <tr>
                    <td>RG:</td><td><input type="text" name="rg"/></td>
                </tr>
                <tr>
                    <td>Sexo:</td><td><input type="text" name="sexo"/></td>
                </tr>
                <tr>
                    <td>Data de Nascimento:</td><td><input type="date" name="data_nascimento"/></td>
                </tr>
                <tr>
                    <td>E-mail:</td><td><input type="text" name="email"/></td>
                </tr>
                <tr>
                    <td><button type="submit" name="cadastrar" >Salvar</button></td>
            </tr>
            </table>   
        </form>
    </body>
</html>
