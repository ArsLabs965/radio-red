<?php
session_start();
     $connection = mysqli_connect('127.0.0.1', 'root', 'database0422!', 'radio');n = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');n = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');n = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
     $to = time() - 30;
     $wall = mysqli_query($connection, "SELECT * FROM `msg` WHERE `radio` = '$_SESSION[rd]' ORDER BY `id` DESC");
     $c = 0;
     while(($walluse = mysqli_fetch_assoc($wall))){
         $c++;
         if($to < $walluse[time]){
        ?>
            <div id="bgr">
                <a href="http://radio-red.ru/accaunt.php?&acc=<?php echo $walluse[who]; ?>" style="color: red;"><?php echo $walluse[who]; ?></a> <img src="loa.gif" width="20px" alt=""><?php echo (time() - 30 - $walluse[time]) * -1; ?>
                <?php
                if($walluse[img] != NULL){
                 $show_img = base64_encode($walluse[img]);
                   
                    
                 echo '<br><img src="data:image/jpeg;base64, '. $show_img .'" alt="Изображение не добавлено"  width="25%">';
                 echo "<br>";
                }
                echo "<br>";
                    echo $walluse[msg];
                ?>
            </div>
        <?php
         }else{
            mysqli_query($connection, "DELETE FROM `msg` WHERE `id` = '$walluse[id]'");
         }
     }
     if($c == 0){
        ?>
<div id="bgr">
               <h2>Тут пусто :(</h2>
            </div>
        <?php
     }
     mysqli_close($connection);
?>