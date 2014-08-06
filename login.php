<?
//Поключаем конфиг
@include("config.php");

if(md5(crypt($_SESSION['user'],$_SESSION['password'])) != $_SESSION['SID'])
{
//Если кнопка не нажата, отображаем форму
//Если кнопка нажата
	if($_POST['do'])
	{
		//Проверяем данные
		$login = $_POST['login'];
		$upass = $_POST['password'];
		if($login !='' AND $upass !='')
		{
			//Создаем запрос
			$q1=mysql_query("SELECT * FROM users WHERE nick='".$login."' AND password='".md5($upass)."' AND status=1");
			//Проверяем существует ли хоть одна запись
			if(mysql_num_rows($q1)===1)
			{
			//Если есть, то создаем сессии и перенаправляем на эту страницу
				$r=mysql_fetch_array($q1);
				$_SESSION['user'] = $r['nick'];
				$_SESSION['password'] = $r['password'];
				$_SESSION['SID'] = md5(crypt($r['nick'],$r['password']));
				@Header("Location: /index.php");
			}
			else {echo '<script>alert(\'Логин и/или пароль введены неверно.\')</script>';}
		}
	}
}
else
{
	$q2 = @mysql_query("SELECT * FROM users WHERE nick='".$_SESSION['user']."' AND password='".$_SESSION['password']."' AND status=1");
}
   
if($_GET['exit'] == 1)
{
	@session_destroy(); 
	unset($_GET['exit']); 
	mysql_close($link);   
	@Header("Location: /");
}
?>