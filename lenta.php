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
    <a style="color: White;" href="index.php">На главную</a>
    </div>
    <div id="bgr">
    <h1>Посмотрим, что же сегодня нового?</h1>
    </div>
    <div id="news0"></div>
    
    </div>
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script>
 
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
    var btn = -1;
    function more(){
        btn++;
        $.ajax({
      method: "GET",
      url: "lentagen.php",
      dataType: "text",
      data: {btn: btn},
      success: function(data){  
        $( "#news" + btn ).html(data);
       console.log("#news" + btn);
	}
    
    });

       
        
    }
    more();

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
<p id="js"></p>


</body>
</html>