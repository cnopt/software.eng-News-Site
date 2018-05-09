<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="" rel="stylesheet" type="text/css"/>
    <title>Login</title>
</head>
<body>
  <header>
  </header>

<?php
    require_once 'functions.php';

    //get the varibales and filter them (validation to use in another file)
    $username = filter_has_var(INPUT_GET, 'username') ? $_GET['username']: null;
    $password = filter_has_var(INPUT_GET, 'password') ? $_GET['password']: null;

    echo "
        <!-- login form -->
        <form id = 'login' action = 'loginScript.php' method = 'post' >
            <!-- input username -->
            <p> Username: <input type = 'text' name = 'username' value = '$username' ></p>
            <!-- input password, type password so the content is now shown when typed-->
            <p> Password: <input type = 'password' name = 'password' value = '$password' ></p>
            <!-- submit form but clicking login button to access loginScript.php-->
            <p><input type = 'submit' name = 'Login' value = 'login' ></p>
        </form>
    ";
?>
</body>
</html>
