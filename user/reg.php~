<?php
	include_once("../config/conn.php");
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	if (!get_magic_quotes_gpc())
	{
		$name = addslashes($name);
		$email = addslashes($email);
		$password = addslashes($password);
	}
	$sql="call selectEmail('$email')";
	$result=$db->query($sql);
	if($result->num_rows)
	{
		displayPrompt("用户已存在");
	}
	else{
		$result->close();
		$db->next_result();
		$sql="insert into user values (NULL,'$email','$name','$password',now(),NULL);"; 
		$result=$db->query($sql);
		if(!$result){
			displayPrompt("注册失败，稍后请重试");
		}else{ 
			displayPrompt2("注册成功");
			$result = $db->query("call selectUser('$email')");
			if (!$result||!($num_result = $result->num_rows))
			{
				displayPrompt("系统提了一个问题，程序猿们正在奋力抢修，稍后请重试");
			}
			else
			{
				$row = $result->fetch_assoc();
				$_SESSION['email']=new Person($row['iduser'],$email,$row['nickname'],$row['rank']);
				?>
				<meta http-equiv='Refresh'content="0;url=/index.php"/>
				<?php
			}
		} 
	}
?>
