<?php 

class Usuario{

	private $idusuario;
	private $deslogin;
	private $dessenha;
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

	public function getDessenha(){
		return $this->dessenha;
	}

	public function setDessenha($value){
		$this->dessenha = $value;
	}

	public function getDtcadastro(){
		return $this->dtcadastro;
	}

	public function setDtcadastro($value){
		$this->dtcadastro = $value;
	}

	public function loadById($id){

		$sql = new Sql();

		$results = $sql -> select("select *from tb_usuarios where idusuario = :ID", array(
			":ID"=>$id
		));

		if (count($results)>0){

			$this->setData($results[0]);

		}
	}

	public function __toString(){

		return json_encode(array(

			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")

		));
	}

	public static function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM TB_USUARIOS ORDER BY DESLOGIN;");

	}

	public static function search($Login){

		$sql = new Sql();

		return $sql->select("SELECT * FROM TB_USUARIOS WHERE DESLOGIN LIKE :SEARCH ORDER BY DESLOGIN;", array(
			':SEARCH'=>"%".$Login."%"
		));

	}

	public function login($login, $password){
		$sql = new Sql();

		$results = $sql -> select("select *from tb_usuarios where deslogin = :LOGIN AND dessenha = :PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password
			));

		if (count($results)>0){

			$this->setData($results[0]);
		}
		else{

			throw new Exception("Login e/ou senha invalidos!");
			
		}

	}

	public function setData($data){
		
		$this->setIdusuario($data['idusuario']);
		$this->setDeslogin($data['deslogin']);
		$this->setDessenha($data['dessenha']);
		$this->setDtcadastro(new DateTime($data['dtcadastro']));


	}

	public function insert(){

		$sql = new Sql();

		$results = $sql ->select("CALL sp_usuarios_insert(:LOGIN, :SENHA)", array(
			':LOGIN'=>$this->getDeslogin(),
			':SENHA'=>$this->getDessenha()
		));

		if (count($results)>0){

			$this->setData($results[0]);

		}

	}

	public function __construct($login = "", $senha = ""){

		$this->setDeslogin($login);
		$this->setDessenha($senha);

	}

	public function update($login, $senha){

		$this->setDeslogin($login);
		$this->setDessenha($senha);
		

		$sql = new Sql();

		$sql->query("UPDATE TB_USUARIOS SET DESLOGIN = :LOGIN, DESSENHA = :SENHA WHERE IDUSUARIO = :ID", array(
			':LOGIN'=>$this->getDeslogin(),
			':SENHA'=>$this->getDessenha(),
			':ID'=>$this->getIdusuario()
		));
	}

}

 ?>