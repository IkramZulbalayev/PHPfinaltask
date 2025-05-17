<?php

class SignupContr extends Signup
{

  private $username;
  private $email;
  private $password;
  private $passwordrep;

  
  //Constructor to get data
  public function __construct($username, $email, $password, $passwordrep)
  {
    $this->username = $username;
    $this->password = $password;
    $this->email = $email;
    $this->passwordrep = $passwordrep;
  }

  public function signupUser()
  {
    if($this->emptyInput() == false){
      //This sends User to emptyinput url if input is empty
      header("location: ../index.php?error=emptyinput");
      exit();
    }
    if($this->invalidUsername() == false){
      //This sends User to error=username url if username is invalid
      header("location: ../index.php?error=username");
      exit();
    }
    if($this->invalidEmail() == false){
      //This sends User to error=email url if email is invalid
      header("location: ../index.php?error=email");
      exit();
    }
    if($this->passwordMatch() == false){
      //This sends User to error=passwordmatch url if passwords do not match
      header("location: ../index.php?error=passwordmatch");
      exit();
    }
    if($this->userExists() == false){
      //This sends User to error=useroremailtaken url if username or email is already taken
      header("location: ../index.php?error=useroremailtaken");
      exit();
    }

    $this->setUser($this->username, $this->password, $this->email);
  }

  private function emptyInput()
  {
    $result = true;
    if(empty($this->username) || empty($this->password) 
    || empty($this->email) || empty($this->passwordrep))
    {
      $result = false;
    }
    return $result;
  }
  private function invalidUsername()
{
  $result = true;
  if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username))
  {
    $result = false;
  }
  return $result;
}

private function invalidEmail()
{
  $result = true;
  if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
  {
    $result = false;
  }
  return $result;
}

private function passwordMatch()
{
  $result = true;
  if($this->password !== $this->passwordrep)
  {
    $result = false;
  }
  return $result;
}

private function userExists()
{
  $result = true;
  if(!$this->checkUser($this->username, $this->email))
  {
    $result = false;
  }
  return $result;
}
}