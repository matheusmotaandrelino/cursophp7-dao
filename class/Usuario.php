<?php

class Usuario{

	private $idusuario;
	private $deslogin;
	private $sessenha;
	private $dtcadastro;

	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($value){
		$this->idusuario = $value;
	}

	public function getDeslogin(){
		return $this->deslogin;
	}

	public function setDeslogin($value){
		$this->deslogin = $value;
	}

	public function getSessenha(){
		return $this->sessenha;
	}

	public function setSessenha($value){
		$this->sessenha = $value;
	}

	public function getDtcadastro(){
		return $this->dtcadastro;
	}

	public function setDtcadastro($value){
		$this->dtcadastro = $value;
	}

	public function loadById($id){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(

			":ID"=>$id
		));

		if (count($results) > 0){

			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setSessenha($row['sessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		}
	}

	public static function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin; ");

	}

	public static function search($login){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
			
			':SEARCH'=>"%".$login."%"
		));

	}

	public function login($login, $password){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE  deslogin = :LOGIN AND sessenha = :PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password
		));

		if (count($results) > 0) {

			$row = $results [0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setSessenha($row['sessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro'])); 

		}else{

			throw new Exception("Login e/ou senha inválidos. ");

		}
	}

	public function __toString(){

		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"sessenha"=>$this->getSessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}
}

?>