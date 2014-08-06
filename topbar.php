<?
if ($_SERVER['PHP_SELF']!='/topbar.php')
{
	if ($_SERVER['PHP_SELF']!='/admin.php')
	{
		@include 'login.php';
		if(@mysql_num_rows($q2)==1)
		{
			$r2 = @mysql_fetch_array($q2);
			echo '<div style="float:left;">';
			echo '<a class="zagr" href="/">Главная</a>&nbsp;&nbsp;';
			echo '<a class="zagr" href="/user/'.$r2[id].'">Моя страница</a>&nbsp;&nbsp;';
			echo '<a class="zagr" href="/everything">Все файлы</a>&nbsp;&nbsp;';
			echo '<a class="zagr" href="/cat">Рейтинг категорий</a>&nbsp;&nbsp;';
			echo '</div>';
			echo '<div style="float:right;">';
			echo '<STRONG>Добро пожаловать, '.ucfirst($r2['nick']).'</STRONG>&nbsp;&nbsp;';
			echo '<a class="zagr" href="?exit=1">Выход</a>';
			echo '</div>';
		}
		else echo <<<HTML
<div style="float: left;">
<a class="zagr" href="/">Главная</a>&nbsp;&nbsp;
<a class="zagr" href="/cat">Рейтинг категорий</a>&nbsp;&nbsp;
<a class="zagr" href="/everything">Все файлы</a>&nbsp;&nbsp;
</div>
<div style="float: right;">
<form name="1" action="" method="post">
     <input style="height:25px; color:#808080;" name="login" type="text" value="Никнейм" onfocus="if(this.value==this.defaultValue){this.value='';document.getElementById('dynamicNamed').style.color = 'inherit'; }" onblur="if(this.value==''){this.value=this.defaultValue;document.getElementById('dynamicNamed').style.color = 'gray';}" />
     <input style="height:25px; color:#808080;" name="password" type="password" value="Пароль" onfocus="if(this.value==this.defaultValue){this.value='';document.getElementById('dynamicNamed').style.color = 'inherit'; }" onblur="if(this.value==''){this.value=this.defaultValue;document.getElementById('dynamicNamed').style.color = 'gray';}" />
     <input class="zagr" name="do" type="submit" value="Войти" />
     <a class="zagr" href="/registration">Регистрация</a>
</form>
</div>
HTML;
	}
	else
	{
		@include 'login.php';
		echo <<<HTML
   <div style="float: left;">
<a class="zagr" href="/">Главная</a>&nbsp;&nbsp;
<a class="zagr" href="/everything">Все файлы</a>&nbsp;&nbsp;
<a class="zagr" href="/admin">Админка</a>&nbsp;&nbsp;
<a class="zagr" href="/settings">Настройки</a>&nbsp;&nbsp;
<a class="zagr" href="#">Сменить пароль</a>&nbsp;&nbsp;
</div>
<div style="float: right;">
<form method="post">
<input class="zagr" type="submit" name="logout" value="Выйти из админ панели" />
</form>
</div>
HTML;
	}
}
?>
  
     
     
     
     
     
