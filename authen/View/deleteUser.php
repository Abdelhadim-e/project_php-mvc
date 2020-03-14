<!-- Page deleteUser -->
<div class="row">
    <div class=" mx-auto mt-3">
        <strong>Voulez-vous vraiment supprimer l'utilisateur ----> <?php echo $_GET['userId'] ?>?</strong>
       <div class="row">
           <div class="mx-auto mt-3">
               <form action="index.php?ctrl=user&action=doDeleteUser" method="post">
                   <input id="user" name="user" value="<?php echo $_GET['userId'] ?>" type="hidden">
                   <button class="btn btn-danger" data-toggle="confirmation" type="submit">Supprimer</button>
               </form>

               <a class="btn btn-default" data-toggle="cancel" href="index.php?ctrl=user&action=listUser">Annuler</a>
           </div>

       </div>

    </div>

</div>
