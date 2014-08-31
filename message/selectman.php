<?php
	require('../require.php');
	$str = $_POST['suggest'];
	if(!get_magic_quotes_gpc())
	{
		$str = addslashes($str);
	}
	$sql="select iduser,email,nickname from user where email = '$str'";
	$result = $db->query($sql);
	if($result)
	{
		$row=$result->fetch_assoc();
		$data = json_encode($row);
		echo $data;
	}
?>
