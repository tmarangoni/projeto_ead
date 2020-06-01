<?php
require_once 'DB.php';

class Paciente {
	
	protected $table = 'Paciente';
    private $id_paciente;
    private $id;
	private $nome;
	private $email;
    private $senha;
    private $telefone;
    private $nascimento;
    private $rg;
    private $cpf;
    private $logradouro;
    private $complemento;
    private $numero;
    private $bairro;
    private $estado;
    private $cidade;
    private $cep;
    private $imgprof;


    public function setIdPaciente($id_paciente){
        $this->id_paciente = $id_paciente;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
		$this->nome = $nome;
    }
    public function setId($id){
        $this->id = $id;
    }

	public function setEmail($email){
		$this->email = $email;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function setBairro($bairro)
    {   $this->bairro = $bairro;
    }

    public function setCpf($cpf)
    {   $this->cpf = $cpf;
    }

    public function setCep($cep)
    {   $this->cep = $cep;
    }

    public function setCidade($cidade)
    {   $this->cidade = $cidade;
    }

    public function setEstado($estado)
    {   $this->estado = $estado;
    }

    public function setLogradouro($logradouro)
    {   $this->logradouro = $logradouro;
    }

    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }

    public function setRg($rg)
    {   $this->rg = $rg;
    }

    public function setNascimento($nascimento)
    {   $this->nascimento = $nascimento;
    }

    public function setNumero($numero)
    {   $this->numero = $numero;
    }

    public function setImgprof($imgprof)
    {   $this->imgprof = $imgprof;
    }

	public function insert(){

		$sql  = "INSERT INTO $this->table (nome_paciente, email, senha,cpf, tipo_user)
                VALUES(:nome, :email, :senha, :cpf, '1');
                INSERT INTO dados_usuarios (id)
                values((select LAST_INSERT_ID()))";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':cpf', $this->cpf);
        return $stmt->execute();

	}

	public function updUser($id){
         $sql="UPDATE paciente as p INNER JOIN dados_usuarios as d ON p.id_paciente = d.id 
         SET p.nome_paciente = d.nomec, p.email = d.email, p.cpf = d.cpf WHERE p.id_paciente = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function insertDados(){

        $sql  = "INSERT INTO dados_usuarios (id, img, nomec, nascimento, rg, cpf, logradouro, numerocasa, complemento, bairro, estado, cidade, cep, email, telefone )
                VALUES (:id,:imgprof, :nome, :nascimento, :rg, :cpf, :logradouro, :numero, :complemento, :bairro, :estado, :cidade, :cep, :email, :telefone)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':imgprof', $this->imgprof);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':nascimento', $this->nascimento);
        $stmt->bindParam(':rg', $this->rg);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':logradouro', $this->logradouro);
        $stmt->bindParam(':numero', $this->numero);
        $stmt->bindParam(':complemento', $this->complemento);
        $stmt->bindParam(':bairro', $this->bairro);
        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':cidade', $this->cidade);
        $stmt->bindParam(':cep', $this->cep);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':telefone', $this->telefone);
        return $stmt->execute();

    }

	public function update($id){

		$sql  = "UPDATE dados_usuarios SET img = :imgprof,nomec = :nome, nascimento = :nascimento, rg = :rg, cpf = :cpf, 
                logradouro = :logradouro, numerocasa = :numero, complemento = :complemento, bairro = :bairro, estado = :estado, cidade = :cidade, cep = :cep, email = :email, telefone = :telefone WHERE id = :id";

		$stmt = DB::prepare($sql);
        $stmt->bindParam(':imgprof', $this->imgprof);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':nascimento', $this->nascimento);
        $stmt->bindParam(':rg', $this->rg);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':logradouro', $this->logradouro);
        $stmt->bindParam(':numero', $this->numero);
        $stmt->bindParam(':complemento', $this->complemento);
        $stmt->bindParam(':bairro', $this->bairro);
        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':cidade', $this->cidade);
        $stmt->bindParam(':cep', $this->cep);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();

	}

    public function find($id){
        $sql  = "SELECT * FROM $this->table as p JOIN dados_usuarios as d on p.cpf = :cpf";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':cpf', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();

    }

    public function findInfo(){
        $sql  = "SELECT * FROM paciente as p JOIN dados_usuarios as d on p.id_paciente = d.id AND d.id = :paciente";

        $stmt = DB::prepare($sql);
        $stmt->bindParam(':paciente', $this->id_paciente);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findAll(){
        $sql  = "SELECT * FROM $this->table";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function delete($id){
        $sql  = "DELETE FROM $this->table WHERE id_paciente = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

}