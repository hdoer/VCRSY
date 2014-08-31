<?php
include('messageFun.php');
include('homeFun.php');
include('articleFun.php');
include('photoFun.php');
include('videoFun.php');
$person = "";
function displayHead()
{
?>
<!DOCTYPE Html>
<html>
 <head>
  <title> V C R S D </title>
  <meta name="Keywords" content="" />
  <meta http-equiv="charset" content="utf8" />
  <meta http-equiv="content-type" content="text/html" charset="utf8" />
  <script src="/js/jquery-1.11.1.js"></script>
  <script src="/js/jquery.js"></script>
  <script type="text/javascript" src="/js/ligong.js" ></script>
  <link type="text/css" rel="stylesheet" href="/css/style.css"></link>
  <link rel="shortcut icon" href="../images/favicon.ico"></link>
  
 </head>

 <body>
	 <div class="nav bgcolor_nav">
		<ul class="ul1">
        	<li class="logo">
            	<a style="width:100%" href="/index.php">
            	<div class="font_color1 logo_name font1" > V C R S D </div>&nbsp;
            	</a>
				<img style="display:block;width:30px;height:25px;margin:-32px 8px auto auto;" src="/images/home_603811.png"></img>
            </li>
            <li><a class="font_color1" href="/article/index.php">文章</a></li>
            <li ><a class="font_color1" href="/photo/index.php">图片</a></li>
            <li><a class="font_color1" href="/video/index.php">视频</a></li>
            <li><a class="font_color1" href="javascript:void(0)">学习</a></li>
            <li><a class="font_color1" href="/active/index.html">活动</a></li>
            <li><a class="font_color1" href="javascript:void(0)">环保</a></li>
<?php
	if (!isset($_SESSION['email']))
	{
		displayLogin();
	}
	else
	{
		if (strpos($_SERVER['PHP_SELF'],"login_reg.php"))
		{
			echo "<script type='text/javascript'>location='index.php'</script>";
		}
		global $person;
		global $db;
		$person = $_SESSION['email'];
		$email = $person->getElement('email');
		$name = $person->getElement('name');
		$sql = "select portrait from user_extend where email=$email";
		$result=$db->query($sql);
		if (!$result)
		{
?>
			<div class="login_div">
                <li class="subItem">
                    <a class="font_color1" href="javascript:void(0)"><?php echo $name;?></a>
                    <ul class="ul1 bgcolor_nav"><li><a class="font_color1" href="/user/quit.php">退出</a></li></ul>
                </li>
                <li class="subItem">
                    <a class="font_color1" href="javascript:void(0)">发表</a>
                    <div class="clearfloat"></div>
                    <ul class="bgcolor_nav">
                    	<li><a class="font_color1" href="/article/publish.php">文章</a></li>
                        <li><a class="font_color1" href="/photo/publish.php">图片</a></li>
                        <li><a class="font_color1" href="/video/publish.php">视频</a></li>
                  	</ul>
                </li>
            </div>
		<?php
		}
		else
		{
			$row = $rows->fetch_assoc();
		?>
		<li><a href="javascript:void(0)"><?php echo $row['portrait'];?></a></li>
		<?php
		}
	}
?>
		</ul>
        <div class="clearfloat"></div>
	 </div>

	 <?php if(isset($_SESSION['email'])) displayMessage();?>
<?php
}
	function displayLogin()
	{
		if (strpos($_SERVER['PHP_SELF'],"login_reg.php")==false)
		{
?>
			<div class="login_div">
                <li><a class="font_color1" href="/user/login_reg.php?login_reg=login">登陆</a></li>
                <li ><a class="font_color1" href="/user/login_reg.php?login_reg=reg">注册</a></li>
            </div>
<?php
		}
	}
