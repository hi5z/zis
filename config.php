<?php

$mysql_host = "hpage00.mysql.ukraine.com.ua";
$mysql_database = "hpage00_pichost";
$mysql_user = "hpage00_pichost";
$mysql_password = "ya6na5xs";

$link = mysql_connect("$mysql_host", "$mysql_user", "$mysql_password")
        or die("Could not connect : " . mysql_error());
		mysql_query('SET CHARSET UTF8');
mysql_query('SET NAMES UTF8');
    mysql_select_db("$mysql_database") or die("Could not select database");

    
$query1=mysql_query("SELECT * FROM admin WHERE name = 'pass'");
$query2=mysql_query("SELECT * FROM admin WHERE name = 'papka'");
$query3=mysql_query("SELECT * FROM admin WHERE name = 'filesize'");

$query8=mysql_query("SELECT * FROM images WHERE p = '0' ORDER BY id DESC LIMIT 5");


$language=strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2));


$row1=mysql_fetch_array($query1);
$row2=mysql_fetch_array($query2);
$row3=mysql_fetch_array($query3);

session_start();
if (!isset($_COOKIE['lang'])) {
    setcookie('lang',$language,time()+3600000);}
    
 if($_COOKIE["PHPSESSID"])
{
    setcookie("PHPSESSID", session_id(), time()+(3600 * 24 * 60 * 60)); }
   
   




$url="http://".$_SERVER['HTTP_HOST']."/";

$razmer="$row3[value]";
$papka="$row2[value]";
$ip = getenv ("REMOTE_ADDR");
$date = date("Y-m-d H:i:s"); 

$ca["category"] = array("nocat"=>"1", "funny"=>"2", "animals"=>"3", "politics"=>"4", "girls"=>"5", "lessons"=>"6", "scary"=>"7");




?>
