<?php
    require 'core.php';
    require 'connect.php';

    if(!loggedIn())
        header('Location: main.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
    <link rel = "stylesheet" type = "text/css" href = "index.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script src = "index.js"></script>
</head>
<body>
    <div class = "side-pane-main">
        <ul class = "side-pane">
            <a href = "sendMessage.php"><li>Send Message</li></a>
            <a href = "receivedMessages.php"><li>View received messages</li></a>
            <a href = "logout.php"><li>Log Out</li></a>
        </ul>
    </div>
</body>
</html>