<?php
require('./model/User.php');
session_start();
if (!isset($_SESSION['email']))
{
    header("Location: http://localhost/Phpform_from_scratch/view/registration.php");
}
$user = new User();
$data = $user->sessionUser($_SESSION['email']);
