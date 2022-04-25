<?php
    if(rand(0, 1)){
        $connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
        
      
        while(1){
       
        $wall = mysqli_query($connection, "SELECT * FROM `posts` ORDER BY RAND()");
        if(($acc = mysqli_fetch_assoc($wall))){
            
           
            print_r('<div id="in" style="font-size: 20px;">'); 
            $wa = mysqli_query($connection, "SELECT * FROM `accaunts` WHERE `login` = '$acc[login]'");
            $ac = mysqli_fetch_assoc($wa);
            if($ac[ava] != NULL){
                $show_img = base64_encode($ac[ava]);
                   
                    
                echo '<img src="data:image/jpeg;base64, '. $show_img .'" alt="Изображение не добавлено"  width="45px">';
                
                }
            echo ' <a href="http://radio-red.ru/accaunt.php?acc=' . $acc[login] . '" style="color: Red;">';
            
            print_r($acc[login]);
            if($ac[v])
            echo '<img src="img/v.png" alt="Изображение не добавлено"  width="20px">';
            print_r('</a> | ');
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
            print_r('<hr>');
            if($acc[img] != NULL){
                $show_img = base64_encode($acc[img]);
                   
                    
                echo '<img src="data:image/jpeg;base64, '. $show_img .'" alt="Изображение не добавлено"  width="10%"><br>';
                
                }
                print_r($acc[text]);
                if($acc[edit]){
                    
                    echo ' <a style="color: Grey;">(Изменено)</a>';
                    }
                print_r('<hr>Понравилось <a style="color: Red;">');
                print_r($acc[likes]);
                print_r('</a> людям</div>');
                
                break;
        }
        
    }
       
        
        mysqli_close($connection);
    }else{
    
    $connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
   
    $wall = mysqli_query($connection, "SELECT * FROM `dns` ORDER BY RAND()");
    $walluse = mysqli_fetch_assoc($wall);
    echo '<img src="img/radio.png" width="30" alt=""><a style="color: red;" href="http://radio-red.ru/dns.php?dns=' . $walluse[name] . '">' . $walluse[name] . '</a>';
    
    
    mysqli_close($connection);
    }
?>
