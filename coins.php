<?php
session_start();
$connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
$bane = mysqli_query($connection, "SELECT * FROM `ban` WHERE `login` = '$_SESSION[user]'");
if(($ban = mysqli_fetch_assoc($bane))){
    $_SESSION[bann] = $_SESSION[user];
    $_SESSION[user] = NULL;
    echo '<META HTTP-EQUIV="REFRESH" content="0; URL=http://radio-red.ru/ban.php">';
}
if($_SESSION[user] == NULL){
echo '<META HTTP-EQUIV="REFRESH" content="0; URL=http://radio-red.ru">';
}
if(isset($_POST[send])){
  $val = preg_replace('/[^0-9]/', '', $_POST[mon]);
  if($val > 0){
    if(isset($_POST[who])){
      $connection = mysqli_connect('127.0.0.1', 'root', 'root', 'radio');
      $logget = mysqli_query($connection, "SELECT * FROM `accaunts`  WHERE `login` = '$_SESSION[user]'");
      $acc = mysqli_fetch_assoc($logget);
      if($acc[coins] - $val >= 0){
      $tc = $acc[coins] - $val;
      mysqli_query($connection, "UPDATE `accaunts` SET `coins` = '$tc' WHERE `accaunts`.`login` = '$_SESSION[user]'");

      $logget = mysqli_query($connection, "SELECT * FROM `accaunts`  WHERE `login` = '$_POST[who]'");
      $acc = mysqli_fetch_assoc($logget);
      $tc = $acc[coins] + $val;
      mysqli_query($connection, "UPDATE `accaunts` SET `coins` = '$tc' WHERE `accaunts`.`login` = '$_POST[who]'");

      mysqli_query($connection, "INSERT INTO `coinsto` (`loginfrom`, `loginto`, `coins`, `text`) VALUES ('$_SESSION[user]', '$_POST[who]', '$val', '$_POST[txt]')");
      echo '<p id="center" style="color: Green; background-color: White;">Отправлено ' . $val . ' коинов пользователю "' . $_POST[who] . '"</p>';
      }else{
        echo '<p id="center" style="color: Red; background-color: White;">Форма неверно заполнена!</p>';
      }
    }else{
      echo '<p id="center" style="color: Red; background-color: White;">Форма неверно заполнена!</p>';
    }
  }else{
    echo '<p id="center" style="color: Red; background-color: White;">Форма неверно заполнена!</p>';
  }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Коины</title>
</head>
<body>

       <div id="center">
            <div id="bgr">
            <a style="color: White;" href="http://radio-red.ru/accaunt.php?&acc=<?php echo $_SESSION[user]; ?>">Назад</a>
            </div>
            <div id="bgr">
            <?php
                $connection = mysqli_connect('127.0.0.1', 'root', 'root', 'radio');
                $logget = mysqli_query($connection, "SELECT * FROM `accaunts`  WHERE `login` = '$_SESSION[user]'");
                $acc = mysqli_fetch_assoc($logget);
                   
                    $to = $acc[coins];
                  
               
            ?>
            <h1>У вас <a id="coins" style="color: Red;"><?php echo $to; ?></a> коинов!</h1>
            </div>
            <div id="bgr">
                <img src="img/btn.png" onclick="cl();" width="200" alt="">
            </div>
            <div id="bgr">
                <h2>Отправить:</h2>
                <form action="" method="POST">
                <input id="in" type="text" name="mon" placeholder="Сколько">
                <input id="in" type="text" name="txt" placeholder="Сообщение">
         <div>
         <h2>Кому:</h2>
         <?php
            $wall = mysqli_query($connection, "SELECT * FROM `friends` WHERE `login` = '$_SESSION[user]' ORDER BY `id` DESC");
            while(($walluse = mysqli_fetch_assoc($wall))){
              
           
         ?>
         <p><input name="who" type="radio" value="<?php echo $walluse[friend]; ?>"><?php echo $walluse[friend]; ?></p>
         <?php
            }
         ?>
       
        </div>
        <p><input id="in" type="submit" name="send" value="Отправить"></p>
         </form>
            </div>
            <div id="bgr">
            <h2>история</h2>
            <h4>показываеются последние 100</h4>
            </div>
              <?php
                 $wall = mysqli_query($connection, "SELECT * FROM `coinsto` WHERE `loginfrom` = '$_SESSION[user]' OR `loginto` = '$_SESSION[user]' ORDER BY `id` DESC LIMIT 100");
                 while(($walluse = mysqli_fetch_assoc($wall))){
                   echo '<div id="bgr">';
                   if($walluse[loginfrom] == $_SESSION[user]){
                     echo '<a href="http://radio-red.ru/accaunt.php?&acc=' . $walluse[loginto] . '" style="color: White;">' . $walluse[loginto] . '</a>';
                    ?>
                    <br>
                    <a style="color: Red;">-<?php echo $walluse[coins]; ?></a><br>
                    <?php echo $walluse[text]; ?><br>
                    <a style="color: Grey;"><?php echo $walluse[time]; ?></a><br>
                   
                    <?php
                   }else{
                    echo '<a href="http://radio-red.ru/accaunt.php?&acc=' . $walluse[loginfrom] . '" style="color: White;">' . $walluse[loginfrom] . '</a>';
                    
                    ?>
                    <br>
                    <a style="color: Green;">+<?php echo $walluse[coins]; ?></a><br>
                    <?php echo $walluse[text]; ?><br>
                    <a style="color: Grey;"><?php echo $walluse[time]; ?></a><br>
                    
                    <?php
                   }
                   echo '</div>';
                 }
              ?>
            
       </div>
       <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
  <script>
  function cl(){
    $.ajax({
      method: "GET",
      url: "coinslogic.php",
      dataType: "text",
      data: {},
      success: function(data){  
         
        $( "#coins" ).html(data);
	}
    
    });
  }
  function ini(){
      $.ajax({
      method: "GET",
      url: "chinv.php",
      dataType: "text",
      data: {},
      success: function(data){  
        $( "#js" ).html(data);
       
	}
    
    });
      setTimeout(ini, 100);
    }
    ini();
  </script>
  <div id="js"></div>
</body>
</html>