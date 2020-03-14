<?php

require('Model/Connection.class.php');
require('Model/User.class.php');



$pdo = new Connection();
$db = $pdo->getConnection();

/// TEST fichier User.class.php
// $p1 = new User();
// $p1->setId("5");


if(isset($_POST['send']) == "Créer/Valider"){
      // echo "test btn formulaire = ok";
      echo "<br>";
      echo "--------";
      echo "<br>";
      if(!empty($_POST['email']) && !empty($_POST['lastName']) && !empty($_POST['firstName']) && !empty($_POST['address']) && !empty($_POST['postalCode']) && !empty($_POST['password']) && !empty($_POST['city'])){
        echo "<span style='margin:20px;border:5px solid green;border-style: dashed double;'>Bonjour <strong>" . $_POST['firstName'] . "</strong>!  Votre formulaire a bien été envoyé !! :)</span>";
      }else {
        echo "<span style='margin:20px;border:5px solid red;border-style: dashed double;'>Veuillez remplir les champs qui sont vides</span>";
      }
}

require('View/formulaire.php');

?>
