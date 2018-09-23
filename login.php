<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Register</title>
    <link rel = "stylesheet" type = "text/css" href = "index.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script src = "index.js"></script>
</head>
<body>

    <?php
        $selector = 'U'; 
        if(isset($_POST['position']))
            if($_POST['position'] == "Admin")
                $selector = 'A';

        if(isset($_POST['userid']) && isset($_POST['pass'])) {
            $userid = testInputData($_POST['userid']);
            $pass = testInputData($_POST['pass']);   

            if(!empty($userid) && !empty($pass)){
                if($selector == 'U'){
                    $query = "SELECT userID FROM Users WHERE userID = '$userid' AND password = '$pass'";
                }
                else if($selector == 'A'){
                    $query = "SELECT adminID FROM Admin WHERE adminID = '$userid' AND password = '$pass'";
                }    

                if($query_run = mysqli_query($conn, $query)){
                    $qnr = mysqli_num_rows($query_run);
                    if($qnr == 0){
                        header('Location: main.php');
                    }
                    else if($qnr == 1){
                        $_SESSION['userID'] = $userid;
                        if($selector == 'A')
                            header('Location: admin.php');
                        else if($selector == 'U')
                            header('Location: user.php');                            
                    }
                }
            }
        }
    ?>

    <div class = "signup-login">
        <div class = "select-form">
            </span><span onclick = "showSignUp(false)">Log In</span><span onclick = "showSignUp(true)">Sign Up
        </div>
        <div class = "sign-up">
            <form action = "signup.php" method = "post">
                <input type = "text" name = "username" placeholder = "Enter your name" class = "input-field"><br>
                <input type = "text" name = "userid" placeholder = "Enter your user ID" class = "input-field"><br>
                <input type = "password" name = "pass" placeholder = "Enter a password" class = "input-field"><br>
                <input type = "submit" value = "Sign Up" class = "input-field">
            </form>
        </div>
        <div class = "log-in">
            <form action = "<?php echo $fileName ?>" method = "post">
                <input type = "text" name = "userid" placeholder = "Enter your user ID" class = "input-field"><br>
                <input type = "password" name = "pass" placeholder = "Enter your password" class = "input-field"><br>
                <select name = "position" class = "input-field">
                    <option value = "User">User</option>
                    <option value = "Admin">Admin</option>
                </select>
                <br>
                <input type = "submit" value = "Log In" class = "input-field">
            </form>
        </div>
    </div>
</body>
</html>