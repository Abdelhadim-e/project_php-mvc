<?php

class userController{
    //var
    private $userManager;
    private $user;


    //Constructeur et cré objet userMnagaer
    public function __construct($db1){
        include('./Model/UserManager.class.php');
        $this->userManager = new UserManager($db1);
        $this->db = $db1;
    }

    //login
    public function login(){
        $page = 'login';
        require('./View/main.php');
    }

    //create
    public function create(){
        $page = 'create';
        require('./View/main.php');
    }

    // page unauthorized
    public function unauthorized(){
        $page = 'unauthorized';
        require('./View/main.php');
    }

    //listUser / condition page
    public function listUser(){
        if(isset($_SESSION['user']) && $_SESSION['user']->getAdmin() == "1"){
            $page= 'listUser';
            $users= $this->userManager->findAll();
            require('./View/main.php');
        }else{
			$this->unauthorized();
        }
    }

    // editUser et condition id user et objet requete
    public function editUser(){
        if(isset($_GET['userId']) && isset($_SESSION['user']) && $_SESSION['user']->getAdmin() == "1"){
            $page = 'editUser';
            $result = $this->userManager->findOne($_GET["userId"]);
            require ('./View/main.php');

        }
        else{
            $this->unauthorized();
        }
    }

	  // deleteUser condition id user et rediredction
    public function deleteUser(){
        if(isset($_GET['userId']) && isset($_SESSION['user']) && $_SESSION['user']->getAdmin() == "1"){
            $page = 'deleteUser';
            $result = $this->userManager->findOne($_GET["userId"]);
            require ('./View/main.php');
        }else{
            $this->unauthorized();
        }
    }

    //doLogin / condition mail password
    public function doLogin(){
        $this->user = new User();
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $this->user->setEmail($_POST['email']);
            $this->user->setPassword($_POST['password']);
            $result = $this->userManager->login($this->user);
            if ($result) :
                $info = array("Connexion reussie", "success");
            else :
                $info = array("Identifiants incorrects.", "danger");
            endif;
        }
        require('./View/main.php');
    }

    //Dologout
    public function doLogout(){
        if (isset($_SESSION['user'])) {
            $this->userManager->logout();
        }
        require('./View/main.php');
    }

    //doCreate
    public function doCreate(){
        var_dump($_POST);
        if (isset($_POST) && isset($_POST["password"])
            && isset($_POST["email"]) && isset($_POST["firstname"]) && isset($_POST["lastname"])
            && isset($_POST["address"]) && isset($_POST["school"]) && isset($_POST["city"])
           ) {
            $user["password"] = $_POST["password"];
            $user["email"] = $_POST["email"];
            $user["firstName"] = $_POST["firstname"];
            $user["lastName"] = $_POST["lastname"];
            $user["address"] = $_POST["address"];
            $user["school"] = $_POST["school"];
            $user["city"] = $_POST["city"];
            if (isset($_POST["admin"])) $user["admin"] = intval($_POST["admin"]);
            $this->user = new User($user);
            $this->userManager->create($this->user);
            header("Location: index.php?ctrl=user&action=login");
        }
    }

    //doEditUser
    public function doEditUser(){
		echo"up";
        try{
                $user = $this->userManager->findOne($_GET["userId"]);
                $this->userManager->update($user);
                $this->userManager->updateRole($user);
            header("Location: index.php?ctrl=user&action=listUser");
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    //doDeleteUser
    public function doDeleteUser(){
        try{
            $this->user = $this->userManager->findOne($_POST["user"]);
            $this->userManager->delete($this->user);
            header("Location: index.php?ctrl=user&action=listUser");
        } catch (\Exception $e){
            echo $e->getMessage();
        }
    }
}

?>
