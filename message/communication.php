<?php
	require('../require.php');
	//检测用户是否登录
	if(isset($_SESSION['email']))
	{
		//获取用户身份信息
		$Person = $_SESSION['email'];
		$iduser = $Person->getElement('iduser');
		//查询信息表中的信息
		//格式化信息并返回给用户
		$sql = "select iduser,email,nickname from user where (iduser in (select iduser1 from message where iduser2 = $iduser group by iduser1)) or (iduser in (select iduser2 from message where iduser1=$iduser group by iduser2));";

		$result = $db->query($sql);
		$rows = array();
		if($result)
		{
			while($row = $result->fetch_assoc())
			{ 
				$rows[$row['iduser']] = $row; 
			}
			echo json_encode($rows);
		}
	}
?>
