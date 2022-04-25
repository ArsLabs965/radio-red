<?php
session_start();
$connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
$bane = mysqli_query($connection, "SELECT * FROM `ban` WHERE `login` = '$_SESSION[user]'");
if(($ban = mysqli_fetch_assoc($bane))){
    $_SESSION[bann] = $_SESSION[user];
    $_SESSION[user] = NULL;
    echo '<META HTTP-EQUIV="REFRESH" content="0; URL=http://radio-red.ru/ban.php">';
}
if($_GET[radio] < 1){
    echo '<META HTTP-EQUIV="REFRESH" content="0; URL=http://radio-red.ru/index.php">';
}
if($_GET[radio] > 99999999999){
    echo '<META HTTP-EQUIV="REFRESH" content="0; URL=http://radio-red.ru/index.php">';
}
$_SESSION[rd] = $_GET[radio];
if(isset($_POST[btn]) AND isset($_POST[login])){
    $_SESSION[user] = $_POST[login];
}

$connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
$wall = mysqli_query($connection, "SELECT * FROM `moder` WHERE `radio` = '$_GET[radio]' AND `checked` = 1");
    if(($walluse = mysqli_fetch_assoc($wall))){
        
    }else{

if(isset($_POST[send])){
    if(empty($_FILES['img']['tmp_name']) AND $_POST[txt] == NULL){

    }else{
    $connection = mysqli_connect('127.0.0.1', 'root', 'root', 'radio');
    $tt = time();
    $img = NULL;
            if(!empty($_FILES['img']['tmp_name'])){
                $img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
            }
    mysqli_query($connection, "INSERT INTO `msg` (`msg`, `who`, `time`, `radio`, `img`) VALUES ('$_POST[txt]', '$_SESSION[user]', '$tt', '$_GET[radio]', '$img')");
    mysqli_close($connection);
        }
}
    }
   
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<link rel="shortcut icon" href="ico.png" type="image/x-icon">
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio Red</title>
</head>
<body>
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<div id="center">
<div id="bgr">
<a style="color: White;" href="index.php">На главную</a><br>
    <h1>Радиостанция: <a id="red"><?php echo $_GET[radio] ?></a></h1>
    
    
   
    </div>
    <div id="con">
    
    </div>
    <?php
if($_SESSION[user] != NULL){
    ?>
    <div id="bgr">
    <a style="color: Grey;">Нажмите на '+' чтобы раздвинуть список</a><br>
    Пригласить  <a onclick="cht();" style="color: Red; cursor: pointer;">+</a>
    <div id="inv">
    </div>
    </div>
    <?php
}
    ?>
    
   
    <script>
     function con(){
        $.ajax({
      method: "GET",
      url: "connected.php",
      dataType: "text",
      data: {
          radio: "<?php echo $_GET[radio]; ?>"
      },
      success: function(data){  
        
        $( "#con" ).html(data);
        
	}
    
    });
        setTimeout(con, 1000);
     }
     con();
     </script>
    <div id="desk">
    <div id="bgr">
    
        <?php
        $_SESSION[radio_l] = $_GET[radio];
        $connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
        $wall = mysqli_query($connection, "SELECT * FROM `moder` WHERE `radio` = '$_GET[radio]' AND `checked` = 1");
            if(($walluse = mysqli_fetch_assoc($wall))){
                echo '<a style="color: Grey;">На этой радиостанции нельзя писать</a>';
            }else{
            if($_SESSION[user] != NULL){
               
                
                ?>
   
    <form action="" method="POST" enctype="multipart/form-data"><br>
    <a style="color: Grey;">Прикрепить картику</a><br>
    <input id="in" type="file" name="img" style="font-size: 10px;"><br><br>
        <input autofocus placeholder="От лица <?php echo $_SESSION[user]; ?>" type="text" name="txt" id="in" cols="30" rows="10">
        <input id="in" type="submit" name="send" value="Отправить">
    </form>
                <?php
            }else{
                ?>
                    <h3>Вы не вошли в аккаунт!</h3>
                    
                <?php
            }
            }
        ?>
    </div>
   
   
    
    <script>
    
    function show(){
        if($('#mob').css('display') == 'none'){
        $.ajax({
      method: "POST",
      url: "new.php",
      dataType: "text",
      data: {
          radio: "<?php echo $_GET[radio]; ?>"
      },
      success: function(data){  
        
        $( "#content" ).html(data);
        $( "#contentm" ).html("");
	}
    
    });
}
    setTimeout(show, 1000);
    
    }
    show();
    </script>
    <div id="content">
    <h2 style="color: Red;">Ловим станцию</h2><img src="loading.gif" alt="" width="50px">
    </div>
    </div>
    
    <div id="mob">
    <hr>
    <div id="contentm" style="overflow: scroll; height: 200px;">
    <h2 style="color: Red;">Ловим станцию</h2><img src="loading.gif" width="50px" alt="">
    </div>
    <hr>
    <div id="bgr">
        <?php
        $connection = mysqli_connect('127.0.0.1', 'root', 'root', 'radio');
        $wall = mysqli_query($connection, "SELECT * FROM `moder` WHERE `radio` = '$_GET[radio]' AND `checked` = 1");
            if(($walluse = mysqli_fetch_assoc($wall))){
                
            }else{
            if($_SESSION[user] != NULL){
              
                ?>
    
                     
    <form action="" method="POST" enctype="multipart/form-data"><br>
    <a style="color: Grey;">Прикрепить картинку</a><br>
    <input id="in" type="file" name="img" style="font-size: 10px;"><br><br>
        <input autofocus placeholder="От лица <?php echo $_SESSION[user]; ?>" type="text" name="txt" id="in" cols="30" rows="10">
        <input id="in" type="submit" name="send" value="Отправить">
    </form>
                <?php
            }else{
                ?>
                    <h3>Вы не вошли в аккаунт!</h3>

                <?php
            }
            }
        ?>
    </div>
   
    
    
    
    <script>
    
    function showm(){
        if($('#mob').css('display') == 'block'){
        $.ajax({
      method: "POST",
      url: "newm.php",
      dataType: "text",
      data: {
          radio: "<?php echo $_GET[radio]; ?>"
      },
      success: function(datam){  
        
        $( "#contentm" ).html(datam);
        $( "#content" ).html("");
	}
    
    });
}
    setTimeout(showm, 1000);
    
    }
    showm();
    var what_is = 0;
    function cht(){
        if(what_is == 1){
            what_is = 0;
            del();
        }else{
            what_is = 1;
            to();
        }
}
    function to(){
        $( "#inv" ).html('<img src="img/loading.gif" width="50" alt="">');
        $.ajax({
      method: "GET",
      url: "invite.php",
      dataType: "text",
      data: {},
      success: function(data){  
         
        $( "#inv" ).html(data);
	}
    
    });
    }
    function del(){
        $( "#inv" ).html("");
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
    <p id="js"></p>
    </div>
</div>
</body>
</html>