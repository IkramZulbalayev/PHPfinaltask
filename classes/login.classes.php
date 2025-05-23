<?php

class Login extends Dbh
{
  protected function getUser($username, $password)
  {
    //If Errors in controller page do not occur, We set User's information into our DB
    $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?;');

    //If User's id and email is not in DB we are directing user to stmtfailed url
    if(!$stmt->execute(array($username, $password))){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }
    
    if($stmt->rowCount() == 0){
      $stmt = null;
      header("location: ../index.php?error=usernotfound");
      exit();
    }

    $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $checkPwd = password_verify($password, $pwdHashed[0]["users_pwd"]);

    if($checkPwd == false){
      $stmt = null;
      header("location: ../index.php?error=wrongpassword");
      exit();
    }elseif($checkPwd == true){
      $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ? AND users_pwd = ?;');

      if(!$stmt->execute(array($username, $username, $password))){
        $stmt = null;
        header("location: ../index.php?error=stmtfailed");
        exit();
      }

      $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

      session_start();
      $_SESSION["userid"] = $user[0]["users_id"];
      $_SESSION["useruid"] = $user[0]["users_uid"];

    }

    $stmt = null;
  }

  
}