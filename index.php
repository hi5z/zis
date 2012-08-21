<?
@include 'config.php';
@include 'language/ru.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- <meta http-equiv="Cache-Control" content="public" />
<meta http-equiv="Cache-Control" content="max-age=1209600" /> -->
<title><? echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="/main.css" />
<link rel="shortcut icon" href="/icon.ico" type="image/x-icon" />


<style type="text/css">
/*<![CDATA[*/
 div.c4 {display:none;} 
 div.c1 {text-align: center;}
 table.c1 {text-align: center; width: 770px;}
 #lastpic {display:none; text-align: center; overflow: hidden; position: absolute;}
 #taggs {display:none; text-align: center;}
/*]]>*/
</style>

</head>

<body>
    <!-- BAR -->
<table class="bar" width="100%" border="1" style="position:static; top:0px; text-align:right; color: white;">
    <tr><td height="35px">
<? include 'topbar.php'; ?>
    </td></tr>
</table>
    <!-- /BAR -->

<div class="in">
<h1><a href="/">Логотип</a></h1>
<!-- <th><h1><a href="/index.php">Логотип</a></h1></th> -->


    
    

   
   <?php

 define ("MAX_SIZE", $razmer);

 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }
 $errors=0;

 if(isset($_POST['Submit']))
 {
 	
 	$image=$_FILES['image']['name'];
 	
 	if ($image)
 	{

 		$filename = stripslashes($_FILES['image']['name']);
                
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);

 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
 		{

 			echo '<h2>К сожалению вы пытаетесь загрузить не картинку. :)</h2>';
 			$errors=1;
 		}
 		else
 		{

 $size=filesize($_FILES['image']['tmp_name']);

if ($size > MAX_SIZE*1024)
{
	echo '<h1>Великоват файл! Лучше бы уменьшить его, потому что мы еще не можем автоматически изменять размер файла. ^_^</h1>';
	$errors=1;
}

$image_name=time().'.'.$extension;
$image_name_ne=time();

$newname=$papka.$image_name;



$copied = copy($_FILES['image']['tmp_name'], $newname);

  

@include_once 'plugins/checkbox_check.php';
@include_once 'plugins/translit.php';



$p = checkbox_verify('priv');

if (!$copied)
{
	echo '<h1>Возникли некоторые проблемы. Попробуйте снова.</h1>';
	$errors=1;
}


}}}

$category=$_POST['cat'];
    


//////////////////////////////////////
if (isset($newname)){
    
    $checksum=md5_file($newname);
$query9 = mysql_query ("SELECT * FROM images WHERE checksum='$checksum'");
if ($result = mysql_fetch_array($query9)) {
 echo '<div class="c1"><h2>Такой файл уже загружен <a href="'.$url.$result['link'].'">тут</a></h2></div>';
 
 unlink($newname);
 
} 
else {
    

    
 if(isset($_POST['Submit']) && !$errors)
 {
     
list($width, $height) = GetImageSize("$newname");
$razmer = $width.'x'.$height;
$uniid=$r2['nick'];
 	//echo 'Системные настройки.';
        //echo $checksum;
        //echo '<div align="center"><a target="_blank" href="'.$url.''.$newname.'"><img width="80%" src="'.$url.''.$newname.'" alt="Ваша картинка" /></a></div>';
 	//echo '<br /><div align="center"><textarea rows="1" cols="60">'.$url.''.$newname.'</textarea></div>';
        //echo '<br /><div align="center"><textarea rows="2" cols="60"><a href="'.$url.''.$newname.'"><img src="'.$url.''.$newname.'" /></a></textarea></div>';

            /* Выполняем SQL-запрос */

    $query = "INSERT INTO images (link, name, exten, ip, checksum, data, p, razmer, uniq_id, category) VALUES ('$image_name_ne', '$filename', '$extension', '$ip', '$checksum', '$date', '$p', '$razmer', '$uniid', '$category')";
    $result = @mysql_query($query) or die("Query failed : " . mysql_error());
    echo '<meta http-equiv="refresh" content="1; url=/'.$image_name_ne.'">';

    

 }
 
 }
}

 
    /* Закрываем соединение */
    mysql_close($link);
?>

    
    
    
   <form name="newad" method="post" enctype="multipart/form-data" action=""> 
<table class="c1" border="0">

  
    <tr>

        <td height="10%" width="35" class="le"><img src="/p/empty.gif" height="150" width="100" border="0" alt="Пустая картинка" /></td>
        
        
        
            <td height="10%" style="width: 300px;" class="ce"><h2>Загрузить каринку ----></h2><br />
            <!-- <a href="#" style="border-bottom: 1px dashed blue;" class="show_hide" rel="#lastpic">Показать последние загруженные</a> -->
            <!-- <a href="#" style="border-bottom: 1px dashed blue;" class="show_hide" rel="#taggs">Добавить ярлыки</a> -->
            
            
                <select name="cat" size="1">
                <option value="0">Без категории</option>
                <option value="1">Смешное</option>
                <option value="2">Животные</option>
                <option value="3">Политика</option>
                <option value="4">Девушки</option>
                <option value="5">Учеба</option>
                <option value="6">Страшное</option>
                </select>
            
            
            <br /><br />
            </td>
            
        <td class="ce" style="text-align:left;">
        
        <input class="zagr" type="file" name="image" /><br /><br />
        <input class="button" name="Submit" type="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Загрузка&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" />&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="priv" id="priv" />&nbsp;<label for="priv">Приватно</label>
        
            
        </td>

        
           
                  
            

        <td class="ri" width="35"><img src="/p/empty.gif" height="150" width="100" border="0" alt="Пустая картинка" /></td>
    </tr>

</table>
</form>

<div id="taggs">
    <form method="post" enctype="multipart/form-data" action="">
<input type='text' class='yarlik' />&nbsp;&nbsp;<input type='text' class='yarlik' />&nbsp;&nbsp;<input type='text' class='yarlik' />
    </form>
</div>






    <!-- <table id="lastpic" class="c1">
        <tr>
    <?
    //while ($row8=mysql_fetch_array($query8)){echo '<td style="height:150px;"><a target="_blank" href="'.$url.$row8[link].'"><img src="'.$url.$papka.$row8['link'].'.'.$row8['exten'].'" alt="Картинка №'.$row8[link].'" /></a></td>';}
    ?>
                </tr>
    </table> -->



<br /><br /><br /><br />
<? @include_once 'static/footer.php'; ?>

</body>

</html>