<?php require('./controller/session.php');
ob_start(); ?>


<?php $content = ob_get_clean();
require('./templates/template.php'); ?>
