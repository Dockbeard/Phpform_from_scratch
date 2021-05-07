<?php
session_start();
session_unset();
session_destroy();


header('Location: http://localhost/Phpform_from_scratch/view/registration.php');
