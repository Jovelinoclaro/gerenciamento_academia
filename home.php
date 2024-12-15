<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="academia.css">
    <title>Home</title>
</head>
<body>
    <header>
        <img src="logo_academia.png" alt="Logo Academia" width="400" height="190">
    </header>
    
    <nav>
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
    </nav>
    
    <section>
        <h1>Sport Mania</h1>
        <h2>Gerenciamento de Academia</h2>
        
        <div class="images">
            <img src="aca.png" alt="Imagem 1" width="200" height="200">
            <p>Persistência</p>
            <img src="demia.png" alt="Imagem 2" width="200" height="200">
            <p>Foco</p>
        </div>
    </section>

    <footer class="rodape">
        <h3>Desenvolvedores: Wanderson Duarte & Adílio Lemos.</h3>
    </footer>
</body>
</html>
