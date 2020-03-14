<!-- Page create  -->
<div id="signup_form_wrapper" class="container">


    <form class="form-signin" action="index.php?ctrl=user&action=doCreate" method="POST" name="signup" id="signup_form">


            <?php if(!empty($info)){ ?>
                <div class="pure-control-group">
                    <label for="error">Error </label>
                    <input type="text" value="<?php print($info); ?>" readonly name="error" id="error">
                </div>
            <?php }?>


            <h2 style="text-align:center;padding:20px;"class="form-signin-heading">Inscription</h2>
            <label for="email" class="sr-only">Adresse email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Adresse email" required="" autofocus="">

            <label for="password" class="sr-only">Mot de passe</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" required="">

            <label for="firstname" class="sr-only">Prénom</label>
            <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Prénom" required="" autofocus="">

            <label for="lastname" class="sr-only">Nom</label>
            <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Nom" required="" autofocus="">

            <label for="address" class="sr-only">Addresse</label>
            <input type="text" id="address" name="address" class="form-control" placeholder="Adresse" required="" autofocus="">

            <label for="school" class="sr-only">School</label>
            <input type="text" id="school" name="school" class="form-control" placeholder="School" required="" autofocus="">

            <label for="city" class="sr-only">Ville</label>
            <input type="text" id="city" name="city" class="form-control" placeholder="Ville" required="" autofocus="">

            <div class="checkbox">
                <label>
                    <input name="admin" id="admin" type="checkbox" value="1"> Admin
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">S'inscire</button>
    </form>
</div>
