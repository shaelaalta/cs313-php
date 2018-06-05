<?php
/*
accounts controller
*/
session_start();

require_once '../db/connect.php';
require_once '../db/youknow.php';
require_once '../photoModel/user-model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'register':
        $clientFirstname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
        $clientLastname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
        $clientEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $clientPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        
        $clientEmail = checkEmail($clientEmail);
        //$checkPassword = checkPassword($clientPassword);
        $existingEmail = checkExistingEmail($clientEmail);
        
        if($existingEmail){
            $message = "<p class='notice'>That email address already exists. Do you want to "
                    . 'login instead?</p>';
            include '../view/signIn.php';
            exit;
        }
        
        if(empty($clientFirstname) || empty($clientLastname) || 
                empty($clientEmail) || empty($checkPassword)){
            $message = "<p class='notice'>Please provide information for all empty form fields.</p>";
            include '../view/makeAccount.php';
            exit; 
        }
        
        //makes password sneaky and protected
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
        
        //send data to model
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, 
                $hashedPassword);
        
        // Check and report the result
        if($regOutcome === 1){
            $message = "<p class='notice'>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
            include '../view/signIn.php';
            exit;
        } else {
            $message = "<p class='notice'>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
            include '../view/makeAccount.php';
            exit;
        }
        break;
        
    case 'logIn':
        $useremail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $userpassword = filter_input(INPUT_POST, 'userpassword', FILTER_SANITIZE_STRING);
        
        $useremail = checkEmail($useremail);
        //$checkedPassword = checkPassword($userpassword);
      
        if(empty($useremail) || empty($userpassword)) {
            $message = "<p class='notice'>Please provide correct information for all form fields</p>";
            include '../view/signIn.php';
            exit;
        }
        
        /*$existingEmail = checkExistingEmail($useremail);
        
        if(!$existingEmail){
            $message = "<p class='notice'>That email address doesn't exist. Do you want to create an account instead?</p>";
            include '../view/signIn.php';
            exit;
        }*/

        
        $clientData = getClient($useremail);
        $hashCheck = password_verify($userpassword, $clientData['clientPassword']);
        
        if (!$hashCheck) {
            $message = '<p class="notice">Please check your password and try again.</p>';
            include '../view/signIn.php';
            exit;
        }
        
        $_SESSION['loggedin'] = TRUE;
        array_pop($clientData);
        $_SESSION['clientData'] = $clientData;
        header("location: /accounts/index.php");
        break;
    
    case 'newAccount':
        include '../view/makeAccount.php';
        break;
        
    default:
        include '../view/signIn.php';
        break;
}