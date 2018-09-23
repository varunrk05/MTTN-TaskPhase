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
    <title>Received messages</title>
    <link rel = "stylesheet" type = "text/css" href = "index.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script src = "index.js"></script>
</head>
<body>
    <?php
        $receiverid = $_SESSION['userID'];
        $query = "SELECT ID, senderID, title, message FROM Message WHERE receiverID = '$receiverid' AND seen = 0;";
        if($query_run = mysqli_query($conn, $query)){
            $flag = 0;
            $qnr = mysqli_num_rows($query_run);
            if($qnr == 0){
                $flag = 0;
                echo 'No more messages';
            }
            else if($qnr > 0){
                $flag = 1;
                $row = mysqli_fetch_row($query_run);
                $messageID = $row[0];
                $senderid = $row[1];
                $title = $row[2];
                $message = $row[3];
                $query_seen = "UPDATE Message SET seen = 1 where ID = '$messageID'";
                mysqli_query($conn, $query_seen);
            }
        }
        else{
            echo 'No messages!';
        }
    ?>
    <div class = "send-receive-main">
        <a href = "user.php"><button class = "home">Home</button></a>
        <div class = "receive-textarea">
            <p class = "input-field1" id = "sID"><?php if($flag == 1){echo $senderid;}?></p>
            <p class = "input-field2" id = "title"><?php if($flag == 1){echo $title;}?></p>
            <p class = "input-field3" id = "message"><?php if($flag == 1){echo $message;}?></p>
            <a href = "receivedMessages.php"><button class = "input-field">Next Message</button></a>
        </div>
    </div>
</body>
</html>