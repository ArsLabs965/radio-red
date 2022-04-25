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
    <title></title>
</head>
<body>
   
        <div id="center">
        <div id="bgr">
        <a style="color: Red;" href="index.php">На главную</a><br>
        </div>
        
        <?php
           $connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
           $logget = mysqli_query($connection, "SELECT * FROM `posts`  WHERE `id` = '$_GET[post]'");
           if(($ac = mysqli_fetch_assoc($logget))){
               echo '<div id="in">';
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
            echo $ac[text];
            if($ac[edit]){
                echo '<br>';
                echo '<a style="color: Grey;">(Изменено)</a>';
                }
            
            if($_SESSION[user] != NULL){
                if($_SESSION[user] == $ac[login]){
                    echo '<hr>Понравилось <a style="color: Red;">';
                echo $ac[likes];
                echo '</a> людям</div>';
                }else{
                echo '<hr><div onclick="likes(' . $_GET[post] . ');">';
            $loggett = mysqli_query($connection, "SELECT * FROM `likes`  WHERE `login` = '$_SESSION[user]' AND `post` = $_GET[post]");
            if(($acca = mysqli_fetch_assoc($loggett))){
                echo '<a id="f' . $_GET[post] . '" ><img src="img/likefull.png" width="20px"></a>';
            }else{
                echo '<a id="f' . $_GET[post] . '"><img src="img/like.png" width="20px"></a>';
            }
            echo $ac[likes];
            echo '</div>';
            ?>
                 <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
   <script>

var likeid;
    
    function likes(likeid) {
        
       
        
            
     
       
        
        $.ajax({
      method: "GET",
      url: "like.php",
      dataType: "text",
      data: {
            who: likeid
      },
      success: function(data){  
         
       if(data == '1'){
        $( "#f" + likeid ).html('<img src="img/likefull.png" width="20px">');
       }else{
        $( "#f" + likeid ).html('<img src="img/like.png" width="20px">');
       }
	}
    
    });
    
}
   </script>
            <?php
            }
        }else{
            echo '<hr>Понравилось <a style="color: Red;">';
            echo $ac[likes];
            echo '</a> людям</div>';
        }
            echo '</div>';
            if($_SESSION[user] == $ac[login]){
                if($_GET[whatdo] == 'remove'){
                    $connection = mysqli_connect('127.0.0.1', 'root', 'root', 'radio');
                    mysqli_query($connection, "DELETE FROM `posts` WHERE `id` = '$ac[id]'"); 
                    echo '<div id="center"><h1>Запись удалена!</h1></div>';
                   
                }
                if($_GET[whatdo] == 'edit'){
                    if(isset($_POST[postsend])){
                        $connection = mysqli_connect('127.0.0.1', 'root', 'root', 'radio');
                        mysqli_query($connection, "UPDATE `posts` SET `text` = '$_POST[post]' WHERE `posts`.`id` = '$ac[id]'"); 
                        mysqli_query($connection, "UPDATE `posts` SET `edit` = '1' WHERE `posts`.`id` = '$ac[id]'"); 
                        echo '<META HTTP-EQUIV="REFRESH" content="0; URL=http://radio-red.ru/post.php?&post=' . $ac[id] . '&whatdo=edit">';
                    }
                    ?>
                    <br><div id="center"><div id="in">
                        <form action="" method="POST">
<h2>Изменить Запись</h2>
<a style="color: Grey;">Измините запись</a><br><br>
<textarea id="in" style="width: 90%; height: 100px;" type="text" name="post" placeholder="Напишите, что у вас нового!"><?php echo $ac[text]; ?></textarea><br><br>
    <input id="in" type="submit" name="postsend" value="Опубликовать!">
</form>
</div></div>
                    <?php
                }
           }
           }
           
        ?>
  
    </div>
   
</body>
</html>