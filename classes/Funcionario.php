<?php

include_once 'Crud.php';

class Funcionario extends Crud{
    protected $table = 'funcionario';
    private $id;
    private $nome;
    private $endereco;
    private $telefone;
    private $email;
    private $funcao;
    private $aluno_id;
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEmail() {
        return $this->email;
    }

    function getFuncao() {
        return $this->funcao;
    }

    function getAluno_id() {
        return $this->aluno_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setFuncao($funcao) {
        $this->funcao = $funcao;
    }

    function setAluno_id($aluno_id) {
        $this->aluno_id = $aluno_id;
    }



//Métodos
   public function salvar() {
       
    $sql  = "INSERT INTO $this->table (nome,endereco,telefone,email,funcao,aluno_id) VALUES (:nome,:endereco,:telefone,:email,:funcao,:aluno_id)";
    $stmt = DB::prepare($sql);
    $stmt->bindParam(':nome', $this->nome);
    $stmt->bindParam(':endereco', $this->endereco);
    $stmt->bindParam(':telefone', $this->telefone);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':funcao', $this->funcao);
    $stmt->bindParam(':aluno_id', $this->aluno_id);
    return $stmt->execute();   
    }  
    
    public function update($id) {
        
    $sql  = "UPDATE $this->table SET id = :id, nome = :nome,endereco = :endereco,telefone = :telefone,email = :email,funcao = :funcao,aluno_id = :aluno_id WHERE id = :id";
    $stmt = DB::prepare($sql);
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':nome', $this->nome);
    $stmt->bindParam(':endereco', $this->endereco);
    $stmt->bindParam(':telefone', $this->telefone);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':funcao', $this->funcao);
    $stmt->bindParam(':aluno_id', $this->aluno_id);
    return $stmt->execute();
    }
    public function find($id){
    $sql  = "SELECT * FROM $this->table WHERE id = :id";
    $stmt = DB::prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
	}
    public function listar(){
    $sql = "SELECT * FROM $this->table";
    $stmt = DB::prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

}

