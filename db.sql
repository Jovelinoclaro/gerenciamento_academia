
Add os dados que do db para quem gosta de atualizar alguns tipos de Sistemas.
15-12-2024

Jovelino Claro


Tabelas do Sistema de Academia: gerenciamento_academia

Tabela aluno: Armazena os dados dos alunos, como nome, data de nascimento, endereço, telefone e e-mail.

Tabela funcionario: Contém informações sobre os funcionários da academia, como nome, endereço, telefone, e-mail, função e o código do aluno associado a cada funcionário.

Tabela avaliacao_fisica: Guarda as avaliações físicas dos alunos, incluindo dados como o nome do aluno, avaliador, data, peso, altura e o código do aluno.

Tabela ficha_treino: Armazena as fichas de treino, que associam alunos a professores, com dados como nome do aluno, data da ficha de treino, o professor responsável, e o código de funcionário e aluno.

Tabela matricula: Contém as informações de matrícula dos alunos, incluindo o nome do aluno, valor da matrícula, situação da matrícula (ex.: ativo, inativo), data de término e o código do aluno.



CREATE TABLE aluno (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    endereco VARCHAR(255),
    telefone VARCHAR(20),
    cpf VARCHAR(14) UNIQUE NOT NULL,
    rg VARCHAR(20),
    sexo ENUM('M', 'F', 'Outro'),
    data_nascimento DATE,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);


CREATE TABLE avaliacao_fisica (
    id INT AUTO_INCREMENT PRIMARY KEY,
    aluno VARCHAR(100) NOT NULL,
    avaliador VARCHAR(100) NOT NULL,
    data DATE NOT NULL,
    peso_aluno DECIMAL(5,2) NOT NULL,
    altura_aluno DECIMAL(4,2) NOT NULL,
    aluno_id INT NOT NULL,
    FOREIGN KEY (aluno_id) REFERENCES aluno(id) ON DELETE CASCADE ON UPDATE CASCADE
);



CREATE TABLE funcionario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    endereco VARCHAR(255),
    telefone VARCHAR(20),
    email VARCHAR(100) UNIQUE NOT NULL,
    funcao VARCHAR(50),
    aluno_id INT NOT NULL,
    FOREIGN KEY (aluno_id) REFERENCES aluno(id) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE ficha_treino (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_aluno VARCHAR(100) NOT NULL,
    data DATE NOT NULL,
    professor VARCHAR(100),
    funcionario_id INT NOT NULL,
    aluno_id INT NOT NULL,
    FOREIGN KEY (funcionario_id) REFERENCES funcionario(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (aluno_id) REFERENCES aluno(id) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE matricula (
    id INT AUTO_INCREMENT PRIMARY KEY,
    aluno VARCHAR(255) NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    situacao VARCHAR(50) NOT NULL,
    data_fim DATE NOT NULL,
    aluno_id INT NOT NULL,
    FOREIGN KEY (aluno_id) REFERENCES aluno(id)
);
