<?php
    require 'core.php';
    require 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Messages</title>
    <link rel = "stylesheet" type = "text/css" href = "index.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script src = "index.js"></script>
</head>
<body>
    <?php
        if(isset($_POST['to']) &&isset($_POST['title']) && isset($_POST['message'])) {
            $from = testInputData($_SESSION['userID']);
            $to = testInputData($_POST['to']);
            $title = testInputData($_POST['title']);
            $message = testInputData($_POST['message']);   

            if(!empty($to) && !empty($title) && !empty($message)){
                $query = "INSERT INTO Message VALUES('', '$from', '$to', '$title', '$message', 0, 0, 0);";
        
                if($query_run = mysqli_query($conn, $query)){
                    echo 'Message has been sent';
                }
                else{
                    echo 'Error while sending message. Please try again!';
                }
            }
        }
    ?>
    <div class = "send-receive-main">
        <a href = "user.php"><button class = "home">Home</button></a>
        <div class = "send-textarea">
            <form action = "" method = "post" id = "sendForm">
                <input type = "text" name = "to" placeholder = "To" class = "input-field1"></input><br>
                <input type = "text" name = "title" placeholder = "Title" class = "input-field2"></input><br>
                <textarea name = "message" placeholder = "Message" class = "input-field3" form = "sendForm"></textarea>
                <input type = "submit" placeholder = "Send" class = "input-field"></input><br>
            </form>
        </div>
    </div>
</body>
</html>