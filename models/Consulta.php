<?php
require_once 'DB.php';

class Consulta {
	
	protected $table = 'Consulta';
	private $id_medico;
	private $id_paciente;
    private $data_consulta;
    private $horario_consulta;
    private $observacao;
    private $id_consulta;


    public function setData($data_consulta){
        $this->data_consulta = $data_consulta;
    }
    public function setHorario($horario_consulta){
        $this->horario_consulta = $horario_consulta;
    }
    public function setId($id_consulta){
        $this->id_consulta = $id_consulta;
    }
    public function setIdMedico($id_medico){
		$this->id_medico = $id_medico;
    }
    public function setIdPaciente($id_paciente){
        $this->id_paciente = $id_paciente;
    }

    public function setObservacao($observacao){
        $this->observacao = $observacao;
    }
//inserção da consulta no banco de dados
	public function insert(){

		$sql  = "INSERT INTO $this->table (id_medico, id_paciente, data_consulta,horario_consulta, observacoes) VALUES (:medico, :paciente,:data,:horario, :observacao)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':medico', $this->id_medico);
        $stmt->bindParam(':paciente', $this->id_paciente);
        $stmt->bindParam(':data', $this->data_consulta);
        $stmt->bindParam(':horario', $this->horario_consulta);
        $stmt->bindParam(':observacao', $this->observacao);

        return $stmt->execute();
	}

	// realiza a busca dos horários disponíveis para agendamento
    public function findData($id){
        $sql  = "SELECT p.* FROM (SELECT :data data, horario FROM horarios_possiveis) p 
        LEFT JOIN consulta c ON p.horario=c.horario_consulta AND p.data=c.data_consulta WHERE c.data_consulta IS NULL";
        $stmt = DB::prepare($sql);

        $stmt->bindParam(':data', $id);
        $stmt->execute();
        return $stmt->fetchAll();

    }


// realiza a busca da consulta que tenha o paciente X e data da consulta Y
    public function find(){
        $sql  = "SELECT * FROM consulta AS C JOIN medico AS M ON C.id_medico = M.id_medico AND C.id_paciente= :paciente AND C.data_consulta= :data ORDER BY C.data_consulta";
        $stmt = DB::prepare($sql);

        $stmt->bindParam(':data', $this->data_consulta);
        $stmt->bindParam(':paciente', $this->id_paciente);

        $stmt->execute();
        return $stmt->fetchAll();

    }

// realiza a busca da consulta que tenha o paciente X
    public function findAll(){
        $sql  = "SELECT * FROM consulta AS C JOIN medico AS M ON C.id_medico = M.id_medico AND C.id_paciente= :paciente AND data_consulta > CURRENT_DATE ORDER BY C.data_consulta
";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':paciente', $this->id_paciente);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    // busca por data por médico
    public function findConsulta(){
        $sql  = "SELECT * FROM consulta AS C JOIN paciente AS P ON C.id_medico = :medico AND C.id_paciente= P.id_paciente AND C.data_consulta= :data ORDER BY C.data_consulta";
        $stmt = DB::prepare($sql);

        $stmt->bindParam(':data', $this->data_consulta);
        $stmt->bindParam(':medico', $this->id_medico);

        $stmt->execute();
        return $stmt->fetchAll();

    }



    //realiza a busca da consulta que tenha o medico X e data da consulta Y
    public function findConsultaMedico(){
        $sql  = "SELECT * FROM consulta AS C JOIN paciente AS M ON C.id_medico = :medico AND C.id_paciente= m.id_paciente AND data_consulta > CURRENT_DATE ORDER BY C.data_consulta
";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':medico', $this->id_medico);
        $stmt->execute();
        return $stmt->fetchAll();

    }


}