<?php
class User {
    // var coordonnées
    private $id;
    private $email;
    private $password;
    private $firstName;
    private $lastName;
    private $address;
    private $postalCode;
    private $city;

    //Constructeur de données
    public function __construct(array $donnes = array()) {
        $this->hydrate($donnes);
    }


    // set et get id
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id1;
    }
    // set et get email
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email1) {
        $this->email = $email1;
    }
    // set et get password
    public function getPassword() {
        return $this->password;
    }
    public function setPassword($password1) {
        $this->password = $password1;
    }
    // set et get firstname
    public function getFirstName() {
        return $this->firstName;
    }
    public function setFirstName($firstName1) {
        $this->firstName = $firstName1;
    }
    // set et get lastname
    public function getLastName() {
        return $this->lastName;
    }
    public function setLastName($lastName1) {
        $this->lastName = $lastName1;
    }
    // set et get address
    public function getAddress() {
        return $this->address;
    }
    public function setAddress($address1) {
        $this->address = $address1;
    }
    // set et get postalCode
    public function getPostalCode() {
        return $this->postalCode;
    }
    public function setPostalCode($postalCode1) {
        $this->postalCode = $postalCode1;
    }
    // set et get city
    public function getCity() {
        return $this->city;
    }
    public function setCity($city1) {
        $this->city = $city1;
    }


    // Hydrate method
    public function hydrate(array $donnees){
        foreach($donnes as $key => $value){
            $method = "set".ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}
