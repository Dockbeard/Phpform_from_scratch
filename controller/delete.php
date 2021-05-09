<?php
session_start();
require('../model/User.php');

//check method request

    $newConnect = new User();
    $newRequest = $newConnect->deleteUser($_SESSION['email']);

    session_unset();
    session_destroy();

    header('Location: http://localhost/Phpform_from_scratch/view/account.php');


