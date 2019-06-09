<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel = "stylesheet"
          type = "text/css"
          href = "style.css" />
</head>
<body>
<br>
<?php
   require 'db.php';
   require 'session.php';
   
    function printNoUser($inRed) {
        if ($inRed === true) {
            $asterisk = '*';
        } else {
            $asterisk = '';    
        }
        echo '<h2>Signup</h2>
        <br>
        <form action="./signup.php" method="POST"  style="border:1px solid #ccc">
        
        <div class="container">
        <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="email"><b>Email</b></label>
        <input name="login"  placeholder="Enter Email" type="text" required><br><br>
        <label for="psw"><b>Password</b></label>
        <em>'.$asterisk.'</em><input name="password" placeholder="Enter Password" type="text" required>
        <hr>
        <label for="psw-repeat"><b>Repeat Password</b></label>
        <em>'.$asterisk.'</em><input name="password_copy" placeholder="Repeat Password" type="text" required>
        <br><br>
        <div class="clearfix">
        <input type="submit"  class="signupbtn">
        </div>
        </div>
        </form>';
    }

    function printUser($username) {
        echo '<h2>Welcome, '.$username.'</h2>';
    }

    function insertUserToDb($db, $login, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        echo 'password='.$password.', hash = '.$hashedPassword.'';
        insertUser($db, $login, $hashedPassword);
    }


    function redirectToWelcome() {
         $newPage = "index.php";
         header("Location: $newPage");
         die();    
    }

    function checkValid($password){
        $regexLength = "/[0-9a-zA-Z]{7,}/";
        $regexNum = "/[0-9]/";
        return (preg_match($regexLength, $password) && preg_match($regexNum, $password));
    }
   
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login']) && isset($_POST['password'])){
        // retrieve the form data by using the element's name attributes value as key
        $login = $_POST['login'];
        $password = $_POST['password'];
        $passwordCopy = $_POST['password_copy'];
        $db = getDb();
        $users = selectByLogin($db, $login);
        //$users = selectByLoginPassword($db, $login, $password);
        $countUsers =count($users); 
        if($countUsers == 0) {
                //User not found
                //Cheking password match 
                if($password == $passwordCopy && checkValid($password)) {
                   $user_id = insertUserToDb($db, $login, $password);
                   setSessionUser($user_id, $login);
                   redirectToWelcome();
                } else {
                    // Passwords do not match
                    printNoUser(true);
                }
        } else {
            // multiple users with same login not allowed, 
            echo '<h2>Error</h2>';
        }
    } else {
        //Get or no login/ password info
        printNoUser(false);
    }
?>
</body>
</html>