<?php
	include('../require.php');
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	if (!get_magic_quotes_gpc())
	{
		$email = addslashes($email);
		$password = addslashes($password);
	}
	$query = "call testUser('$email','$password');";
	$result = $db->query($query);
	if (!$result)
	{
		displayPrompt("系统故障，程序猿们正在奋力抢修，稍后请重试");
	}
	$num_result = $result->num_rows;
	if ($num_result==0)
	{
		displayPrompt("用户名或密码错误！");
	}
	else
	{
		$result->close();
		$db->next_result();
		$result = $db->query("call selectUser('$email');");
		if (!$result||!($num_result = $result->num_rows))
		{
			displayPrompt("系统提了一个问题，程序猿们正在奋力抢修，稍后请重试");
		}
		else
		{
			$row = $result->fetch_assoc();
			$_SESSION['email']=new Person($row['iduser'],$email,$row['nickname'],$row['rank']);
			echo"<script type='text/javascript'>location='/index.php';</script>";
		}
	}
?>
