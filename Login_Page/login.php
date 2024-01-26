<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>

    <form action="../include/login_Process.php" method="post" id="login-form">
      <h1>User Login</h1>

      <label for="username">Username:</label>
      <input type="text" id="username" name="username"  placeholder="Enter your User Name" required/>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password"  placeholder="Enter your Passwprd" required />

      <button type="submit">Login</button>
      <button type="reset" class="clear-button">clear</button>
    </form>
  </body>
</html>
