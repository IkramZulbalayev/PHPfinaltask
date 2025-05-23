<?php

class LoginContr extends Login
{
  private $username;
  private $password;

  public function __construct($username, $password)
  {
    $this->username = $username;
    $this->password = $password;
  }

  public function loginUser()
  {
    if($this->emptyInput() == false){
      header("location: ../index.php?error=emptyinput"); // Redirect if inputs are empty
      exit();
    }
    
    $this->getUser($this->username, $this->password); // Attempt login
  }

  private function emptyInput()
  {
    $result = true;
    if(empty($this->username) || empty($this->password))
    {
      $result = false;
    }
    return $result; // Check if inputs are not empty
  }
}
