<?php
include_once 'Crud.php';

class Aluno extends Crud{
    protected $table = 'aluno';
    private $id;
    private $nome;
    private $endereco;
    private $telefone;
    private $cpf;
    private $rg;
    private $sexo;
    private $data_nascimento;
    private $email;
    private $senha;
    
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

    function getCpf() {
        return $this->cpf;
    }

    function getRg() {
        return $this->rg;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getData_nascimento() {
        return $this->data_nascimento;
    }

    function getEmail() {
        return $this->email;
    }
    function getSenha() {
        return $this->senha;
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

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setData_nascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    function setSenha($senha) {
        $this->senha = $senha;
    }

    //Métodos
   public function salvar() {
       
    $sql  = "INSERT INTO $this->table (nome,endereco,telefone,cpf,rg,sexo,data_nascimento,email,senha) VALUES (:nome,:endereco,:telefone,:cpf,:rg,:sexo,:data_nascimento,:email,:senha)";
    $stmt = DB::prepare($sql);
    $stmt->bindParam(':nome', $this->nome);
    $stmt->bindParam(':endereco', $this->endereco);
    $stmt->bindParam(':telefone', $this->telefone);
    $stmt->bindParam(':cpf', $this->cpf);
    $stmt->bindParam(':rg', $this->rg);
    $stmt->bindParam(':sexo', $this->sexo);
    $stmt->bindParam(':data_nascimento', $this->data_nascimento);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':senha', $this->senha);

    return $stmt->execute();   
    }  
   
    public function update($id) {
        
    $sql  = "UPDATE $this->table SET id = :id,nome = :nome,endereco = :endereco,telefone = :telefone,cpf = :cpf,rg = :rg,sexo = :sexo,data_nascimento = :data_nascimento,email = :email,senha = :senha WHERE id = :id";
    $stmt = DB::prepare($sql);
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':nome', $this->nome);
    $stmt->bindParam(':endereco', $this->endereco);
    $stmt->bindParam(':telefone', $this->telefone);
    $stmt->bindParam(':cpf', $this->cpf);
    $stmt->bindParam(':rg', $this->rg);
    $stmt->bindParam(':sexo', $this->sexo);
    $stmt->bindParam(':data_nascimento', $this->data_nascimento);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':senha', $this->senha);
    return $stmt->execute();
    }
    public function listar(){
    $sql = "SELECT * FROM $this->table";
    $stmt = DB::prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
	}
    public function logar(){
            $sql = "SELECT * FROM $this->table WHERE email = ? AND senha = ?";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(1, $this->getEmail());
            $stmt->bindParam(2, $this->getSenha());
            $stmt->execute();
            
            if($stmt->rowCount() == 1):
                return TRUE;
            else:
                return FALSE;
            endif;
            
        }
        
}


