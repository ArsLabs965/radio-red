<?php
session_start();
if($_SESSION[user] != null){
   $connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio'); 
   $logget = mysqli_query($connection, "SELECT * FROM `likes`  WHERE `login` = '$_SESSION[user]' AND `post` = '$_GET[who]'");
   if(($acc = mysqli_fetch_assoc($logget))){
    echo 0;
    mysqli_query($connection, "DELETE FROM `likes` WHERE `post` = '$_GET[who]' AND `login` = '$_SESSION[user]'");
    $loggets = mysqli_query($connection, "SELECT * FROM `posts` WHERE `id` = '$_GET[who]'");
    $acca = mysqli_fetch_assoc($loggets);
    $li = $acca[likes] - 1;
    mysqli_query($connection, "UPDATE `posts` SET `likes` = '$li' WHERE `posts`.`id` = '$_GET[who]'");
   }else{
    echo 1;
    mysqli_query($connection, "INSERT INTO `likes` (`login`, `post`) VALUES ('$_SESSION[user]', '$_GET[who]')");
    $loggets = mysqli_query($connection, "SELECT * FROM `posts`  WHERE `id` = '$_GET[who]'");
    $acca = mysqli_fetch_assoc($loggets);
    $li = $acca[likes] + 1;
    mysqli_query($connection, "UPDATE `posts` SET `likes` = '$li' WHERE `posts`.`id` = '$_GET[who]'");
   }
}
?>