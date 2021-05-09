<?php
require('../model/User.php');

$user = new User();
$data = $user->sessionUser($_POST['email']);
//check method request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //clear all input
    function clear_input($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    //clear each input form
    $email = clear_input($_POST['email']);
    $password = clear_input($_POST['password']);

    //email verification
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Invalid Email';
        header('Location: http://localhost/Phpform_from_scratch/view/registration.php');
    }

    // password verification
    $password = $_POST['password'];

    //regex for security password
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);

    //check if password is completely secured
    if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
        $passwordError = 'Please enter a long password';
        header('Location: http://localhost/Phpform_from_scratch/view/registration.php');
    }

    //check if the email already exist in db
    $newConnect = new User();
    $verifyEmail = $newConnect->sessionUser($_POST['email']);

    //check if the password_hash match with form value
    if (password_verify($_POST['password'], $data['password'])) {
        session_start();

        $_SESSION['email'] = $_POST['email'];
        $data = $newConnect->sessionUser($_SESSION['email']);

        header('Location: http://localhost/Phpform_from_scratch/view/account.php');

    } else {
        header('Location: http://localhost/Phpform_from_scratch/view/reg.php');
    }
}



