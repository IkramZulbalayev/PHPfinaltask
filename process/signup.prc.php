<?php

if(isset($_POST["submit"]))
{
  //Getting data
  $username = $_POST["username"];
  $password = $_POST["password"];
  $email = $_POST["email"];
  $passwordrep = $_POST["passwordrep"];

  include "../classes/dbh.classes.php";
  include "../classes/signup.classes.php";
  include "../classes/signup-contr.classes.php";
  $signup = new SignupContr($username, $email, $password, $passwordrep);

  //Running error handlers and User signup
  $signup->signupUser();

  //Sending User back to front page
  header("Location: ../index.php?signup=success");
}