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

<?

function checkmail($mail) {
   // режем левые символы и крайние пробелы
   $mail=trim($mail);
   // если пусто - выход
   if (strlen($mail)==0) return -1;
   if (!preg_match("/^[a-z0-9_-]{1,20}+(\.){0,2}+([a-z
0-9_-]){0,5}@(([a-z0-9-]+\.)+([a-z]{2})|[0-9]{1,3}\.[0-9]{1,3}\.[0-".
   "9]{1,3}\.[0-9]{1,3})$/is",$mail))
   return -1;
   return $mail;
}

if(!$_POST['do'] OR $_POST['do'] =='') {
//Генерируем шестизначный ключ для капчи
if($_SESSION['uid'] =='') { $_SESSION['uid'] = mt_rand(100000,999999); }
$suid=$_SESSION['uid'];
//Выводим форму
echo <<<HTML

   




<form action="" method="post">
  <fieldset>
<table class="c1" border="0" cellpadding="2" cellspacing="2">


    <tr>
        <td align="right">
            <label for="nick">Желаемый никнейм:</label>&nbsp;&nbsp;</td>
            <td align="left">
                
            <input style="color:#808080;" id="nick" name="nick" type="text" value="Никнейм" onfocus="if(this.value==this.defaultValue){this.value='';document.getElementById('dynamicNamed').style.color = 'inherit'; }" onblur="if(this.value==''){this.value=this.defaultValue;document.getElementById('dynamicNamed').style.color = 'gray';}"  />
                
            </td>
    </tr>
      
    <tr>
        <td valign="top" align="right">
            <label for="pass">Пароль:</label>&nbsp;&nbsp;</td>
        
            <td align="left">
                
            <input style="color:#808080;" id="pass" name="pass" type="password" value="" onfocus="if(this.value==this.defaultValue){this.value='';document.getElementById('dynamicNamed').style.color = 'inherit'; }" onblur="if(this.value==''){this.value=this.defaultValue;document.getElementById('dynamicNamed').style.color = 'gray';}"  />
               
            </td>
    </tr>
    <tr>
        <td align="right">
            <label for="rpass">Пароль (повторить):</label>&nbsp;&nbsp;</td>
        
        <td align="left">
      
            <input style="color:#808080;" id="rpass" name="rpass" type="password"  value="" onfocus="if(this.value==this.defaultValue){this.value='';document.getElementById('dynamicNamed').style.color = 'inherit'; }" onblur="if(this.value==''){this.value=this.defaultValue;document.getElementById('dynamicNamed').style.color = 'gray';}"  />

        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="mail">Электронная почта:</label>&nbsp;&nbsp;</td>
            
            <td align="left">

            <input style="color:#808080;" id="mail" name="mail" type="text"  value="Email" onfocus="if(this.value==this.defaultValue){this.value='';document.getElementById('dynamicNamed').style.color = 'inherit'; }" onblur="if(this.value==''){this.value=this.defaultValue;document.getElementById('dynamicNamed').style.color = 'gray';}"  />

        </td>
    </tr>
     <tr>
<td colspan="3">
<br />
<input class="zagr" name="do" type="submit" value="Регистрация" />

</td>
      </tr>
      
</table>
</fieldset>
</form>
HTML;
}
//Если данные отправлены
if($_POST['do'] !='') {
//Начинаем проверять входящие данные


//Создаем запрос к базе для проверки существования Пользователя
$nick = $_POST['nick'];
mysql_query("SELECT * FROM users WHERE nick='".strtolower($nick)."'");

//Проверка результата запроса
if(mysql_affected_rows()==0) {
//Проверка ввведенных паролей

if($_POST['pass'] !='' AND $_POST['rpass'] !='' AND $_POST['pass'] === $_POST['rpass']){
//Проверяем на валидность электронный адрес
if(checkmail($_POST['mail']) !== -1) {

//Осуществляем регистарацию
//Генерируем uniq_id
$uniq_id = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].mktime());
$pass = $_POST['pass'];
$email = $_POST['mail'];
//Создаем запрос для записи данных в БД
$r = @mysql_query("INSERT INTO users VALUES(NULL,'".strtolower($nick)."','".md5($pass)."','".$email."','".$uniq_id."',1,'".date("dmY")."','".date("dmY")."')");
if($r){
   echo 'Регистрация прошла успешно! Теперь Вы можете войти используя свой ник и пароль.';
} else
{echo 'Что-то пошло не по плану и Вы не были зарегистрированы...';}
                 }
                 else {echo 'Регистрация невозможна: Электронный адрес должен соответствовать шаблону <b>name@domen.com</b><br/><a

href="registration.php"/>назад</a>';}

             }
             else {echo 'Регистрация невозможна: Введенные пароли не совпадают<br/><a href="registration.php"/>назад</a>';}


           }
           else { echo 'Регистрация невозможна: Пользователь с таким именем уже существует<br/><a href="registration.php"/>назад</a>';}


         session_destroy();
     }
?>




<br /><br /><br /><br /><br />
<div class="c1"><a target="_blank" href="http://blog.zis.org.ua/" title="Блог разработчика">imgZIS 1.0.0b © 2012</a></div>

<div class="c1">
    <a href="http://validator.w3.org/check?uri=referer"><img
      src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
    
    
  </div>

</div>


<script type='text/javascript'>

var _ues = {
host:'zis.userecho.com',
forum:'10024',
lang:'ru',
tab_corner_radius:9,
tab_font_size:16,
tab_image_hash:'0J7RgdGC0LDQstC40YLRjCDQvtGC0LfRi9Cy',
tab_alignment:'left',
tab_text_color:'#FFFFFF',
tab_bg_color:'#1F69B1',
tab_hover_color:'#6A9BCB'
};

(function() {
    var _ue = document.createElement('script'); _ue.type = 'text/javascript'; _ue.async = true;
    _ue.src = ('https:' == document.location.protocol ? 'https://s3.amazonaws.com/' : 'http://') + 'cdn.userecho.com/js/widget-1.4.gz.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(_ue, s);
  })();

</script>



<!-- Yandex.Metrika counter -->
<div class="c4"><script type="text/javascript">
(function(w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter11658109 = new Ya.Metrika({id:11658109, enableAll: true});
        }
        catch(e) { }
    });
})(window, "yandex_metrika_callbacks");
</script></div>
<script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript" defer="defer"></script>
<noscript><div><img src="//mc.yandex.ru/watch/11658109" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>

</html>