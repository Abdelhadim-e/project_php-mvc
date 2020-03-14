<?php
session_start();



?>


<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
<link rel="stylesheet" href="css/form.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</head>
<nav style="padding:30px;" class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">site tp authentification</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
    <a class="nav-link" href="#"><a style="padding-left:40px;color:blue;margin:0px;font-weight:bold;text-decoration:none;"href="index.php?ctrl=user&action=listUser">->Gestion des utilisateurs</a><span class="sr-only">(current)</span></a>
    </li>
  </ul>
   <div class=" ">
    <?php  if(!isset($_SESSION["user"])){ ?>
      <div>
        <p><a href="index.php?ctrl=user&action=login">Connexion</a> |
        <a href="index.php?ctrl=user&action=create">S'inscrire</a></p>
      </div>
    <?php
    } else{
    ?>
      <div>
      <!-- affichage user -->
      <?php echo "<span style='font-weight:bold;'>Bienvenue ! </span>" . $_SESSION['user']->getFirstName()." ".$_SESSION['user']->getLastName()." | <a href='index.php?ctrl=user&action=doLogout'>Se déconnecter</a></div>"; ?>
      </div>
    <?php }?>
  </div>
  </div>
</nav>

  <div class="row">
  </div>

  <div id="content">
      <?php
      if(isset($page)){
          require("./View/".$page.".php");
      }
      ?>
  </div>


  <div class="row">
      <div id="message" class="mx-auto">
          <?php
      if(!isset($_SESSION["user"])){
        if(isset($info)){
          print("<div class='alert alert-$info[1]'><strong>$info[0]</div>");
        }
      }
      ?>
      </div>
  </div>

  <?php

  require('View/footer.php');

  ?>
