<?php

@include "config.php";
  
?>



<?php
 // Переменная хранит число сообщений выводимых на станице
 $num = 5;
 // Определяем общее число сообщений в базе данных
 $result = mysql_query("SELECT COUNT(*) FROM images");
 $rgPosts = mysql_fetch_row($result);
 $posts=$rgPosts[0];
 // Находим общее число страниц
 $total = intval(($posts - 1) / $num) + 1;
 // Извлекаем из URL текущую страницу
 $page = $_GET['page'];
 // Определяем начало сообщений для текущей страницы
 $page = intval($page);

 // Если значение $page меньше единицы или отрицательно
 // переходим на первую страницу
 // А если слишком большое, то переходим на последнюю
 if(empty($page) or $page < 0) $page = 1;
   if($page > $total) $page = $total;
    // Вычисляем начиная к какого номера
 // следует выводить сообщения
  $start = $page * $num - $num;
 // Выбираем $num сообщений начиная с номера $start
 $result = mysql_query("SELECT * FROM images LIMIT $start, $num");
 // В цикле переносим результаты запроса в массив $postrow
 while ( $postrow[] = mysql_fetch_array($result))

 ?>  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Простое разделение на страницы таки да</title>
        <link rel="stylesheet" type="text/css" href="/main.css" />
        <style>
input:hover    { text-decoration: underline; }
</style>
    </head>
    <body> 
     <!-- ADMIN BAR -->
<table class="bar" width="100%" border="1" style="position:static; top:0px; text-align:right; color: white;">
    <tr><td height="35px">
<? include 'topbar.php'; ?>
    </td></tr>
</table>
    <!-- /ADMIN BAR -->
        

<h1><a href="/">Логотип</a></h1>
        
  <?      
  
  
 switch ($_GET["f"]) 
{ 
  case "delete":      // Удалить запись в таблице БД
    delete_item(); break;
}   


echo "<div align=\"center\">";
echo "<table width=\"70%\" border=\"0\"";
echo "<tr><th align=\"center\">ID</th><th align=\"center\">Картинка</th><th align=\"center\">Информация</th></tr>";
for($i = 0; $i < $num; $i++) 
{
    
        if (!empty($postrow[$i]['uniq_id']))
        {$nickname=$postrow[$i]['uniq_id'];}
        else {$nickname="Аноним";}
        
        
        
        if ((empty($postrow[$i]['category'])))
        {
            $category = 'Без категории';
        }
        elseif (($postrow[$i]['category'] == 1))
        {
            $category = 'Смешное';
        }
        elseif (($postrow[$i]['category'] == 2))
        {
            $category = 'Животные';
        }
        elseif (($postrow[$i]['category'] == 3))
        {
            $category = 'Политика';
        }
        elseif (($postrow[$i]['category'] == 4))
        {
            $category = 'Девушки';
        }
        elseif (($postrow[$i]['category'] == 5))
        {
            $category = 'Учеба';
        }
        elseif (($postrow[$i]['category'] == 6))
        {
            $category = 'Страшное';
        }

        
    
    if (!empty($postrow[$i]['id']))
    {
echo "<tr> 
      <td style=\"color:#B2b2b2; padding-left:4px\" width=\"30px\">".$postrow[$i]['id']."</td>    
      <td align=\"center\"><a target=\"_blank\" href=\"".$url.$postrow[$i]['link']."\"><img width=\"290px\" src=\"".$url.$papka.$postrow[$i]['link'].".".$postrow[$i]['exten']."\" /></a></td>
                    <td align=\"center\">
                        Имя файла: ".$postrow[$i]['name']."<br />
                        Разрешение: ".$postrow[$i]['razmer']."<br />
                        Просмотров: ".$postrow[$i]['views']."<br />
                        Категория: ".$category."<br />
                        
                    
                    </td>
                  
</tr>"; 
    }
} 
echo "</table>"; 
echo "</div>";


// Функция удаляет запись в таблице БД
      $tdl = $papka.$postrow[$i]['link'].$postrow[$i]['exten'];
function delete_item() 
{ 
  $query = "DELETE FROM images WHERE id=".$_GET['id']; 
  mysql_query ( $query );
  unlink ($tdl);
  header( 'Location: '.$_SERVER['PHP_SELF'] );
  die();
} 
?>
        
        
        
        <?php 
// Проверяем нужны ли стрелки назад 
if ($page != 1) $pervpage = '<a href= ./everything.php?page=1><<</a> 
                               <a href= ./everything.php?page='. ($page - 1) .'><</a> '; 
// Проверяем нужны ли стрелки вперед 
if ($page != $total) $nextpage = ' <a href= ./everything.php?page='. ($page + 1) .'>></a> 
                                   <a href= ./everything.php?page=' .$total. '>>></a>'; 

// Находим две ближайшие станицы с обоих краев, если они есть 
if($page - 2 > 0) $page2left = ' <a href= ./everything.php?page='. ($page - 2) .'>'. ($page - 2) .'</a> | '; 
if($page - 1 > 0) $page1left = '<a href= ./everything.php?page='. ($page - 1) .'>'. ($page - 1) .'</a> | '; 
if($page + 2 <= $total) $page2right = ' | <a href= ./everything.php?page='. ($page + 2) .'>'. ($page + 2) .'</a>'; 
if($page + 1 <= $total) $page1right = ' | <a href= ./everything.php?page='. ($page + 1) .'>'. ($page + 1) .'</a>'; 

// Вывод меню 
echo $pervpage.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$nextpage; 

?>
    </body>
</html>
