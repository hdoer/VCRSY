<?php
	require('../require.php');
	if(isset($_SESSION['email']))
	{
		//获取用户请求
		$suggest = $_POST['suggest'];
		if(!get_magic_quotes_gpc())
		{
			$suggest = addslashes($suggest);
		}
		//获取用户id
		$Person = $_SESSION['email'];
		$iduser1 = $Person->getElement('iduser');
	
		//如果用户请求的是刷新关注窗口
		if($suggest == "concern")
		{
			$sql1 = "select iduser,email,nickname,sign from user,(select iduser2,sign from relation where iduser1 = '$iduser1') as man where iduser=iduser2;";
			$sql2 = "select iduser,email,nickname,sign from user,(select iduser1,sign from relation where iduser2 = '$iduser1' and sign = 1) as man where iduser=iduser1;";
		}
		//如果用户请求的是刷新粉丝窗口
		else
		{
			$sql1 = "select iduser,email,nickname,sign from user,(select iduser1,sign from relation where iduser2 = '$iduser1') as man where iduser=iduser1;";
			$sql2 = "select iduser,email,nickname,sign from user,(select iduser2,sign from relation where iduser1= '$iduser1' and sign = 1) as man where iduser=iduser2;";
		}
		$result1 = $db->query($sql1);
		$result2 = $db->query($sql2);
		$rows=array();
		if($result1&&$result2)
		{
			while($row = $result1->fetch_assoc())
			{
				$rows[$row['iduser']]=$row;	
			}
			while($row = $result2->fetch_assoc())
			{
				$rows[$row['iduser']]=$row;
			}
		}
		echo json_encode($rows);

	}	
?>
