<?php
	require('../require.php');
	$str = $_POST['suggest'];
	if(!get_magic_quotes_gpc())
	{
		$str = addslashes($str);
	}
	$sql="select email from user where email like '$str%' limit 5;";
	$result = $db->query($sql);
	if($result)
	{
		$rows = array();
		while($row=$result->fetch_assoc())
		{
			$rows[] = $row['email'];
		}
		$data = json_encode($rows);
		echo $data;
	}
?>
