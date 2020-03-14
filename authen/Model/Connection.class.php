<?php
class Connection {
  //var connect dbb
	private $host;
	private $dbname;
	private $username;
	private $password;
	private $db;

	public $reqGood = "Connexion de base de données réussi";

	// constructeur db conn
  public function __construct() {
        //recup var bdd/ob
        $this->host = 'localhost';
        $this->dbname = 'authen_tp';
        $this->username = 'root';
        $this->password = 'mysql';
		try{
        	$this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8', $this->username, $this->password);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function getConnection() {
		return $this->db;
	}
}

?>
