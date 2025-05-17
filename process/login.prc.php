<?php

if(isset($_POST["submit"]))
{
  //Getting data
  $username = $_POST["username"];
  $password = $_POST["password"];

  include "../classes/dbh.classes.php";
  include "../classes/login.classes.php";
  include "../classes/login-contr.classes.php";
  $login = new LoginContr($username, $password);

  //Running error handlers and User signup
  $login->loginUser();

  //Sending User back to front page
  header("Location: ../index.php?login=success");
}