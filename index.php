<?php require('./controller/session.php');
ob_start(); ?>

<h1>test</h1>
<a href="http://localhost/UPYNE PROJECT/controller/disconnect.php"><button class="btn btn-outline-success my-2 my-sm-0 " type="submit">Déconnexion</button></a>
<?php $content = ob_get_clean();
require('./templates/template.php'); ?>
