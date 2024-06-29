<?php


session_start();
$errors = [];
if (empty($_REQUEST["name"])) $errors["name"] = "Name Is Required!";
if (empty($_REQUEST["email"])) $errors["email"] = "Email Is Required!";

if (empty($_REQUEST["Phone"])) {
    $errors["Phone"] = "Phone Is Required!";
} elseif (strlen($_REQUEST["Phone"]) != 11 || !ctype_digit($_REQUEST["Phone"])) {
    $errors["Phone"] = "Phone must be exactly 11 digits!";
}


if (empty($_REQUEST["pw"]) || empty($_REQUEST["pc"])) {
    $errors["pw"] = "Password & Password Confirmation Is Required!";                          //validation//
} else if ($_REQUEST["pw"] != $_REQUEST["pc"]) {

    $errors["pc"] = "Password Confirmation Must be equal to Password !";
}





$name = htmlspecialchars(trim($_REQUEST["name"]));
$email = filter_var($_REQUEST["email"], FILTER_SANITIZE_EMAIL);
$Phone = htmlspecialchars($_REQUEST["Phone"]);                           //filteration//            
$Password = htmlspecialchars($_REQUEST["pw"]);
$Password_confirmation = htmlspecialchars($_REQUEST["pc"]);



if (!empty($_REQUEST["email"]) && !filter_var($_REQUEST["email"], FILTER_VALIDATE_EMAIL)) $errors["email"] = "Email Invalide Format please add aa@pp.cc";





if (empty($errors)) {


    require_once('classes.php');
  
    try {
      $rslt = Subscriber::register($name, $email, md5($Password), $Phone);
      header("location:index.php?msg=sr");
    } catch (\Throwable $th) {
      header("location:register.php?msg=error");
    }
} else {

    $_SESSION["errors"] = $errors;
    header("location:register.php");
}
