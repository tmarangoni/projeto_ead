<?php
require_once 'DB.php';

class Medico {
	
	protected $table = 'Medico';
    private $id_medico;
	private $nome;
	private $email;
    private $senha;
    private $crm;
    private $categoria;
    private $id;
    public $telefone;
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


    public function getNome(){
        return $this->nome;
    }

    public function setIdMedico($id_medico){
        $this->id_medico = $id_medico;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

	public function setEmail($email){
		$this->email = $email;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function setCrm($crm){
        $this->crm = $crm;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function setCategoria($categoria){
        $this->categoria = $categoria;
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
    {   $this->complemento = $complemento;
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

		$sql  = "INSERT INTO $this->table (nome_medico, email, senha, crm, categoria ) VALUES (:nome, :email, :senha, :crm, :categoria);
                 INSERT INTO dados_usuarios (id) VALUES ((select LAST_INSERT_ID()))";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':crm', $this->crm);
        $stmt->bindParam(':categoria', $this->categoria);

        return $stmt->execute();
	}

	public function update($id){

        $sql  = "UPDATE dados_usuarios SET img = :imgprof,nomec = :nome, nascimento = :nascimento, rg = :rg, cpf = :cpf, crm = :crm, 
                logradouro = :logradouro, numerocasa = :numero, complemento = :complemento, bairro = :bairro, estado = :estado, cidade = :cidade, cep = :cep, email = :email, telefone = :telefone WHERE id = :id";

        $stmt = DB::prepare($sql);
        $stmt->bindParam(':imgprof', $this->imgprof);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':nascimento', $this->nascimento);
        $stmt->bindParam(':rg', $this->rg);
        $stmt->bindParam(':crm', $this->crm);
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

    public function updUser($id){
        $sql=" UPDATE medico as m INNER JOIN dados_usuarios as d ON m.id_medico = d.id 
         SET m.nome_medico = d.nomec, m.email = d.email, m.crm = d.crm, m.categoria = :categoria WHERE m.id_medico = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':categoria', $this->categoria);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function findInfo(){
        $sql  = "SELECT * FROM medico as m JOIN dados_usuarios as d on m.id_medico = d.id AND d.id = :medico";

        $stmt = DB::prepare($sql);
        $stmt->bindParam(':medico', $this->id_medico);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function find($id){
        $sql  = "SELECT * FROM $this->table WHERE crm = :crm";
        $stmt = DB::prepare($sql);

        $stmt->bindParam(':crm', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();

    }

    public function findMedicos($id){
        $sql  = "SELECT * FROM $this->table WHERE categoria = :categoria";
        $stmt = DB::prepare($sql);

        $stmt->bindParam(':categoria', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public function findCrm($id){
        $sql  = "SELECT * FROM $this->table WHERE crm = :crm";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':crm', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();

    }


    public function findAll(){
        $sql  = "SELECT * FROM $this->table";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function delete($id){
        $sql  = "DELETE FROM $this->table WHERE id_medico = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id,PDO::PARAM_INT);
        return $stmt->execute();
    }

}