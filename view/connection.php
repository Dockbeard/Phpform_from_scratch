<?php //require('../controller/registration.php'); ?>
<?php ob_start(); ?>

<form class="w-50 p-3 mx-auto mt-5" action="../controller/connection.php" method="POST">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
               placeholder="John.Doe@example.com" name="email" required>
        <span class="error"><?php if (isset($nameError)) echo $emailError ?></span><br>
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
        <span class="error"><?php if (isset($nameError)) echo $passwordError ?></span><br>
    </div>

    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<a href="http://localhost/Phpform_from_scratch/controller/registration.php"><button class="btn btn-outline-success my-2 my-sm-0">S'inscrire</button></a>
<?php $content = ob_get_clean(); ?>

<?php require('../templates/template.php'); ?>
