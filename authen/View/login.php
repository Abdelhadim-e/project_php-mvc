<!-- Page login -->
<div class="container">
    <form action="index.php?ctrl=user&action=doLogin" method="POST" name="login" id="login_form">

		<?php if(!empty($info)){ ?>
			<div>
				<label for="error">Error </label>
				<input type="text" value="<?php print($info); ?>" readonly name="error" id="error">
			</div>
        <?php }?>

        <h2 style="text-align:center;padding:20px;">Se connecter</h2>
		<div class="row">
			<input type="email" id="email" name="email" class="form-block form-control col-md-5" placeholder="Adresse email" required="" autofocus="">

			<input type="password" id="password" name="password" class="form-block form-control col-md-5" placeholder="Mot de passe" required="">

			<button class="btn btn-primary col-md-2 form-block" type="submit">Connexion</button>
		</div>
    </form>
</div>
