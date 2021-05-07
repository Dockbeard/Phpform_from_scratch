<?php
require('../model/User.php');

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
    $username = clear_input($_POST['username']);
    $email = clear_input($_POST['email']);
    $password = clear_input($_POST['password']);

    //username verification
    $name = $_POST['username'];
    if (!preg_match('/^[a-zA-Z0-9\s]+$/', $name)) {
        $nameError = 'Name can only contain letters, numbers and white spaces';
        header('Location: http://localhost/Phpform_from_scratch/view/registration.php');
    }

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

    //check if the password and password confirmation is the same && if the email already exist
    if ($_POST['password'] == $_POST['password_check'] && $verifyEmail == false) {

        //hash pwd
        $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT);

        session_start();

        //send user registration request on db
        $newConnect = new User();
        $newRequest = $newConnect->registrationUser($_POST['username'], $_POST['email'], $passwordHash);

        //keep current user in session
        $_SESSION['email'] = $_POST['email'];
        $data = $newConnect->sessionUser($_SESSION['email']);

        header('Location: http://localhost/Phpform_from_scratch/view/account.php');
    } else {
        header('Location: http://localhost/Phpform_from_scratch/view/registration.php');
    }

} else {
    header('Location: http://localhost/Phpform_from_scratch/view/registration.php');
}


