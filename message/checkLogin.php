<?php
	require('../require.php');
	//检测用户是否登录
	if(isset($_SESSION['email']))
	{
		echo "true";
	}
	else
	{
		echo "false";
	}
?>
