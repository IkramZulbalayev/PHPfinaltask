<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website</title>
  <link rel="stylesheet" href="styles.css"/>
</head>
<body>
    <?php
    // Showing login success or failure messages
      if (isset($_GET['login'])) {
          if ($_GET['login'] === 'success') {
              echo "<p style='color: green;'>Login successful! Welcome back.</p>";
          } elseif ($_GET['login'] === 'failed') {
              echo "<p style='color: red;'>Login failed. Please check your credentials.</p>";
          }
      }
      // Showing signup success or failure messages
      if (isset($_GET['signup'])) {
          if ($_GET['signup'] === 'success') {
              echo "<p style='color: green;'>Signup successful! You can now log in.</p>";
          } elseif ($_GET['signup'] === 'failed') {
              echo "<p style='color: red;'>Signup failed. Please try again.</p>";
          }
      }
      ?>

  
    <section class="index-login">
      <div class="wrapper">

        <div class="index-signup">
          <div class="signup-text">
            <h4>Sign-up</h4>
            <p class="p">Sign up here!</p>
          </div>
          <div class="form-group">
          <form action="process/signup.prc.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="passwordrep" placeholder="Repeat Password">
            <input type="text" name="email" placeholder="E-mail">
          </div>       
            <br>
            <button type="submit" name="submit" class="btn-submit">Sign-Up</button>
          </form>
          
        </div>
        <div class="index-login">
          <div class="login-text">
            <h4>Login</h4>
            <p>Login Here!</p>
          </div>

        <form action="process/login.prc.php" method="post">
          <div class="form-group">
          <input type="text" name="username" placeholder="Username">
          <input type="password" name="password" placeholder="Password">
          </div>
          <br>
          <button type="submit" name="submit" class="btn-submit">Login</button>
        </form>
      </div>

     </div>
    </section>
</body>
</html>