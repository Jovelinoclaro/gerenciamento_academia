<?php

include_once 'Crud.php';
class FichaDeTreino extends Crud{
    protected $table = 'ficha_treino';
    private $id;
    private $nome_aluno;
    private $data;
    private $professor;
    //Chave Estrangeira
    private $funcionario_id;
    private $aluno_id;
    
    function getId() {
        return $this->id;
    }

    function getNome_aluno() {
        return $this->nome_aluno;
    }

    function getData() {
        return $this->data;
    }

    function getProfessor() {
        return $this->professor;
    }

    function getFuncionario_id() {
        return $this->funcionario_id;
    }

    function getAluno_id() {
        return $this->aluno_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome_aluno($nome_aluno) {
        $this->nome_aluno = $nome_aluno;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setProfessor($professor) {
        $this->professor = $professor;
    }

    function setFuncionario_id($funcionario_id) {
        $this->funcionario_id = $funcionario_id;
    }

    function setAluno_id($aluno_id) {
        $this->aluno_id = $aluno_id;
    }


//Métodos
   public function salvar() {
       
    $sql  = "INSERT INTO $this->table (nome_aluno,data,professor,funcionario_id,aluno_id) VALUES (:nome_aluno,:data,:professor,:funcionario_id,:aluno_id)";
    $stmt = DB::prepare($sql);
    $stmt->bindParam(':nome_aluno', $this->nome_aluno);
    $stmt->bindParam(':data', $this->data);
    $stmt->bindParam(':professor', $this->professor);
    $stmt->bindParam(':funcionario_id', $this->funcionario_id);
    $stmt->bindParam(':aluno_id', $this->aluno_id);
    return $stmt->execute();   
    }  
    public function delete($id){
    $sql  = "DELETE FROM $this->table WHERE id = :id";
    $stmt = DB::prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute(); 
    }
    public function update($id) {
        
    $sql  = "UPDATE $this->table SET id = :id, nome_aluno = :nome_aluno,data = :data, professor = :professor,funcionario_id = :funcionario_id,aluno_id = :aluno_id WHERE id = :id";
    $stmt = DB::prepare($sql);
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':nome_aluno', $this->nome_aluno);
    $stmt->bindParam(':data', $this->data);
    $stmt->bindParam(':professor', $this->professor);
    $stmt->bindParam(':funcionario_id', $this->funcionario_id);
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
