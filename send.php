<?php
     $connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
     $wall = mysqli_query($connection, "SELECT * FROM `moder` WHERE `radio` = $_GET[radio] AND `checked` = 1");
     if(($walluse = mysqli_fetch_assoc($wall))){
        if($_GET[password] == $walluse[password]){
            if($_GET[remove] == 1){
                mysqli_query($connection, "DELETE FROM `msg` WHERE `radio` = $_GET[radio]");
            }
            $tt = time();
            mysqli_query($connection, "INSERT INTO `msg` (`msg`, `who`, `time`, `radio`) VALUES ('$_GET[msg]', '$_GET[who]', '$tt', '$_GET[radio]')");
            echo "done";
        }
     }
    
     mysqli_close($connection);
   
?>