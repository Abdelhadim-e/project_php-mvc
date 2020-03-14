<?php
class User {
  //var coodronées
	private  $id;
	private  $email;
	private  $password;
	private  $firstName;
	private  $lastName;
	private  $address;
	private  $school;
	private  $city;
	private  $admin;

	//Constructeur hydrate
	public function __construct(array $donnees = array()){
		$this->hydrate($donnees);
	}
	//set et get id
	public final function setId($id1) {
		$this->id=$id1;
	}

	public function getId(){
		return $this->id;
	}
	//set et get email
	public function setEmail($email1){
		$this->email = $email1;
	}

	public function getEmail(){
		return $this->email;
	}
	//set et get password
	public function setPassword($password1){
		$this->password = password_hash($password1,PASSWORD_DEFAULT);
	}

	public function getPassword(){
		return $this->password;
	}
	//set et get firstname
	public function setFirstName($firstName1){
		$this->firstName = $firstName1;
	}

	public function getFirstName(){
		return $this->firstName;
	}
	//set et get lastname
	public function setLastName($lastName1){
		$this->lastName = $lastName1;
	}

	public function getLastName(){
		return $this->lastName;
	}
	//set et get address
	public function setAddress($address1){
		$this->address = $address1;
	}

	public function getAddress(){
		return $this->address;
	}
	//set et get school
	public function setSchool($school){
		$this->school = $school;
	}

	public function getSchool(){
		return $this->school;
	}
	//set et get city
	public function setCity($city1){
		$this->city = $city1;
	}

	public function getCity(){
		return $this->city;
	}
	// getadmin
  public function getAdmin()
  {
      return $this->admin;
  }

  public function setAdmin($admin)
  {
      $this->admin = $admin;
  }

  public static function login(User $user){
      $_SESSION['user'] = $user;
  }
	// logout (descruction de variable et session)
  public static function logout(){
      session_destroy();
      session_unset();
      unset($_SESSION["user"]);
  }

	// hydrate
	public function hydrate(array $donnees){
		foreach($donnees as $key => $value){
			$method = "set" . ucfirst($key);
			$this->$method($value);
		}
	}
}


?>
