<?php
session_start();
$connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
$bane = mysqli_query($connection, "SELECT * FROM `ban` WHERE `login` = '$_SESSION[user]'");
if(($ban = mysqli_fetch_assoc($bane))){
    $_SESSION[bann] = $_SESSION[user];
    $_SESSION[user] = NULL;
    echo '<META HTTP-EQUIV="REFRESH" content="0; URL=http://radio-red.ru/ban.php">';
}
$_SESSION[lists] = NULL;

$connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
if(isset($_GET[serchbtn])){
  echo '<META HTTP-EQUIV="REFRESH" content="0; URL=http://radio-red.ru/serch.php?serch=' . $_GET[serch] . '">';
}
if(isset($_POST[out])){
  $_SESSION[user] = NULL;
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="ico.png" type="image/x-icon">
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio Red</title>
    <script charset="UTF-8" src="//web.webpushs.com/js/push/e2d9123139f14ca824e83b583ec63f8f_0.js" async></script>
</head>
<body>
<!-- RotaBan.ru Ad Code -->
<script type="text/javascript">
(function(){
    var rb = document.createElement('script');
        d = new Date();
    d.setHours(0);
    d.setMinutes(0);
    d.setSeconds(0);
    d.setMilliseconds(0);
    rb.type = 'text/javascript';
    rb.async = true;
    rb.src = '//s1.rotaban.ru/rotaban.js?v=' + d.getTime();
    (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(rb);
})();
</script>
<!-- END RotaBan.ru Ad Code -->


<div id="center">
<div id="bgr">
    <h1 id="logo">Radio <a id="red">Red</a></h1></div><?php
    if($_SESSION[tutor] == NULL AND $_SESSION[user] == NULL){
  $_SESSION[tutor] = 1;
  ?>
    <div id="bgr">
    <h1>В первый раз здесь? <a style="color: Red;" href="tutor.php">Инструкции</a></h1>
    </div>
  <?php
}
?>
    <div id="bgr">
    С нами <?php
    $wallcolvo = mysqli_query($connection, "SELECT COUNT(`id`) AS `colvo` FROM `accaunts` WHERE NOT `login` in (SELECT `login` FROM `ban`)");
    $colvoclean = mysqli_fetch_assoc($wallcolvo);
      // $walluse = mysqli_fetch_assoc($wall);
      echo '<a style="color: Red;">';
          echo $colvoclean[colvo];
          echo '</a>';
    ?> пользователей!
    </div>
    


<div class="parent">
<div class="u1" id="bgr">
<h2>Поиск</h2>
    <form action="" method="GET">
        <input id="in" type="text" name="serch"><br><br>
        <input id="in" type="submit" name="serchbtn" value="Искать">
    </form>
    <br>
    </div>
    <div class="u2" id="bgr">
        <h2>Интересное:</h2>
        <a style="color: Grey;">Случайные радиостанции и посты</a>
        <h1 id="interesting"></h1>
    </div>
    <div class="u3" id="bgr">
      <?php
        if($_SESSION[user] == NULL){
          ?>
<h2>Войдите</h2>
<form action="" method="POST">
<?php
if($_SESSION[user] == NULL){
  if(isset($_POST[in])){
    if($_POST[login] != '' AND $_POST[pass] != ''){
        
        $connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
        $logget = mysqli_query($connection, "SELECT * FROM `accaunts`  WHERE `login` = '$_POST[login]'");
        if(($acc = mysqli_fetch_assoc($logget))){
            if($acc[password] == $_POST[pass]){
                echo '<div id="green">Здравствуйте, ' . $acc[login] . '!</div><br>';
                $str = preg_replace('/\s+/', '', $_POST[login]);
                $_SESSION[user] = $str;
                $_SESSION[lastacc] = $str;
                echo '<META HTTP-EQUIV="REFRESH" content="2; URL=http://radio-red.ru">';
               
                }else{
                    echo '<div id="error">Пароль не верный!</div><br>';
                }
        }else{
            
            echo '<div id="error">Такого логина нет!</div><br>';
           
        }
        
}else{
    echo '<div id="error">Заполните поля!</div><br>';
}
}
}
?>
<input type="text" name="login" placeholder="Логин" id="in" value="<?php echo $_POST[login]; ?>"><br><br>
            <input type="password" name="pass" placeholder="Пароль" id="in" value=""><br><br>
            <input id="in" type="submit" name="in" value="Войти"><br><br>
            <a id="in" href="reg.php">Регистрация</a><br><br>
</form>
          <?php
        }else{
          ?>
            <form action="" method="POST">
            <h2><a style="color: White;" href="http://radio-red.ru/accaunt.php?&acc=<?php echo $_SESSION[user]; ?>">Ваша страница</a></h2>
            <a style="color: Grey;">Заполните информацию о себе</a>
            <h2><a style="color: White;" href="http://radio-red.ru/lenta.php">Ваша лента</a></h2>
            <a style="color: Grey;">Последние новости ваших друзей</a><br><br>
                <input type="submit" name="out" id="in" value="Выйти из аккаунта <?php echo $_SESSION[user]; ?>">
                <br><br><br>
            </form>
          <?php
        }
      ?>
        
        
    </div>
   

    <div id="faq">
   
    <div id="bgr">
      <a href="newdns.php"><img width="25px" src="img/dns.png" alt=""></a><a href="privat.php"><img width="25px"  src="img/block.png" alt=""></a><?php


if($_SESSION[user] == "AL9"){
?><a href="moder.php"><img width="25px"  src="img/admin.png" alt=""></a>
<?php
}
?>
    </div>
    <div id="bgr" class="ad">
     <!-- RotaBan.ru Zone Code -->
<div id="rotaban_261832" class="rbrocks rotaban_61b18e45df5d4c6fa61cb7fbebbea24f"></div>
<!-- END RotaBan.ru Zone Code -->
    </div>
    <div  id="bgr" class="adm">
      <!-- RotaBan.ru Zone Code -->
<div id="rotaban_261833" class="rbrocks rotaban_61b18e45df5d4c6fa61cb7fbebbea24f"></div>
<!-- END RotaBan.ru Zone Code -->
    </div>
      <div id="bgr">
      
      <a style="color: White;" href="tutor.php">Инструкции</a><br><br>Radio Red 2021 - <?php echo date("Y"); ?><br>Савенков Арсений
      </div>
    </div>
    </div>
    </div>
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script>
    var cou = 0;
    function show(){
  if(cou == 0){
         $.ajax({
      method: "POST",
      url: "interesting.php",
      dataType: "text",
      data: {},
      success: function(data){  
         
        $( "#interesting" ).html(data);
	}
    
    });
  }
  if(cou < 100){
  $( "#interesting" ).css("opacity", cou / 100);
  }
  if(cou > 1900){
  $( "#interesting" ).css("opacity", (2000 - cou) / 100 );
  }
  cou++;
  if(cou > 2000){
    cou = 0;
  }
    setTimeout(show, 1);
    }
    show();
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
<p id="js"></p>


</body>
</html>