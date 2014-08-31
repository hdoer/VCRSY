	function checkedEmail(node)
	{
		var reg = /^\w+@\w+(\.\w+)+$/;
		return checked(node,reg);
	}
	function checkedPassword(node)
	{
		var reg = /^\w{6,16}$/;
		return checked(node,reg);
	}
	function checkedName(node)
	{
		var reg = /^([\u4e00-\u9fa5]|[\w])([\u4e00-\u9fa5]|[a-zA-Z0-9_]){0,14}$/;
		return checked(node,reg);
	}
	
	function checked(inputNode,reg)
	{
		var b=false;
		var divNode = inputNode.parentNode.nextSibling.nextSibling;
		if (inputNode.value=="")
		{
			return b;
		}
		if (reg.test(inputNode.value))
		{
			divNode.style.display= "none";
			b=true;
		}
		else
		{
			divNode.style.display="block";
		}
		return b;
	}
	function checkedConfirm(node)
	{
		var b=false;
		var inputNode = document.getElementById("password_reg");
		if(inputNode.value!=node.value)
		{
			document.getElementById("confirmid_reg").style.display="block";
		}
		else
		{
			document.getElementById("confirmid_reg").style.display="none";
			b=true;
		}
		return b;
	}
	var checkedForm_login = function(node)
	{
		with(node)
		{
			if (checkedEmail(email)&&checkedPassword(password))
			{
				return true;
			}
			else
			{
				document.getElementById("submit_login").style.display="block";
				return false;
			}
		}
	}
	function hidden_login()
	{
		document.getElementById("submit_login").style.display="none";
	}
	function hidden_reg()
	{
		document.getElementById("submit_reg").style.display="none";
	}
	var checkedForm_reg = function(node)
	{
		with(node)
		{
			if (checkedName(name)&&checkedEmail(email)&&checkedPassword(password)&&checkedConfirm(confirm))
			{
				return true;
			}
			else
			{
				document.getElementById("submit_reg").style.display="block";
				return false;
			}
		}
	}
	function reg()
	{
		document.getElementById("login").style.display="none";
		document.getElementById("reg").style.display="block";
		document.getElementsByName("signup")[0].focus();
	}
	function login()
	{
		document.getElementById("login").style.display="block";
		document.getElementById("reg").style.display="none";
		document.getElementsByName("signin")[0].focus();
	}
	window.onload = function()
	{
		var eleheight =document.documentElement.clientHeight-38+"px";
		if (document.getElementById("login_reg")!=null)
		{
			document.getElementById("login_reg").style.height=eleheight;
		}
		if (document.getElementById("idaside")!=null)
		{
			document.getElementById("idaside").style.height=eleheight;
		}
		if (document.getElementById("idcontent_nav")!=null)
		{
			document.getElementById("idcontent_nav").style.height=eleheight;
		}
	}
	function displayInfo(node)
	{
		node.childNodes[1].nextSibling.nextSibling.style.display="block";	
	}
	function hideInfo(node)
	{
		node.childNodes[1].nextSibling.nextSibling.style.display="none";	
	}
	function change(value)
	{
		document.getElementById('text').value=value;
	}
	function login()
	{
		document.getElementById('login').style.display="block";
		document.getElementById('reg').style.display="none";
	}
	function reg()
	{
		document.getElementById('reg').style.display="block";
		document.getElementById('login').style.display="none";
	}
	function displayArticle(num)
	{
		for(var i=1;i<=7;i++)
		{
			if(i==num)
			{
				num="a"+num;
				document.getElementById(num).style.display="block";
			}
			else
			{
				nums="a"+i;
				document.getElementById(nums).style.display="none";
			}
		}
	}
	function displayPhoto(num)
	{
		for(var i=1;i<=7;i++)
		{
			if(i==num)
			{
				document.getElementById("p").src="upload/"+i+".jpg";
			}
		}
	}
	function displayPhotoWord(num)
	{
		for(var i=1;i<=7;i++)
		{
			if(i==num)
			{
				num="pw"+num;
				document.getElementById(num).style.display="block";
			}
			else
			{
				nums="pw"+i;
				document.getElementById(nums).style.display="none";
			}
		}
	}
