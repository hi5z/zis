<?php
/////////////////////// ЗАЩИТА ВО ВСЕ ПОЛЯ! ////////////////////////////////////
@include "config.php";
$pass = $row1[value];
if($_COOKIE["pass"]!==$pass)
{
	sleep(1);
	if(isset($_POST["pass"]))
	{
		setcookie("pass",md5($_POST["pass"]), time()+3600*24*14);
		die('<meta http-equiv="refresh" content="1; url=/admin.php">');
	}
?>
<html>
<head><title>Админка</title></head>
<body>
<form method="post">
<input type="password" name="pass" value="" />
<input type="submit" name="submit" value="Войти" />
</form>
</body>
</html>
<?php
exit();
}
//////////////////////// КОНЕЦ ЗАЩИТЫ ////////////////////////////////////////
?>

<?php
if(isset($_POST["logout"]))
{
	setcookie('pass', '',time() - 10*365*24*60*60);
	die('<meta http-equiv="refresh" content="1; url=/admin.php">');
}
?>  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Админ панель - Настройки</title>
<link rel="stylesheet" type="text/css" href="/main.css" />
<style>
input:hover    { text-decoration: underline; }
</style>
</head>
<body> 
<!-- ADMIN BAR -->
<table class="bar" width="100%" border="1" style="position:fixed; top:0px; text-align:right; color: white;">
<tr><td height="35px">
<? include 'topbar.php'; ?>
</td></tr>
</table>
<!-- /ADMIN BAR -->
        
<h1><a href="/">Логотип</a></h1>
<div align="center">
<form action="" method="post">

<table class="c1" border="0" cellpadding="2" cellspacing="2">
<tr>
	<td align="right">
	<label for="papkaadmin">Название сайта:</label>&nbsp;&nbsp;</td>
	<td align="left">
	<input id="test" name="test" type="text" value="test" onfocus="if(this.value==this.defaultValue){this.value='';document.getElementById('dynamicNamed').style.color = 'inherit'; }" onblur="if(this.value==''){this.value=this.defaultValue;document.getElementById('dynamicNamed').style.color = 'gray';}"  />
	</td>
</tr>
<tr>
	<td align="right">
	<label for="papkaadmin">Стандартный язык:</label>&nbsp;&nbsp;</td>
	<td align="left">
	<select name="language" size="1">
	<option value="ru">Русский</option>
	<option value="en">Английский</option>   
	</select>                
	</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
	<td align="right">
	<label for="papkaadmin">Папка для загрузки изображений:</label>&nbsp;&nbsp;</td>
	<td align="left">
	<input id="papkaadmin" name="papkaadmin" type="text" value="<? echo $papka; ?>" onfocus="if(this.value==this.defaultValue){this.value='';document.getElementById('dynamicNamed').style.color = 'inherit'; }" onblur="if(this.value==''){this.value=this.defaultValue;document.getElementById('dynamicNamed').style.color = 'gray';}"  />
	</td>
</tr>
<tr>
	<td align="right">
	<label for="mail">Максимальный размер загружаемого файла:</label>&nbsp;&nbsp;</td>
	<td align="left">
	<input id="razmeradmin" name="razmeradmin" type="text"  value="<? echo $razmer; ?>" onfocus="if(this.value==this.defaultValue){this.value='';document.getElementById('dynamicNamed').style.color = 'inherit'; }" onblur="if(this.value==''){this.value=this.defaultValue;document.getElementById('dynamicNamed').style.color = 'gray';}"  />
	</td>
</tr>
<tr>
	<td colspan="3" align="center">
	<br />
	<input class="zagr" name="do" type="submit" value="Сохранить изменения" />
	</td>
</tr>
</table>
</form>
</div>
</body>
</html>
