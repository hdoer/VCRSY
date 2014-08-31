<?php
/**
 *查找聊天记录
 *步骤：
 *1、验证是否登录
 *2、查找用户未读取的信息
 *3、如果没有未读取信息，查找聊天记录中的最近五条信息
 *4、格式化信息并返回给用户
*/
	require('../require.php');
	if(isset($_SESSION['email']))
	{
		$Person = $_SESSION['email'];
		$iduser = $Person->getElement('iduser');
		$friends = $_POST['suggest'];
		if(!get_magic_quotes_gpc())
		{
			$friends = addslashes($friends);
		}
		$sql = "select iduser1,iduser2,date,contents from message where (iduser1='$friends' and iduser2='$iduser') or (iduser1='$iduser' and iduser2='$friends') order by date"; 
		$result = $db->query($sql);
		if($result)
		{
			if($num=$result->num_rows)
			{
				$rows = array();
				while($row = $result->fetch_assoc())
				{
					$rows[] = $row;
				}
				$sql = "update message set accept=0 where iduser1='$friends' and iduser2='$iduser' and accept=1"; 
				$result = $db->query($sql);
				if($result)
				{}
			}
			echo json_encode($rows);
		}
	}

?>
