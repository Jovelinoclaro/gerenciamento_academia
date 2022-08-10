
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="academia.css">
    </head>
    <body bgcolor="lightgreen">
       <?php
        require_once './classes/Aluno.php';
        $aluno = new Aluno();
        ?>
        <?php
            if(isset($_POST['submeter'])):
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_MAGIC_QUOTES);
                $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_MAGIC_QUOTES);

                $aluno = new Aluno();
                $aluno->setEmail($email);
                $aluno->setSenha($senha);

                if ($aluno->logar()):
                    header("Location: home.php");
                    else:
                    header("Location: index.php");    
                endif; 
                endif;
 ?>
        <form method="POST">
            <label>E-mail:</label>
                <center><input type="text" name="email" placeholder="Digite Seu E-mail..."/>
                <label>Senha:</label>
                <input type="password" name="senha" placeholder="Digite Sua Senha..."/></center>
                <button type="submit" name="submeter" >Logar</button>
            </form>
    </body>
</html>
