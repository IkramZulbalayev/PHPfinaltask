<?php

class Signup extends Dbh
{
  protected function setUser($username, $password, $email)
  {
    $cipher = "AES-256-CBC";
    
    // Derive 256-bit key from password (raw binary)
    $key = hash('sha256', $password, true);
    
    // Generate random IV for encryption
    $ivLength = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivLength);
    
    // Encrypt a static string 'userKey' using the derived key and IV
    $ciphertext = openssl_encrypt("userKey", $cipher, $key, OPENSSL_RAW_DATA, $iv);
    
    $encryptionKey = base64_encode($iv . $ciphertext);
    
    // Securely hash the password for DB storage
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert user info including encrypted key into DB
    $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email, encryption_key) VALUES (?, ?, ?, ?);');
    
    if (!$stmt->execute([$username, $hashedPwd, $email, $encryptionKey])) {
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }
    
    $stmt = null;
  }
  
  public function checkUser($username, $email)
  {
    $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');
    
    if (!$stmt->execute([$username, $email])) {
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }
    
    return $stmt->rowCount() === 0;
  }

  // Decrypt the stored encrypted user key using the plain password
  public function decryptUserKey($encryptionKey, $password)
  {
    $cipher = "AES-256-CBC";
    $key = hash('sha256', $password, true);
    
    $data = base64_decode($encryptionKey);
    $ivLength = openssl_cipher_iv_length($cipher);
    
    $iv = substr($data, 0, $ivLength);
    $ciphertext = substr($data, $ivLength);
    
    return openssl_decrypt($ciphertext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
  }
}
