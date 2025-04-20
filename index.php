<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website</title>
</head>
<body>
  
    <section class="index-login">
      <div class="wrapper">
        <div class="index-signup">
          <h4>Sign-up</h4>
          <p>Sign up Here!</p>
          <form action="process/signup.prc.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="passwordrep" placeholder="Repeat Password">
            <input type="text" name="email" placeholder="E-mail">
            <br>
            <button type="submit" name="submit">Sign-Up</button>
          </form>
        </div>
        <div class="index-login">
        <h4>Login</h4>
        <p>Login Here!</p>
        <form action="process/login.prc.php" method="post">
          <input type="text" name="username" placeholder="Username">
          <input type="password" name="password" placeholder="Password">
          <br>
          <button type="submit" name="submit">Login</button>
        </form>
      </div>
      
     </div>
    </section>
</body>
</html>