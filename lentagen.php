<?php
session_start();
 $connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
     $logget = mysqli_query($connection, "SELECT * FROM `posts` WHERE `login` in (SELECT `friend` FROM `friends` WHERE `login` = '$_SESSION[user]') ORDER BY `time` DESC LIMIT " . $_GET[btn] * 10 . ", 10");
     $colvo = 0;
     if($_GET[btn] == 0){
     ?>
    <br>
     <div id="in">
         <!-- RotaBan.ru Zone Code -->
<div id="rotaban_261834" class="rbrocks rotaban_61b18e45df5d4c6fa61cb7fbebbea24f"></div>
<!-- END RotaBan.ru Zone Code -->
</div>
     <?php
     }
     while(($acc = mysqli_fetch_assoc($logget))){
        
           
         
         if(rand(0, 10) == 0){
            $logg = mysqli_query($connection, "SELECT * FROM `posts` WHERE NOT `login` in (SELECT `friend` FROM `friends` WHERE `login` = '$_SESSION[user]') AND `login` != '$_SESSION[user]' ORDER BY RAND() LIMIT 1");
            if(($ac = mysqli_fetch_assoc($logg))){
               
                echo '<br><div id="in"><h2 style="color: Green;">Это может быть интересно!</h2>';
                $wa = mysqli_query($connection, "SELECT * FROM `accaunts` WHERE `login` = '$ac[login]'");
                $aca = mysqli_fetch_assoc($wa);
                if($aca[ava] != NULL){
                    $show_img = base64_encode($aca[ava]);
                       
                        
                    echo '<img src="data:image/jpeg;base64, '. $show_img .'" alt="Изображение не добавлено"  width="40px">';
                    
                    }
                echo ' <a href="http://radio-red.ru/accaunt.php?acc=' . $ac[login] . '" style="color: Red;">';
                echo '';
                echo $ac[login];
                echo '</a> | ';
                list($date, $time) = explode(' ', $ac[time]);
                list($year, $month, $day) = explode('-', $date);
                list($hour, $minute, $second) = explode(':', $time);
                $mo = '';
                        if($month == '01'){
                            $mo = 'Января';
                        }
                        if($month == '02'){
                            $mo = 'Февраля';
                        }
                        if($month == '03'){
                            $mo = 'Марта';
                        }
                        if($month == '04'){
                            $mo = 'Апреля';
                        }
                        if($month == '05'){
                            $mo = 'Мая';
                        }
                        if($month == '06'){
                            $mo = 'Июня';
                        }
                        if($month == '07'){
                            $mo = 'Июля';
                        }
                        if($month == '08'){
                            $mo = 'Августа';
                        }
                        if($month == '09'){
                            $mo = 'Сентября';
                        }
                        if($month == '10'){
                            $mo = 'Октября';
                        }
                        if($month == '11'){
                            $mo = 'Ноября';
                        }
                        if($month == '12'){
                            $mo = 'Декабря';
                        }
                if($year == date('Y')){
                    if($month == date('m')){
                        if($day == date('d')){
                            if($hour == date('H')){
                                if($minute == date('i')){
                                    if($second + 20 > date('s')){
                                        echo 'Прямо сейчас!';
                                    }else{
                                        echo date('s') - $second . ' секунд назад';
                                    }
                                }else{
                                    echo date('i') - $minute . ' минут назад';
                                }
                            }else{
                                echo 'Сегодня в ' . $hour . ':' . $minute;
                            }
                        }else{
                            echo $day . ' числа в ' . $hour . ':' . $minute;
                        }
                       
                    }else{
                        echo $day . ' ' . $mo . ' в ' . $hour . ':' . $minute;
                    }
                   
                }else{
                    echo $year . ' год, ' . $day . ' ' . $mo . ' в ' . $hour . ':' . $minute;
                }

                echo '<hr>';
                if($ac[img] != NULL){
                    $show_img = base64_encode($ac[img]);
                       
                        
                    echo '<br><img src="data:image/jpeg;base64, '. $show_img .'" alt="Изображение не добавлено"  width="50%">';
                    echo "<br><br>";
                    }
                    echo nl2br($ac[text]);
                if($ac[edit]){
                    echo '<br>';
                    echo '<a style="color: Grey;">(Изменено)</a>';
                    }
                
                if($_SESSION[user] != NULL){
                    echo '<hr><div onclick="likes(' . $acc[id] . ');">';
                $loggett = mysqli_query($connection, "SELECT * FROM `likes`  WHERE `login` = '$_SESSION[user]' AND `post` = $acc[id]");
                if(($acca = mysqli_fetch_assoc($loggett))){
                    echo '<a id="f' . $acc[id] . '" ><img src="img/likefull.png" width="20px"></a>';
                }else{
                    echo '<a id="f' . $acc[id] . '"><img src="img/like.png" width="20px"></a>';
                }
                echo $acc[likes];
                echo '</div>';
                }
                echo '</div>';
            }
        }
         $colvo++;
        echo '<br><div id="in">';
        $wa = mysqli_query($connection, "SELECT * FROM `accaunts` WHERE `login` = '$acc[login]'");
        $ac = mysqli_fetch_assoc($wa);
        if($ac[ava] != NULL){
            $show_img = base64_encode($ac[ava]);
               
                
            echo '<img src="data:image/jpeg;base64, '. $show_img .'" alt="Изображение не добавлено"  width="40px">';
            
            }
        echo ' <a href="http://radio-red.ru/accaunt.php?acc=' . $acc[login] . '" style="color: Red;">';
                echo $acc[login];
                if($ac[v])
            echo '<img src="img/v.png" alt="Изображение не добавлено"  width="20px">';
                echo '</a> | ';
                list($date, $time) = explode(' ', $acc[time]);
                list($year, $month, $day) = explode('-', $date);
                list($hour, $minute, $second) = explode(':', $time);
                $mo = '';
                        if($month == '01'){
                            $mo = 'Января';
                        }
                        if($month == '02'){
                            $mo = 'Февраля';
                        }
                        if($month == '03'){
                            $mo = 'Марта';
                        }
                        if($month == '04'){
                            $mo = 'Апреля';
                        }
                        if($month == '05'){
                            $mo = 'Мая';
                        }
                        if($month == '06'){
                            $mo = 'Июня';
                        }
                        if($month == '07'){
                            $mo = 'Июля';
                        }
                        if($month == '08'){
                            $mo = 'Августа';
                        }
                        if($month == '09'){
                            $mo = 'Сентября';
                        }
                        if($month == '10'){
                            $mo = 'Октября';
                        }
                        if($month == '11'){
                            $mo = 'Ноября';
                        }
                        if($month == '12'){
                            $mo = 'Декабря';
                        }
                if($year == date('Y')){
                    if($month == date('m')){
                        if($day == date('d')){
                            if($hour == date('H')){
                                if($minute == date('i')){
                                    if($second + 20 > date('s')){
                                        echo 'Прямо сейчас!';
                                    }else{
                                        echo date('s') - $second . ' секунд назад';
                                    }
                                }else{
                                    echo date('i') - $minute . ' минут назад';
                                }
                            }else{
                                echo 'Сегодня в ' . $hour . ':' . $minute;
                            }
                        }else if($day + 1 == date('d')){
                            echo 'Вчера в ' . $hour . ':' . $minute;
                        }else{
                            echo $day . ' числа в ' . $hour . ':' . $minute;
                        }
                       
                    }else{
                        echo $day . ' ' . $mo . ' в ' . $hour . ':' . $minute;
                    }
                   
                }else{
                    echo $year . ' год, ' . $day . ' ' . $mo . ' в ' . $hour . ':' . $minute;
                }

                echo '<hr>';
                if($acc[img] != NULL){
                    $show_img = base64_encode($acc[img]);
                       
                        
                    echo '<br><img src="data:image/jpeg;base64, '. $show_img .'" alt="Изображение не добавлено"  width="50%">';
                    echo "<br><br>";
                    }
                echo nl2br($acc[text]);
                if($acc[edit]){
                    echo '<br>';
                    echo '<a style="color: Grey;">(Изменено)</a>';
                    }
                
                if($_SESSION[user] != NULL){
                    echo '<hr><div onclick="likes(' . $acc[id] . ');">';
                $loggett = mysqli_query($connection, "SELECT * FROM `likes`  WHERE `login` = '$_SESSION[user]' AND `post` = $acc[id]");
                if(($acca = mysqli_fetch_assoc($loggett))){
                    echo '<a id="f' . $acc[id] . '" ><img src="img/likefull.png" width="20px"></a>';
                }else{
                    echo '<a id="f' . $acc[id] . '"><img src="img/like.png" width="20px"></a>';
                }
                echo $acc[likes];
                echo '</div>';
                }
                echo '</div>';
     }
     if($colvo == 0 AND $_GET[btn] == 0){
        ?><br><br><br>
            <div id="bgr">
                <h1>Эй! У тебя совсем нет друзей :( Посмоти здесь: <a style="color: Red;" href="people.php">Все люди</a></h1>
            </div>
            <br><br><br><?php
     }else
     if($colvo < 10){
        ?><br><br><br>
            <div id="bgr">
                <h1>Ну! На этом всё!</h1>
                <a style="color: White;" href="index.php">На главную</a>
            </div>
            <br><br><br><?php
     }
     
?>
<?php
if($colvo > 9){
?>
<div id="news<?php echo $_GET[btn] + 1; ?>">
<br><br>
<input onclick="more()" type="submit" id="in" value="Загрузить ещё!"><br><br>
<a style="color: White;" href="index.php">На главную</a>

</div>
<?php
}
?>