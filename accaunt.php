<?php
session_start();
ob_start();
$connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
$bane = mysqli_query($connection, "SELECT * FROM `ban` WHERE `login` = '$_SESSION[user]'");
if(($ban = mysqli_fetch_assoc($bane))){
    $_SESSION[bann] = $_SESSION[user];
    $_SESSION[user] = NULL;
    echo '<META HTTP-EQUIV="REFRESH" content="0; URL=http://radio-red.ru/ban.php">';
}

if($_SESSION[page] == NULL){
$_SESSION[page] = 1;
}
if(isset($_POST[npage])){
    $t = $_SESSION[page] + 1;
    $_SESSION[page] = $t;
}else{
    $_SESSION[page] = 1;
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
    <title><?php echo $_GET[acc]; ?></title>
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
<?php
 if($_SESSION[user] == 'AL9'){
    if(isset($_POST[v])){
        $connection = mysqli_connect('127.0.0.1', 'root', 'root', 'radio');
        mysqli_query($connection, "UPDATE `accaunts` SET `v` = 1 WHERE `accaunts`.`login` = '$_GET[acc]'"); 
        
    }
    if(isset($_POST[vss])){
        $connection = mysqli_connect('127.0.0.1', 'root', 'root', 'radio');
        mysqli_query($connection, "UPDATE `accaunts` SET `v` = 0 WHERE `accaunts`.`login` = '$_GET[acc]'"); 
        
    }
    if(isset($_POST[ban])){
        echo '<META HTTP-EQUIV="REFRESH" content="0; URL=http://radio-red.ru/toban.php?&acc=' . $_GET[acc] . '">';
        
    }
    if(isset($_POST[banss])){
        $connection = mysqli_connect('127.0.0.1', 'root', 'root', 'radio');
        mysqli_query($connection, "DELETE FROM `ban` WHERE `login` = '$_GET[acc]'");
        
    }
    
}
if($_SESSION[user] == $_GET[acc]){
    
?>
<div class="parent">
    <div id="bgr" class="person">
        <div id="in">
        <?php
             $connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
            
             if(isset($_POST[ready])){
                mysqli_query($connection, "UPDATE `accaunts` SET `name` = '$_POST[name]' WHERE `accaunts`.`login` = '$_SESSION[user]'"); 
                mysqli_query($connection, "UPDATE `accaunts` SET `about` = '$_POST[about]' WHERE `accaunts`.`login` = '$_SESSION[user]'"); 
                
            }
            if(isset($_POST[postsend])){ 
              
                if(empty($_FILES['img']['tmp_name']) AND $_POST[post] == NULL){

                }else{
                   
                    $img = NULL;
                    if(!empty($_FILES['img']['tmp_name'])){
                       
                        $img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
                        
                    }
                mysqli_query($connection, "INSERT INTO `posts` (`login`, `text`, `img`) VALUES ('$_SESSION[user]', '$_POST[post]', '$img')");
                header("Location: http://radio-red.ru/accaunt.php?&acc=" . $_GET[acc]);
                    
                }
            }
             if(isset($_POST[avadone])){
                $img = NULL;
            if(!empty($_FILES['img']['tmp_name'])){
                $img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
            }
           
              mysqli_query($connection, "UPDATE `accaunts` SET `ava` = '$img' WHERE `accaunts`.`login` = '$_SESSION[user]'");
             }
             $logget = mysqli_query($connection, "SELECT * FROM `accaunts`  WHERE `login` = '$_GET[acc]'");
             $acc = mysqli_fetch_assoc($logget);
             
             $show_img = base64_encode($acc[ava]);
             if($acc[ava] == NULL){
                echo '<br><img src="img/nophoto.png" alt=""  width="75%">';
            }else{
               


                    $show_img = base64_encode($acc[ava]);
                   
                    
                        echo '<br><img src="data:image/jpeg;base64, '. $show_img .'" alt="?????????????????????? ???? ??????????????????"  width="75%">';
                   
                    
                    
            }
            
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
        <a style="color: Grey;">?????????????? ???????????????? ??????????????</a>
                <br>
                <input id="in" type="file" name="img" style="font-size: 10px;">
                <input id="in" type="submit" name="avadone"  style="font-size: 10px;" value="??????????????">
                </div>
                <br>
                <div id="in">
                        <?php echo $acc[coins]; ?> <a href="coins.php" style="color: Red;">????????????.</a><br><br>
                        <a style="color: Gray;" href="aboutcoins.php">???????????????????? ?? ???????????????? +20%</a>
                    </div><br>
                    <div id="in">
                    <a style="color: Grey;">?????????????? ???? ??????????, ?????????? ???????????????????? ????????????</a><br>
                        <img src="img/friends.png" width="20px" alt="">?? ?????? ????????????:<a style="color: Red; cursor: pointer;" onclick="chf();">
                        <?php
                             $wallcolvo = mysqli_query($connection, "SELECT COUNT(`id`) AS `colvo` FROM `friends` WHERE `login` = '$_SESSION[user]'");
                             $colvoclean = mysqli_fetch_assoc($wallcolvo);
                             echo $colvoclean[colvo];
                        ?>
                        </a>
                        | ?????????? ??????:
                        <a style="color: Red; cursor: pointer;" onclick="cht();">
                        <?php
                             $wallcolvo = mysqli_query($connection, "SELECT COUNT(`id`) AS `colvo` FROM `friends` WHERE `friend` = '$_SESSION[user]'");
                             $colvoclean = mysqli_fetch_assoc($wallcolvo);
                             echo $colvoclean[colvo];
                        ?></a>
                         <div id="fr">

                        </div>
                    </div><br>
                    <div id="in">
                        <!-- RotaBan.ru Zone Code -->
<div id="rotaban_261835" class="rbrocks rotaban_61b18e45df5d4c6fa61cb7fbebbea24f"></div>
<!-- END RotaBan.ru Zone Code -->
                    </div>
                    
    </div>
    <div id="bgr" class="wall">
        <a style="color: White;" href="index.php">???? ??????????????</a><br><br>
        <div id="in">
        <?php
        
        if(isset($_POST[ready])){
            ?>
            <div id="green">
                    ??????????????????!
            </div>
        <?php
        }
        
        ?>
            <form action="" method="POST">
            <a style="color: Grey;">???????????????? ???????????????????? ?? ??????</a><br><br>
            <input id="in" type="text" name="name" value="<?php echo $acc[name]; ?>" placeholder="??????????????, ??????">
            <?php
                if($acc[v]){
                    ?>
                        <img src="img/v.png" width="25px" alt="">
                    <?php
                }
                $loggetc = mysqli_query($connection, "SELECT * FROM `accaunts` ORDER BY `coins` DESC LIMIT 1");
                $accc = mysqli_fetch_assoc($loggetc);
                if($accc[login] == $_GET[acc]){
                   echo '<img src="img/coin.png" width="25px" alt="">';
                }
                
            ?>
            <br><br>
            <textarea id="in" style="width: 90%; height: 100px;" type="text" name="about" placeholder="?????? ??????"><?php echo $acc[about]; ?></textarea><br><br>
                <input id="in" type="submit" name="ready" value="??????????????????">
            </form>
       
            
       
        
        </div>
        <br>
        <div id="in">
        <form action="" method="POST" enctype="multipart/form-data">
<h2>?????????? ????????????</h2>
<a style="color: Grey;">???????????? ?????????? ???????????????????????? ?????? ?????????? ??????????????????</a><br><br>
<input id="in" type="file" name="img" style="font-size: 10px;"><br><br>
<textarea id="in" style="width: 90%; height: 100px;" type="text" name="post" placeholder="????????????????, ?????? ?? ?????? ????????????!"></textarea><br><br>
    <input id="in" type="submit" name="postsend" value="????????????????????????!">
</form>
        </div>
        <?php
             $logget = mysqli_query($connection, "SELECT * FROM `posts`  WHERE `login` = '$_GET[acc]' ORDER BY `id` DESC LIMIT " . ($_SESSION[page] - 1) * 10 . ", 10");
             while(($acc = mysqli_fetch_assoc($logget))){
                echo '<br><div id="in"><a style="color: Red;">';
                echo $acc[login];
                echo '</a> | ';


                list($date, $time) = explode(' ', $acc[time]);
                list($year, $month, $day) = explode('-', $date);
                list($hour, $minute, $second) = explode(':', $time);
                $mo = '';
                        if($month == '01'){
                            $mo = '????????????';
                        }
                        if($month == '02'){
                            $mo = '??????????????';
                        }
                        if($month == '03'){
                            $mo = '??????????';
                        }
                        if($month == '04'){
                            $mo = '????????????';
                        }
                        if($month == '05'){
                            $mo = '??????';
                        }
                        if($month == '06'){
                            $mo = '????????';
                        }
                        if($month == '07'){
                            $mo = '????????';
                        }
                        if($month == '08'){
                            $mo = '??????????????';
                        }
                        if($month == '09'){
                            $mo = '????????????????';
                        }
                        if($month == '10'){
                            $mo = '??????????????';
                        }
                        if($month == '11'){
                            $mo = '????????????';
                        }
                        if($month == '12'){
                            $mo = '??????????????';
                        }
                if($year == date('Y')){
                    if($month == date('m')){
                        if($day == date('d')){
                            if($hour == date('H')){
                                if($minute == date('i')){
                                    if($second + 20 > date('s')){
                                        echo '?????????? ????????????!';
                                    }else{
                                        echo date('s') - $second . ' ???????????? ??????????';
                                    }
                                }else{
                                    echo date('i') - $minute . ' ?????????? ??????????';
                                }
                            }else{
                                echo '?????????????? ?? ' . $hour . ':' . $minute;
                            }
                        }else if($day + 1 == date('d')){
                            echo '?????????? ?? ' . $hour . ':' . $minute;
                        }else{
                            echo $day . ' ?????????? ?? ' . $hour . ':' . $minute;
                        }
                       
                    }else{
                        echo $day . ' ' . $mo . ' ?? ' . $hour . ':' . $minute;
                    }
                   
                }else{
                    echo $year . ' ??????, ' . $day . ' ' . $mo . ' ?? ' . $hour . ':' . $minute;
                }


                echo ' | <img onclick="edit(' . $acc[id] . ')" src="img/edit.png" width="20" alt=""> <img onclick="remove(' . $acc[id] . ')" src="img/remove.png" width="20" alt=""><hr>';
                if($acc[img] != NULL){
                $show_img = base64_encode($acc[img]);
                   
                    
                echo '<br><img src="data:image/jpeg;base64, '. $show_img .'" alt="?????????????????????? ???? ??????????????????"  width="50%">';
                echo "<br><br>";
                }
                echo nl2br($acc[text]);
                if($acc[edit]){
                echo '<br>';
                echo '<a style="color: Grey;">(????????????????)</a>';
                }
                echo '<hr>?????????????????????? <a style="color: Red;">';
                echo $acc[likes];
                echo '</a> ?????????? | <img onclick="comment(' . $acc[id] . ')" src="img/edit.png" width="20" alt=""></div>';
             }
        ?>
        
    <form action="" method="POST"><br>
    <input type="submit" id="in" value="?? ????????????"><input id="in" type="submit" name="npage" value="???? ???????????????? <?php echo $_SESSION[page] + 1; ?>">
        </form>
    </div>
</div>

<script>
var post;
function edit(post){
    document.location.href = "http://radio-red.ru/post.php?&post=" + post + "&whatdo=edit";
}
function remove(post){
    document.location.href = "http://radio-red.ru/post.php?&post=" + post + "&whatdo=remove";
}
</script>
<?php

}else{
    ?>
    <div class="parent">
        <div id="bgr" class="person">
            <div id="in">
            <?php
                 $connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
                 $logget = mysqli_query($connection, "SELECT * FROM `friends`  WHERE `friend` = '$_GET[acc]' AND `login` = '$_SESSION[user]'");
                 if(!($acc = mysqli_fetch_assoc($logget))){
                 if($_SESSION[user] != NULL){
                    if(isset($_POST[friendin])){
                      
                  
                    mysqli_query($connection, "INSERT INTO `friends` (`login`, `friend`) VALUES ('$_SESSION[user]', '$_GET[acc]')");
                    header("Location: http://radio-red.ru/accaunt.php?&acc=" . $_GET[acc]);
                    }
                }
                }else{
                    if($_SESSION[user] != NULL){
                    if(isset($_POST[friendout])){
                        
                        mysqli_query($connection, "DELETE FROM `friends` WHERE `login` = '$_SESSION[user]' AND `friend` = '$_GET[acc]'");
                        header("Location: http://radio-red.ru/accaunt.php?&acc=" . $_GET[acc]);
                    }
                    }
                
                }
                 $logget = mysqli_query($connection, "SELECT * FROM `accaunts`  WHERE `login` = '$_GET[acc]'");
                 $acc = mysqli_fetch_assoc($logget);
                 $banee = mysqli_query($connection, "SELECT * FROM `ban` WHERE `login` = '$_GET[acc]'");
                 if(($bano = mysqli_fetch_assoc($banee))){
                     echo '<h1 style="color: Red;">?????????????? ?? ?????? ??????????!</h1>';
                 }
                 if($acc[login] == NULL){
                    echo '<META HTTP-EQUIV="REFRESH" content="0; URL=http://radio-red.ru">';
                 }
                 $show_img = base64_encode($acc[ava]);
                 if($acc[ava] == NULL){
                    echo '<br><img src="img/nophoto.png" alt=""  width="75%">';
                }else{
                   
                        $show_img = base64_encode($acc[ava]);
                       
                        
                            echo '<br><img src="data:image/jpeg;base64, '. $show_img .'" alt="?????????????????????? ???? ??????????????????"  width="75%">';
                       
                        
                        
                }
                
            ?>
            
                    </div><br>
                    <div id="in">
                        <?php echo $acc[coins]; ?> <a style="color: Red;">????????????.</a><br>
                    </div><br>
                    <div id="in">
                        <?php
                        if($_SESSION[user] != NULL){
                            $logget = mysqli_query($connection, "SELECT * FROM `friends`  WHERE `login` = '$_SESSION[user]' AND `friend` = '$_GET[acc]'");
                            if(($acc = mysqli_fetch_assoc($logget))){
                                ?>
                                <form action="" method="POST">
        
        <button type="submit" style="background-color: Black;" name="friendout"><img src="img/friendsout.png" width="30px" alt=""></button><br>?? ?????? ?? ??????????????
        </form>
        <?php
                            }else{
                                ?>
                                <form action="" method="POST">
        
        <button type="submit" style="background-color: Black;" name="friendin"><img src="img/friends.png" width="30px" alt=""></button><br>???????????????? ?? ????????????
        </form>
        <?php
                            }
                        }else{
                            echo '<h2>?????????????? ??????????????!</h2>';
                        }
                        ?>
                        <hr>
                        <a style="color: Grey;">?????????????? ???? ??????????, ?????????? ???????????????????? ????????????</a><br>
                        <img src="img/friends.png" width="20px" alt="">?? <?php echo $_GET[acc]; ?> ????????????:<a style="color: Red; cursor: pointer;" onclick="chf();">
                        <?php
                             $wallcolvo = mysqli_query($connection, "SELECT COUNT(`id`) AS `colvo` FROM `friends` WHERE `login` = '$_GET[acc]'");
                             $colvoclean = mysqli_fetch_assoc($wallcolvo);
                             echo $colvoclean[colvo];
                        ?>
                        </a>
                        | ?????????? <?php echo $_GET[acc]; ?>:
                        <a style="color: Red; cursor: pointer;" onclick="cht();">
                        <?php
                             $wallcolvo = mysqli_query($connection, "SELECT COUNT(`id`) AS `colvo` FROM `friends` WHERE `friend` = '$_GET[acc]'");
                             $colvoclean = mysqli_fetch_assoc($wallcolvo);
                             echo $colvoclean[colvo];
                        ?></a>
                        <div id="fr">

                        </div>
                        
                    </div>
                    <br>
                    <div id="in">
                        <!-- RotaBan.ru Zone Code -->
<div id="rotaban_261835" class="rbrocks rotaban_61b18e45df5d4c6fa61cb7fbebbea24f"></div>
<!-- END RotaBan.ru Zone Code -->
                    </div>
        </div>
        <div id="bgr" class="wall">
            <a style="color: White;" href="index.php">???? ??????????????</a><br><br>
            <div id="in">
           
                <h1><?php $logget = mysqli_query($connection, "SELECT * FROM `accaunts`  WHERE `login` = '$_GET[acc]'");
                 $acc = mysqli_fetch_assoc($logget); echo $acc[name]; ?>
                 <?php
                if($acc[v]){
                    ?>
                        <img src="img/v.png" width="25px" alt="">
                    <?php
                }
                $loggetc = mysqli_query($connection, "SELECT * FROM `accaunts` ORDER BY `coins` DESC LIMIT 1");
                $accc = mysqli_fetch_assoc($loggetc);
                if($accc[login] == $_GET[acc]){
                   echo '<img src="img/coin.png" width="25px" alt="">';
                }
            ?></h1>
                 <hr>
                <h3><?php echo $acc[about]; ?></h3>
           
                
           
            
            </div>
            <br><a style="color: Grey;">?????????????? ????????????????????????:</a><br>
            <?php
             $logget = mysqli_query($connection, "SELECT * FROM `posts`  WHERE `login` = '$_GET[acc]' ORDER BY `id` DESC LIMIT " . ($_SESSION[page] - 1) * 10 . ", 10");
             while(($acc = mysqli_fetch_assoc($logget))){
                echo '<br><div id="in"><a style="color: Red;">';
                echo $acc[login];
                echo '</a> | ';
                list($date, $time) = explode(' ', $acc[time]);
                list($year, $month, $day) = explode('-', $date);
                list($hour, $minute, $second) = explode(':', $time);
                $mo = '';
                        if($month == '01'){
                            $mo = '????????????';
                        }
                        if($month == '02'){
                            $mo = '??????????????';
                        }
                        if($month == '03'){
                            $mo = '??????????';
                        }
                        if($month == '04'){
                            $mo = '????????????';
                        }
                        if($month == '05'){
                            $mo = '??????';
                        }
                        if($month == '06'){
                            $mo = '????????';
                        }
                        if($month == '07'){
                            $mo = '????????';
                        }
                        if($month == '08'){
                            $mo = '??????????????';
                        }
                        if($month == '09'){
                            $mo = '????????????????';
                        }
                        if($month == '10'){
                            $mo = '??????????????';
                        }
                        if($month == '11'){
                            $mo = '????????????';
                        }
                        if($month == '12'){
                            $mo = '??????????????';
                        }
                if($year == date('Y')){
                    if($month == date('m')){
                        if($day == date('d')){
                            if($hour == date('H')){
                                if($minute == date('i')){
                                    if($second + 20 > date('s')){
                                        echo '?????????? ????????????!';
                                    }else{
                                        echo date('s') - $second . ' ???????????? ??????????';
                                    }
                                }else{
                                    echo date('i') - $minute . ' ?????????? ??????????';
                                }
                            }else{
                                echo '?????????????? ?? ' . $hour . ':' . $minute;
                            }
                        }else if($day + 1 == date('d')){
                            echo '?????????? ?? ' . $hour . ':' . $minute;
                        }else{
                            echo $day . ' ?????????? ?? ' . $hour . ':' . $minute;
                        }
                       
                    }else{
                        echo $day . ' ' . $mo . ' ?? ' . $hour . ':' . $minute;
                    }
                   
                }else{
                    echo $year . ' ??????, ' . $day . ' ' . $mo . ' ?? ' . $hour . ':' . $minute;
                }

                echo '<hr>';
                if($acc[img] != NULL){
                    $show_img = base64_encode($acc[img]);
                       
                        
                    echo '<br><img src="data:image/jpeg;base64, '. $show_img .'" alt="?????????????????????? ???? ??????????????????"  width="50%">';
                    echo "<br><br>";
                    }
                echo nl2br($acc[text]);
                if($acc[edit]){
                    echo '<br>';
                    echo '<a style="color: Grey;">(????????????????)</a>';
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
               
                }else{
                   
                        echo '<hr>?????????????????????? <a style="color: Red;">';
                        echo $acc[likes];
                        echo '</a> ??????????';
                    
                }
                echo '</div>';
             }
        ?>
        <form action="" method="POST"><br>
        <input type="submit" id="in" value="?? ????????????"><input id="in" type="submit" name="npage" value="???? ???????????????? <?php echo $_SESSION[page] + 1; ?>">
        </form>
        </div>
    </div>
    <?php
    
}
?>
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>

<script>
    var what_is = 0;
    function chf(){
        if(what_is == 1){
            what_is = 0;
            del();
        }else{
            what_is = 1;
            $( "#fr" ).html('<img src="img/loading.gif" width="25%" alt="">');
            from();
        }
    }
    function cht(){
        if(what_is == 2){
            what_is = 0;
            del();
        }else{
            what_is = 2;
            $( "#fr" ).html('<img src="img/loading.gif" width="25%" alt="">');
            to();
        }
}
    function from(){
        $.ajax({
      method: "GET",
      url: "friends.php",
      dataType: "text",
      data: {w: 0,
            who: "<?php echo $_GET[acc]; ?>"
      },
      success: function(data){  
         
        $( "#fr" ).html(data);
	}
    
    });
       
    }
    function to(){
        $.ajax({
      method: "GET",
      url: "friends.php",
      dataType: "text",
      data: {w: 1,
            who: "<?php echo $_GET[acc]; ?>"
      },
      success: function(data){  
         
        $( "#fr" ).html(data);
	}
    
    });
    }
    function del(){
        $( "#fr" ).html("");
    }
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
<?php
if($_SESSION[user] == 'AL9'){
    ?>
    <form action="" method="POST">
    <input type="submit" name="v" value="???????????? ??????????????!">
    <input type="submit" name="vss" value="???????????? ??????????????!">
    <input type="submit" name="ban" value="???????????? ????????">
    <input type="submit" name="banss" value="???????????? ????????">
    </form>
    <?php
}
?>
</body>
</html>