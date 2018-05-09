<?php

function Login() {

    ini_set("session.save_path", "/home/unn_w15002812/sessionData");
    session_start();

    ///get the username from form
    $username = filter_has_var(INPUT_POST, 'username') ? $_POST['username']: null;
    $username = trim($username);
    //get the password from form
    $password = filter_has_var(INPUT_POST, 'password') ? $_POST['password']: null;
    $password = trim($password);

    //if fields are left empty show error and link back to login form
    if(empty($username) || empty($password)) {
        echo "<p>Please enter a correct username or password.</p>\n";
        echo "<p><a href='loginForm.php'>Login</a></p>\n";
    }
    else {

        try {
            //unset the previous session data
            unset($_SESSION['username']);
            unset($_SESSION['password']);

            //connection to the database
            $hostname='localhost';
            $username='unn_w15002812';
            $password='RYNUZTYA';
            $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT passwordHash
                    FROM admin
                    WHERE username = :username";
            //validation to prepare the data safely
            $queryResults = $dbh->prepare($sql);
            //put details into an array
            $queryResults->execute(array(':username' => $username));
            $admin = $queryResults->fetchObject();

            //if an admin match is found in the database the do the following
            if ($admin) {
                //verify the password with the unique passwords hash
                if (password_verify($password, $admin->passwordHash)) {
                    echo "<p>Welcome Admin!</p>\n";
                    //provide access
                    echo "<p><a href='soft-eng/article-submission/index.php'>Access Granted</a></p>";

                    //set session details for login uses
                    $_SESSION['logged-in'] = true;
                    $_SESSION['username'] = $username;
                } else {
                    //print error message if details where wrong
                    echo "<p>Login details were incorrect.</p>\n";
                    echo "<p><a href='loginForm.php'>Try again!</a></p>\n";
                }
            }
            else {
                //if admin does not match print error
                echo"<p>Username or password incorrect</p>";
                echo "<p><a href='loginForm.php'>Try again!</a></p>\n";
            }
            //catch any exceptions
        } catch (Exception $e) {
            echo "<p>Details not found: " . $e->getMessage() . "</p>\n";
        }
    }
}


function Logout() {

    //start session and save the data
    ini_set("session.save_path", "/home/unn_w15002812/sessionData");
    session_start();

    //put the array of information into the session var
    $_SESSION = array();
    //destroy the session so the user can logout
    session_destroy();

    //if the user is not logged in
    if(!isset($_SESSION['logged-in'])) {
        //redirect to te home page
        header("Location:index.php");
        exit(); }
}

?>
