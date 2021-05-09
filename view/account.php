<?php
require('../model/User.php');
session_start();
if (!isset($_SESSION['email']))
{
    header("Location: http://localhost/Phpform_from_scratch/view/registration.php");
}
$user = new User();
$data = $user->sessionUser($_SESSION['email']);?>

<?php ob_start(); ?>

<form class="w-50 p-3 mx-auto mt-5" action="../controller/update.php" method="POST">
    <h2>Compte de <?php echo $data['username'];?> :</h2><br>
    <?php echo $data['id'];?>
    <div class="form-group">
        <label for="username">Nom d’utilisateur</label>
        <input type="text" class="form-control" id="username" placeholder="John Doe" name="username" value = "<?php echo $data['username'];?>"  required>
        <span class="error">
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
        <span class="error">
    </div>
    <div class="form-group">
        <label for="password">Mot de passe confirmation</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password_check" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
               placeholder="John.Doe@example.com" name="email" value = "<?php echo $data['email'];?>" required>
        <span class="error">
    </div>
    <button class="btn btn-outline-success my-2 my-sm-0 " type="submit">Valider les changements</button>
</form>
<a href="http://localhost/Phpform_from_scratch/controller/disconnect.php"><button class="btn btn-outline-success my-2 my-sm-0 " type="submit">Déconnexion</button></a>
<a href="http://localhost/Phpform_from_scratch/controller/delete.php"><button class="btn btn-outline-success my-2 my-sm-0 button1" type="submit">Supprimer le compte</button></a>



    <?php $content = ob_get_clean(); ?>
<?php require('../templates/template.php'); ?>