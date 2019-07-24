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
   
    function printNoUser() {
        echo '<h2>Login</h2>
        <br>
        <form action="./login.php" method="POST">
        <div class="container">
        <label for="email"><b>Email</b></label>
        <input name="login" type="text" placeholder="Enter Email" required><br><br>
        <label for="psw"><b>Password</b></label>
        <input name="password" placeholder="Enter Password" type="text" required>
        <br><br>
        <div class="clearfix">
        <input type="submit">
        </div>
        </div>
        </form>';
    }

    //   function printUser($username) {
    //     echo '<h2>Welcome, '.$username.'</h2>';
    // }
   
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login']) && isset($_POST['password'])){
        // retrieve the form data by using the element's name attributes value as key
        $login = $_POST['login'];

        $password = $_POST['password'];
        $db = getDb();
        //var_dump($password);
        //echo '<br>';
        
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // echo 'password='.$password.', hash = '.$hashedPassword.'<br>';
        // var_dump($hashedPassword);
        // echo '<br>';
        $users = selectByLogin($db, $login);//listAll($db); //
        //var_dump($users);
        $countUsers =count($users); 
        if($countUsers == 0) {
                //User not found
                printNoUser();
        } else if ($countUsers == 1) {
                // user is found, storing the user Id into session
                $r = $users[0];
                $id = $r['id'];
                $hashedPassword = $r['password'];
                $userName = $r['login'];
               // var_dump($password);
               // var_dump($hashedPassword);
                if(password_verify($password, $hashedPassword)) {
                    setSessionUser($id, $userName);
                    $newPage = "index.php";
                    header("Location: $newPage");
                    die();    
                } else {
                    echo '<h2>Passwords do not match!</h2>';
                   // <li><a class="active" href="login.php">Return to login</a></li>
  
                    
                }
                
        } else {
            // multiple users, 
            echo '<h2>Error</h2>';
        }
    } else {
        //Get or no login/ password info
        printNoUser();
    }
?>
    Or <a href="signup.php">Sign up</a> for a new account.
</body>
</html>