<?php

include_once 'Crud.php';
class AvaliacaoFisica extends Crud{
    protected $table = 'avaliacao_fisica';
    private $id;
    private $aluno;
    private $avaliador;
    private $data;
    private $peso_aluno;
    private $altura_aluno;
    //Chave Estrangeira
    private $aluno_id;
    
    function getId() {
        return $this->id;
    }
    function getAluno() {
        return $this->aluno;
    }

    function getAvaliador() {
        return $this->avaliador;
    }

    function getData() {
        return $this->data;
    }

    function getPeso_aluno() {
        return $this->peso_aluno;
    }

    function getAltura_aluno() {
        return $this->altura_aluno;
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

    function setAvaliador($avaliador) {
        $this->avaliador = $avaliador;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setPeso_aluno($peso_aluno) {
        $this->peso_aluno = $peso_aluno;
    }

    function setAltura_aluno($altura_aluno) {
        $this->altura_aluno = $altura_aluno;
    }

    function setAluno_id($aluno_id) {
        $this->aluno_id = $aluno_id;
    }

    
 //Métodos
   public function salvar() {
       
    $sql  = "INSERT INTO $this->table (aluno,avaliador,data,peso_aluno,altura_aluno,aluno_id) VALUES (:aluno,:avaliador,:data,:peso_aluno,:altura_aluno,:aluno_id)";
    $stmt = DB::prepare($sql);
    $stmt->bindParam(':aluno', $this->aluno);
    $stmt->bindParam(':avaliador', $this->avaliador);
    $stmt->bindParam(':data', $this->data);
    $stmt->bindParam(':peso_aluno', $this->peso_aluno);
    $stmt->bindParam(':altura_aluno', $this->altura_aluno);
    //Chave Estrangeira
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
        
    $sql  = "UPDATE $this->table SET id = :id, aluno = :aluno,avaliador = :avaliador,data = :data,peso_aluno = :peso_aluno,altura_aluno = :altura_aluno WHERE id = :id";
    $stmt = DB::prepare($sql);
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':aluno', $this->aluno);
    $stmt->bindParam(':avaliador', $this->avaliador);
    $stmt->bindParam(':data', $this->data);
    $stmt->bindParam(':peso_aluno', $this->peso_aluno);
    $stmt->bindParam(':altura_aluno', $this->altura_aluno);
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

