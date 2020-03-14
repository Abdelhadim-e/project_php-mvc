<?php
require_once('Connection.class.php');
require_once('User.class.php');


class UserManager {
    //var db
    private $db;

    //COnstructeur conn
    public function __construct($db1) {
      $db1 = new Connection();
      $this->db = $db1->getConnection();

    }

    public function login(User $user) {
        $req = $this->db->prepare("SELECT * FROM users WHERE email= :email");
        $req->execute(array('email' => $user->getEmail()));
        $result =$usersQuery->fetchObject();
        $password_hash = $result->password;
        if(password_verify($_POST['password'],$password_hash)){
            $user =(array)$result;
            $user = new User($user);
            User::login($user);
            return true;
        }
        return false;
    }

    public function create(User $user) {
      $req = $this->db->prepare(
     'INSERT INTO users(lastName, firstName, email, address, postalCode, city, password)
     VALUES(:lastName, :firstName, :email, :address, :cp, :city, :password)');
    $req->execute(
    array(
    'lastName' => $user->getLastName(),
    'firstName' => $user->getFirstName(),
    'email' => $user->getEmail(),
    'address' => $user->getAddress(),
    'cp' => $user->getPostalCode(),
    'city' => $user->getCity(),
    'password' => $user->getPassword()
    ));

    }

    public function findAll() {
    $req = $this->db->prepare(
      'SELECT * FROM users'
    );
    $req->execute();
    $result = $req->fetchAll();
    return $result;

    }


    public final function findOne($id) {
      $req = $this->db->prepare('SELECT * FROM users WHERE id = '. $user->getId());
      $req->execute();
      $result = $req->fetchObject();
      $result = (array)$result;
      $result = new User(array);
      return $result;

    }
    public final function update(User $user) {
      $req = $this->db->prepare("UPDATE users SET lastName = :lastName,
                                                                  firstName = :firstName,
                                                                  email = :email,
                                                                  address = :address,
                                                                  postalCode = :postalCode
                                                                  city= :city,
                                                                  password =:password
                                                                   WHERE id=".$user->getId());
           if(!empty($_POST['password'])){
               $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
               }else{
                   $password = $user->getPassword();
       			$usersQuery->execute(
       				array(
       					'lastName' => $_POST['lastname'],
       					'firstName' => $_POST['firstname'],
       					'email' => $_POST['email'],
       					'address' =>$_POST['address'],
       					'school' => $_POST['postalCode'],
       					'city' => $_POST['city'],
       					'password' => $password
       				)
       			);
   		}
   	}
    public final function delete(User $user) {
      $req = $this->db->prepare("DELETE FROM users WHERE id =".$user->getId());
      $result = $req->execute();
      return $result;
    }

}

?>
