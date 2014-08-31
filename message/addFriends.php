<?php
	require('../require.php');
	//检测用户是否登录
	if(isset($_SESSION['email']))
	{
		//获取用户请求
		$friends = $_POST['suggest'];
		//预处理用户字符串
		if(!get_magic_quotes_gpc())
		{
			$friends = addslashes($friends);
		}
		//检查数据库中是否存在用户请求添加的人
		$sql = "select iduser from user where email='$friends';";
		$result = $db->query($sql);
		if($result)
		{
			if($row = $result->fetch_assoc())
			{
				$iduser2 = $row['iduser'];
				//如果存在，建立用户关系，否则，提醒用户关注失败
				$Person = $_SESSION['email'];
				$iduser1 = $Person->getElement('iduser');

				$sql = "select sign from relation where iduser1='$iduser2' and iduser2='$iduser1';";
				$result = $db->query($sql);
				if($result)
				{
					if($result->num_rows)
					{
						$row = $result->fetch_assoc();
						if($row['sign']==0)
						{
							$sql = "update relation set sign=1 where iduser1='$iduser2' and iduser2='$iduser1'";
							$result = $db->query($sql);
							if($result)
							{
								echo "true";
							}
							else
							{
								echo "false";
							}
						}
						else
						{
							echo "false";
						}
						
					}
					else
					{
				
						$sql = "insert into relation values('$iduser1','$iduser2',0,now());";

						$result = $db->query($sql);

						if($result)
						{
							echo "true";
						}
						else
						{
							echo "false";
						}
					}
				}
				else
				{
					echo "false";
				}
			}
			else
			{
				echo "false";
			}
		}
		else
		{
			echo "false";
		}
	}
	else
	{
		echo "false";
	}
?>
