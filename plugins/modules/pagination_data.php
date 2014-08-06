<?php

include('config.php');

$per_page = 9; 

if($_GET)
{
$page=$_GET['page'];
}



//get table contents
$start = ($page-1)*$per_page;
$sql = "select * from images order by id limit $start,$per_page";
$rsd = mysql_query($sql);
?>


	<table width="70%" border="0">
		
		<?php
		//Print the contents
		
		while($row = mysql_fetch_array($rsd))
		{
			
			$id=$row['id'];
                        $link=$row['link'];
                        $exten=$row['exten'];
                        $name=$row['name'];
                        $ip=$row['ip'];
                        $owner=$row['uniq_id'];
                        $razmeradmin=$row['razmer'];
                        $views=$row['views'];

		?>
		<tr>
                    <td style="color:#B2b2b2; padding-left:4px" width="30px"><?php echo $id; ?></td>
                    <td align="center"><a target="_blank" href="<?php echo $url.$link; ?>"><img height="150px" src="<?php echo $url.$papka.$link.'.'.$exten; ?>" /></a></td>
                    <td align="center">
                        Имя файла: <?php echo $name; ?><br />
                        Кто загрузил: <?php if ($owner!=NULL) {echo $owner;} else {echo Anonymous;} ?> (<a target="_blank" href="http://ip-lookup.net/index.php?ip=<?php echo $ip; ?>" title="IP адрес"><?php echo $ip; ?></a>)<br />
                        Разрешение: <?php echo $razmeradmin; ?><br />
                        Просмотров: <?php echo $views; ?><br />
                        <a href="<? echo 'pagination.php?func=delete&name='.$link.'.'.$exten.'&id='.$id; ?>">[Удалить]</a>
                    
                    </td>
                </tr>
		<?php
		} //while
		?>
	</table>

