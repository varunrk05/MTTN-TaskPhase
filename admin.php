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
    <title>Admin</title>
    <link rel = "stylesheet" type = "text/css" href = "index.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script src = "index.js"></script>
</head>
<body>
    <?php
        $query = "SELECT ID, senderID, receiverID, title, message FROM Message WHERE seenByAdmin = 0";
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
                $receiverid = $row[2];
                $title = $row[3];
                $message = $row[4];
                $query_seen = "UPDATE Message SET seenByAdmin = 1 where ID = '$messageID'";
                mysqli_query($conn, $query_seen);   
            }
        }
        else{
            echo 'No messages!';
        }

        if(isset($_POST['mark'])){
            $query_mark = "UPDATE Message SET mark = 1 where ID = '$messageID'";
            mysqli_query($conn, $query_mark);   
        }

        /*if(isset($_POST['delete'])){
            $query_delete = "DELETE FROM Message WHERE where ID = '$messageID'";
            mysqli_query($conn, $query_delete);   
        }*/
    ?>
    <div class = "admin-main">
        <a href = "logout.php"><button class = "log-out">Log Out</button></a>
        <div class = "receive-textarea">
            <p class = "input-field1">From <?php if($flag == 1){echo $senderid;}?> to <?php if($flag == 1){echo $receiverid;}?></p>
            <p class = "input-field2"><?php if($flag == 1){echo $title;}?></p>
            <p class = "input-field3"><?php if($flag == 1){echo $message;}?></p>
            <a href = "admin.php"><button class = "button1" onclick = "nextMessage()">Next Message</button></a>
            <form action = "<?php echo $fileName ?>" method = "post">
                <input type = "hidden" name = "mark">
                <input type = "submit" class = "button2" value = "Mark">
            </form>
            <form action = "<?php echo $fileName ?>" method = "post">
                <input type = "hidden" name = "delete">
                <input type = "submit" class = "button3" value = "Delete">
            </form>
        </div>
    </div>
</body>
</html>