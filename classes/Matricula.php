<?php

include_once 'Crud.php';

class Matricula extends Crud{
    protected $table = 'matricula';
    private $id;
    private $aluno;
    private $valor;
    private $situacao;
    private $data_fim;
    //Chave Estrangeira
    private $aluno_id;
    
    function getId() {
        return $this->id;
    }

    function getAluno() {
        return $this->aluno;
    }

    function getValor() {
        return $this->valor;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function getData_fim() {
        return $this->data_fim;
    }

    function getAluno_id() {
        return $this->aluno_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setAluno($aluno) {
        $this->aluno = $aluno;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    function setData_fim($data_fim) {
        $this->data_fim = $data_fim;
    }

    function setAluno_id($aluno_id) {
        $this->aluno_id = $aluno_id;
    }


//Métodos
   public function salvar() {
       
    $sql  = "INSERT INTO $this->table (aluno,valor,situacao,data_fim,aluno_id) VALUES (:aluno,:valor,:situacao,:data_fim,:aluno_id)";
    $stmt = DB::prepare($sql);
    $stmt->bindParam(':aluno', $this->aluno);
    $stmt->bindParam(':valor', $this->valor);
    $stmt->bindParam(':situacao', $this->situacao);
    $stmt->bindParam(':data_fim', $this->data_fim);
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
        
    $sql  = "UPDATE $this->table SET id = :id, aluno = :aluno,valor = :valor,situacao = :situacao,data_fim = :data_fim,aluno_id = :aluno_id WHERE id = :id";
    $stmt = DB::prepare($sql);
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':aluno', $this->aluno);
    $stmt->bindParam(':valor', $this->valor);
    $stmt->bindParam(':situacao', $this->situacao);
    $stmt->bindParam(':data_fim', $this->data_fim);
    $stmt->bindParam(':aluno_id', $this->aluno_id);
    return $stmt->execute();
    }
    public function listar(){
    $sql = "SELECT * FROM $this->table";
    $stmt = DB::prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}
}

