<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ZIS - хостинг картинок в UA-IX</title>
<link rel="stylesheet" type="text/css" href="/main.css" />
<link rel="shortcut icon" href="/icon.ico" type="image/x-icon" />

<style type="text/css">
/*<![CDATA[*/
 div.c4 {display:none;} 
 div.c1 {text-align: center;}
 table.c1 {text-align: center; width: 770px;}
 #lastpic {display:none; text-align: center;}
 fieldset {border: none;}
/*]]>*/
</style>

</head>
    
<body>

<table class="bar" width="100%" border="1" style="position:absolute; top:0px; text-align:right; color: white;">
    <tr><td height="35px">
 <?    
 
 session_start();
@include 'config.php';
@include 'topbar.php';


?>
    </td></tr>
</table>

<div class="in">
<h1><a href="/">Логотип</a></h1>
Категории: <br />
<?

 $cat = "SELECT id,name FROM `categories`";
 $str = mysql_query($cat) or die('Ошибка БД');
 mysql_query('SET CHARSET UTF8');
 mysql_query('SET NAMES UTF8');
 while ($data = mysql_fetch_array($str)) { 
 $name = $data['name'];
 $id_cat = $data['id'];
 $query = "SELECT * FROM images where category = $id_cat";
 $result = mysql_query($query) or die('Ошибка БД'); 
 $count = mysql_num_rows($result); 
 
 echo "" . $name . ": <strong>" . $count . "</strong><br />";
 }

 /*function
         Категории: <br /><br />
Без категории <br />
Смешное <br />
Животные <br />
Политика <br />
Девушки <br />
Учеба <br />
Страшное <br />
*/
mysql_free_result($result);
?> 




<br /><br /><br /><br />
<? @include_once 'static/footer.php'; ?>

</body>

</html>