function displayHome()
{
?>
	<div class="page font_a">
		<div id="index_page_left" class="page_left"></div>
        <div class="page_middle">
		<?php 
			displayHomeMiddle();
			displayFoot();
		?>
        </div>
	<div id="index_page_right" class='page_right'>
		<?php displayHomeRight();?>
	</div>
        <div class="clearfloat"></div>
	</div>
<?php
}
function displayArticle()
{
?>
	<div class="page font_a">
		<div class="page_left"></div>
        <div class="page_middle">
		<?php
			displayArticleMiddle();
			displayFoot();
		?>
        </div>
	<div id="index_page_right" class='page_right'>
		<?php displayArticleRight();?>
	</div>
        <div class="clearfloat"></div>
	</div>
<?php
}
function displayPhoto()
{
?>
	<div class="page font_a">
		<div class="page_left"></div>
        <div class="page_middle">
		<?php
			displayPhotoMiddle();
			displayFoot();
		?>
        </div>
	<div id="index_page_right" class='page_right'>
		<?php displayPhotoRight();?>
	</div>
        <div class="clearfloat"></div>
	</div>	
<?php
}
function displayPhotoPublish()
{
?>
	<div class="page font_a">
		<div class="page_left"></div>
        <div class="page_middle">
		<?php
			displayPhotoPublishMiddle();
			displayFoot();
		?>
        </div>
	<div id="index_page_right" class='page_right'>
		<?php displayPhotoRight();?>
	</div>
        <div class="clearfloat"></div>
	</div>	
<?php
}
function displayVideoTest()
{
?>
	<div class="page font_a">
		<div class="page_left"></div>
        <div class="page_middle">
		<?php
			displayVideoMiddle();
			displayFoot();
		?>
        </div>
	<div id="index_page_right" class='page_right'>
		<?php displayVideoRight();?>
	</div>
        <div class="clearfloat"></div>
	</div>	
<?php
}
function displayVideoPublishTest()
{
?>
	<div class="page font_a">
		<div class="page_left"></div>
        <div class="page_middle">
		<?php
			displayVideoPublishMiddle();
			displayFoot();
		?>
        </div>
	<div id="index_page_right" class='page_right'>
		<?php displayVideoRight();?>
	</div>
        <div class="clearfloat"></div>
	</div>	
<?php
}
function displayLoginReg($login_reg)
{
	if($login_reg=="reg"){
		$reg="style='display:block'";
		$login="style='display:none'";
	}
	else{
		$reg="style='display:none'";
		$login="style='display:block'";
	}
?>
<div id="login_reg" class="login_rega">
<div >
	<div id="login" class="login" <?php echo $login;?>>
        <form action="login.php" method="post" autocomplete="off" onsubmit="return checkedForm_login(this)">
            <div class="font1 font_color1">登陆理工墙
            	<a class="a_right font_color1" name="signin" href="javascript:void(0)" onclick="reg()">去注册</a>
            </div>
            <div class="email">
            	<input type="email" name="email" placeholder="邮箱" required onblur="checkedEmail(this)" />
            </div>
            <div id="mailid_login" class="prompt1">邮箱格式错误</div>
            <div class="password">
            	<input type="password" name="password" placeholder="密码" required onblur="checkedPassword(this)"/>
            </div>
            <div id="passwordid_login" class="prompt1">密码格式错误：请确保密码由6-16位字母和数字组成</div>
            <div class="submit">
            	<input type="submit" value="登陆" onblur="hidden_login()"/>
            </div>
            <div id="submit_login" class="prompt1">请填写登陆信息</div>
        </form>
	</div>
	<div id="reg" class="reg" <?php echo $reg;?>>
        <form action="reg.php" method="post" autocomplete="off" onsubmit="return checkedForm_reg(this)">
            <div class="font1 font_color1">注册理工墙
            	<a class="a_right font_color1" name="signup" href="javascript:void(0)" onclick="login()">去登陆</a>
            </div>
            <div class="name">
            	<input type="text" name="name" placeholder="姓名" required onblur="checkedName(this)"/>
            </div>
            <div  id="nameid_reg" class="prompt1">姓名输入错误</div>
            <div class="email">
            	<input type="email" name="email" placeholder="邮箱" required onblur="checkedEmail(this)"/>
            </div>
            <div id="mailid_reg" class="prompt1">邮箱格式错误</div>
            <div class="password">
            	<input id="password_reg" name="password" type="password" placeholder="密码" required onblur="checkedPassword(this)"/>
            </div>
            <div id="passwordid_reg" class="prompt1">密码格式错误：请确保密码由6-16位字母和数字组成</div>
            <div class="confirm">
            	<input type="password" name="confirm" placeholder="确认" required onblur="checkedConfirm(this)"/>
            </div>
            <div id="confirmid_reg" class="prompt1">密码前后输入不一致</div>
            <div class="submit">
            	<input type="submit" value="注册" onblur="hidden_reg()"/>
            </div>
            <div id="submit_reg" class="prompt1">请填写注册信息</div>
        </form>
	</div>
</div>
<div class="desk_embellish"><img style="width:100%;height:100%" src="/images/2.png"/></div>
</div>
<?php
}
function displayFoot()
{
?>
<div class="foot">
	<ul class="ul2">
		<li class="font_color3">&copy;2014 VCRSD</li>
		<li><a class="font_color3"  href="javascript:void(0)">网站指南</a></li>
		<li><a class="font_color3"  href="javascript:void(0)">建议反馈</a></li>
		<li><a class="font_color3"  href="javascript:void(0)">加入我们</a></li>
		<li><a class="font_color3"  href="javascript:void(0)">法律协议</a></li>
	</ul>
</div>
<?php
}
 function insertBrows($db,$iduser,$idarticle){
	$ip = $_SERVER['REMOTE_ADDR'];
	$db->query("call addaread('$ip','$iduser','$idarticle');");
}
 ?>
