<?php ob_start(); ?>

<a href="http://localhost/Phpform_from_scratch/view/connection.php"><button class="btn btn-outline-success my-2 my-sm-0 " type="submit">Connexion</button></a>
<a href="http://localhost/Phpform_from_scratch/view/registration.php"><button class="btn btn-primary " type="submit">S'inscrire</button></a>
<?php $content = ob_get_clean();
require('./templates/template.php'); ?>
