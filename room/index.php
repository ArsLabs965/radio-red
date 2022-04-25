<?php
session_start();
if(isset($_POST[go])){
if($_POST[login] == "password"){
$_SESSION[user] = "admin";
}
}
if($_SESSION[user] == "admin"){
    if(isset($_POST[out])){
        $_SESSION[user] = NULL;
    }
    $connection = mysqli_connect('127.0.0.1', 'root', 'root', 'room');
    if(isset($_POST[close])){
        mysqli_query($connection, "UPDATE `last` SET `type` = 'close'"); 
    }
    if(isset($_POST[open])){
        mysqli_query($connection, "UPDATE `last` SET `type` = 'open'"); 
    }
    if(isset($_POST[on])){
        mysqli_query($connection, "UPDATE `last` SET `type` = 'on'"); 
    }
    if(isset($_POST[off])){
        mysqli_query($connection, "UPDATE `last` SET `type` = 'off'"); 
    }
    mysqli_close($connection);
    ?>

    <form action="" method="POST">
 
    
  
        <input type="submit" name="close" value="Закрыть">
        <input type="submit" name="open" value="Открыть">
        <input type="submit" name="on" value="Включить">
        <input type="submit" name="off" value="Выключить"><br><br>
        <input type="submit" name="out" value="Выйти">
    </form>
    <?php
}else{
    ?>

    <form action="" method="POST">
    
    <input type="password" name="login" placeholder="Пароль"><br><br>
    
        <input type="submit" name="go" value="войти">
       
    </form>
    <?php
}
?>

