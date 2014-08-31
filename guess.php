<?php
function displayGuess($idarticle)
{
	global $db;
	echo "<div class='page_right'>";
	$arr = array();
	$rows3 = array();
	$e = escapeshellcmd($idarticle);
	exec("c++\MIS $e",$arr);
	if(count($arr)<8)
	{
		$flag = count($arr);
	}
	else
	{
		$flag = 8;
	}
	for($i=0;$i<$flag;$i++)
	{
		$result = $db->query("SELECT * FROM articles where idarticle=$arr[$i]");
		$rows3[] = $result->fetch_assoc();
	}
	echo "猜你喜欢：<ul>";
	foreach ($rows3 as $row) {
?>
	<li>
		<a href="index.php?id=<?php echo $row['idarticle'] ; ?>">
			<?php echo mb_substr($row['title'],0,12,'utf-8');?></a>
			<?php if (strlen($row['title'])>15)
					{
						echo "&hellip;";
					}
			?>
	</li>

<?php
	}
	echo "</ul></div>";
}
?>