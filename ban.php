<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<link rel="shortcut icon" href="ico.png" type="image/x-icon">
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>БАН</title>
</head>
<body>
   
        <div id="center">
        <div id="bgr">
        <a style="color: Red;" href="index.php">На главную</a><br>
        </div>
        
    <?php
$connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
$wall = mysqli_query($connection, "SELECT * FROM `ban` WHERE `login` = '$_SESSION[bann]'");
if(($ban = mysqli_fetch_assoc($wall))){
    ?>
        <div id="bgr">
            <h1>ОБА! А ТУТ БАН!</h1>
            Причина:<br><br>
            <?php echo $ban[why]; ?>
        </div>
        
    <?php
}
    ?>
         
    </div>
   
</body>
</html>