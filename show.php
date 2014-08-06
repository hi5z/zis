<html>
<head></head>

<body>

<?php 
@include 'config.php';

///////////////////////////////////

$a = $_GET['a'];

$userid2 = $_GET['user'];

///////////////////////////////////




$query4=mysql_query("SELECT exten, name, razmer FROM images WHERE link = '$a'");

$row4=mysql_fetch_array($query4);
$d = $row4[razmer];

$c = $row4[name];
$b = $row4[exten];


$query04=mysql_query("SELECT * FROM users WHERE id = '$userid2'");

$row04=mysql_fetch_array($query04);

$pageowner=$row04['nick'];

if (isset($a) && ($b != null)) {include 'image.php';}
elseif (isset($userid2) && ($row04)) {include 'user.php';}

else {echo "Нет такой страницы!";
header("HTTP/1.0 404 Not Found");}

?>

</body>

</html>
