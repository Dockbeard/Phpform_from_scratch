<?php //require('../controller/registration.php'); ?>
<?php ob_start(); ?>

<form class="w-50 p-3 mx-auto mt-5" action="../controller/registration.php" method="POST">
    <div class="form-group">
        <label for="username">Nom d’utilisateur</label>
        <input type="text" class="form-control" id="username" placeholder="John Doe" name="username" required>
        <span class="error"><?php if (isset($nameError)) echo $nameError ?></span><br>
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
        <span class="error"><?php if (isset($nameError)) echo $passwordError ?></span><br>
    </div>
    <div class="form-group">
        <label for="password">Mot de passe confirmation</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password_check" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
               placeholder="John.Doe@example.com" name="email" required>
        <span class="error"><?php if (isset($nameError)) echo $emailError ?></span><br>
    </div>

    <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>
<?php $content = ob_get_clean(); ?>
<?php require('../templates/template.php'); ?>
