
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">

<head>
    <?


$aroww = mysql_query("SELECT views FROM images WHERE link='$a'") or
die(mysql_error());


$arow = mysql_fetch_array($aroww);
$views = $arow[views]+1;


mysql_query("UPDATE images SET views = '$views' WHERE link='$a'");


/////////////////////////////////////////////////////
$query01=mysql_query("SELECT * FROM images WHERE link = '$a'");
$row01=mysql_fetch_array($query01); 

$checkp = $row01[p];
$ktozalil = $row01[uniq_id];
/////////////////////////////////////////////////////

if ($checkp != '0')
    {
echo '<META NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW">';
}
?>
    
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><? echo $c; ?> <? echo '['.$d.']'; ?> - #<? if (isset($a) && ($b != null)){ echo $a; } else { echo 'Empty...';} ?></title>
<link rel="stylesheet" type="text/css" href="/main.css" />
<link rel="shortcut icon" href="/icon.ico" type="image/x-icon" />


<script src="http://userapi.com/js/api/openapi.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" language="JavaScript">
//<![CDATA[

        function highlight(field) {

        field.focus();

        field.select();

}
//]]>
</script>

<script type="text/javascript">
//<![CDATA[
  window.___gcfg = {lang: 'ru'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
//]]>
</script>
<style type="text/css">
/*<![CDATA[*/
 img.c5 {position:absolute; left:-9999px;}
 div.c4 {display:none;}
 table.c3 {width: 50%; height: 70%; margin: auto;}
 iframe.c2 {border:none; overflow:hidden; width:90px; height:21px;}
 div.c1 {text-align: center;}
 div.l1 {text-align: left;}
 td.c1 {text-align: center;}
 div.c2 {text-align: center; width: 800;}
/*]]>*/
</style>
</head>

<body>
    
<!-- BAR -->
<table class="bar" width="100%" border="1" style="position:static; top:0px; text-align:right; color: white;">
    <tr><td height="35px">
 <?
@include 'topbar.php'; ?>
    </td></tr>
</table>
    <!-- /BAR -->    
    
<h1><a href="/">Логотип</a></h1>


<table class="c3" border="0">
   <tr>
       <td>&nbsp;</td>
   </tr>
   
   
   <tr>
       <td class="c1">
                <a target="_blank" href="<? echo $url.$papka.$a.'.'.$b ?>">
                    <img width="70%" src="<? echo $url.$papka.$a.'.'.$b ?>" alt="Ваша картинка" />
                </a>
       </td>
   </tr>
   
   <tr>
       <td>&nbsp;</td>
   </tr>
    
    <tr>
       <td><div class="c1">
      <? 
           if ($ktozalil!=NULL){
            echo 'Загрузил: <STRONG>'.$ktozalil.'</STRONG>&nbsp;&nbsp;';
           } else {
               echo 'Загрузил: <STRONG>Аноним</STRONG>&nbsp;&nbsp;';
           }
           echo 'Просмотров: <STRONG>'.$views.'</STRONG>&nbsp;&nbsp;';
           echo 'Разрешение картинки: <STRONG>'.$d.'</STRONG>&nbsp;&nbsp;';
           
           ?>
           </div></td>
   </tr>
    
    <tr>
       <td>&nbsp;</td>
   </tr>
    <tr>
        <td>
            <div class="c1">

<div class="c1"><a href="https://twitter.com/share" class="twitter-share-button c2">Твитнуть</a> <script type="text/javascript">
//<![CDATA[
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
//]]>
</script> <a id="vk_like"></a> <script type="text/javascript">
//<![CDATA[
  VK.init({apiId: 2735045, onlyWidgets: true});
//]]>
</script> <script type="text/javascript">
//<![CDATA[
VK.Widgets.Like("vk_like", {type: "button", height: 20, pageImage: '<? echo $url.$papka.$a.'.'.$b ?>', pageTitle: 'ZIS-картинка, размер - <? echo $d ?>'});
//]]>
</script>

<div class="g-plusone"></div>

<iframe src="//www.facebook.com/plugins/like.php?href=<? echo $url.$papka.$a.'.'.$b ?>&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=181620375247891" scrolling="no" frameborder="0" class="c2"></iframe></div>

            </div>
        </td>
    </tr>

    <tr>
        <td> 
        <div class="c1"><strong>Ссылка на превью</strong><br />
            <input type='text' class='ramk' onclick='highlight(this);' value="<? echo $url.$a ?>" />
        </div>
            <br />
      <!--  <div class="c1"><strong>Прямая ссылка на картинку</strong><br />
            <input type='text' class='ramk' onclick='highlight(this);' value="<? echo $url.$papka.$a.'.'.$b ?>" />
        </div> -->

        </td>
    </tr>

  
<tr>
    <td>&nbsp;</td>
</tr>


      <tr>
          <td class="c1" id="vk_comments">
 <script type="text/javascript">
  VK.init({apiId: 2735045, onlyWidgets: true});
</script>
<script type="text/javascript">
VK.Widgets.Comments("vk_comments", {limit: 10, width: "496", attach: "*"}, <? echo $a; ?>);
</script>     


        </td>
      </tr>


</table>


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