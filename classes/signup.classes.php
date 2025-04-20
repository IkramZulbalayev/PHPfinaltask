<?php

class Signup extends Dbh
{
  protected function setUser($username, $password, $email)
  {
    //If Errors in controller page do not occur, We set User's information into our DB
    $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, ?, ?);');

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    //If User's id and email is not in DB we are directing user to stmtfailed url
    if(!$stmt->execute(array($username, $password, $email))){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    $stmt = null;
  }

  public function checkUser($username, $email)
  {
    //We are checking Users' id and email is in our DB or not
    $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');

    //If User's id and email is not in DB we are directing user to stmtfailed url
    if(!$stmt->execute(array($username, $email))){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    if($stmt->rowCount() > 0){
      $resultCheck = false;
    }
    else{
      $resultCheck = true;
    }
    return $resultCheck;
  }
  
}
