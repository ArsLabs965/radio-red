<?php
session_start();
?>
<a href="index.php">Назад</a><br>
<?php

if($_SESSION[user] == "AL9"){
























    $connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');


if(isset($_POST[send])){
    if($_POST[val]){
        //UPDATE `msg` SET `msg` = 'testt' WHERE `msg`.`id` = 1;
        mysqli_query($connection, "UPDATE `moder` SET `checked` = '1' WHERE `radio` = $_POST[radio]");
    }else{
        mysqli_query($connection, "DELETE FROM `moder` WHERE `radio` = $_POST[radio]");
    }
}






    
        
         $wall = mysqli_query($connection, "SELECT * FROM `moder` WHERE `checked` = '0'");
         while(($walluse = mysqli_fetch_assoc($wall))){
            ?>
                <div>
                   
                    <?php
                       echo $walluse[radio];
                    ?>
                </div>
            <?php
         }
         
         mysqli_close($connection);
   







?>
         <form action="" method="POST"><br><br>
         <input type="text" name="val" placeholder="1 - YES 0 - NO">
             <input type="text" name="radio" placeholder="radio">
             <input id="in" type="submit" name="send" value="Отправить">
         </form>
<?php






















}
?>
