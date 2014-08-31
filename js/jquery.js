$(document).ready(function(){
	$('#message-box').mouseover(function(){
		$('#message').animate({width:"260px"},'slow');
		$('.place').show('slow');
	});
	$('body').children().not('#message').click(function(){
		$('.place').hide('slow');
                $('#message').animate({width:"0px"},'slow');
	});
	
	$('#concern').click(function (){ flushMan("concern");display($('#list-linkman'));});
	$('#starch').click(function (){ flushMan("starch");display($('#list-linkman'));});
	$('#private').click(function (){ display($('#COM-linkman'));});
	$('#addFriends').click(function (){display($('.add'));});
	function display(node){
		$('#message').children().not('.select').css('display','none');
		node.css('display','block');
	}
	function displayMsgWin(){
		$('#message').animate({width:"260px"},'slow');
		$('.place').show('slow');
	}
	//搜索用户框键盘弹起事件
	$('input.acount').keyup(function (){
		$('.result').empty();
		var str = $(this).val();
		str = str.replace(" ","");
		if(str=="")
		{
			$('.place ul').empty();
			return;
		}
		$.post("/message/linkman.php",{suggest:str},function (data,textStatus){
			$('.place ul').empty();
			for(var item in data){

				$('.place ul').append("<li>"+data[item]+"</li>");
			}
			var child = $('.place ul').children();
			for(var i=0;i<child.length;i++){

				$(child[i]).click(function(){

					$('input.acount').val($(this).html());
					$('.place ul').empty();
					search();
				});
			}
		},'json');
	});
	//搜索用户按钮事件
	$('input.btn_search').click(function(){search();});
	function search(){
		var str = $('input.acount').val();
		$('.place ul').empty();
		str = str.replace(" ","");
		if(str=="")
		{
			$('.result').html("用户名不能为空");
			return;
		}
		else
		{
			var jqxhr = $.post("/message/selectman.php",{suggest:str},function (data,textStatus){
				if(data==null)
				{
					$('.result').html("没有此用户！");
					return;
				}
				
				$('.result').empty();
				$('.place ul').empty();
				for(var item in data)
				{
					$('.result').append('<p>'+data[item]+'</p>');
				}
				$('.result').append("<input class='btn_add' type='button' value='关注'/>");
				$('.result .btn_add').click(function (){
					addFriends();
				});
			},'json');
		}
	}
	//添加用户
	function addFriends(){
		var str = $('input.acount').val();
		var jqxhr = $.post("/message/addFriends.php",{suggest:str},function (data,textStatus){
			if(data=="false")
			{
				$('.result').html("添加失败");
				return;
			}
			else if(data=="true")
			{
				$('.result').html("添加成功");
			}
		});
	}
	//显示聊天内容
	function displayChatLog(node){
		var str = node.children('.iduser').text();
		$('textarea.record').val("");
		var jqxhr = $.post("/message/chatLog.php",{suggest:str},function(data,textStatus){
			for(var item1 in data)
			{
				var json = data[item1];
				var iduser1 = json['iduser1'];
				var iduser2 = json['iduser2'];
				var date = json['date'];
				var contents = json['contents'];
				var friends;
				if(iduser1==str)friends = node.children('.nickname').text();
				else friends = "我";
				var message = $('textarea.record').val();
					message += "\n"+friends+"::"+date+"\n";
					message += contents+"\n";
				$('textarea.record').val(message);
					
			}
		},'json');
	}
	//给用户列表添加事件
	function addUserEvent(node)
	{
		if($('ul.list-infor'))
		{
			var child = node.children('ul').children();
			for(var i=0;i<child.length;i++){
				
				$(child[i]).click(function(){
					
					if($('.chat .one-linkman').html()==($(this).html()))
					{
						node.css('display','none');
						$('.chat').css('display','block');
						return;
					}
					else{
						changeNum($(this).children('.list-infor').children('.iduser').text());
						$('.chat .one-linkman').html($(this).html());
						displayChatLog($(this).children());
						node.css('display','none');
						$('.chat').css('display','block');
					}
				});
			}
		}
	}
	//发送消息事件
	$('.send').click(function (){

		var str1 = $('textarea.send-message').val();
		var friends = $('.one-linkman ul li').first().next().text();
		if(str1=="" || friends=="")return;

		$.post("/message/sendMsg.php",{suggest:friends,message:str1},function (data,textStatus){
			if(data=="false")
			{
				alert("发送失败");
				return;
			}
			else if(data=="true")
			{
				var str2 = $('textarea.record').val();
				
				var str3 = "\n"+"我::"+getDate()+"\n";
				str3 += str1;
				str3 += "\n";
				str3 = str2+str3;
				
				
				$('textarea.record').val(str3);
				$('textarea.send-message').val("");
			}
		});
	});
	//以yyyy-mm-dd h:m:s格式返回日期
	function getDate(){
		var date = new Date();
		var Y = date.getFullYear();
		var M = date.getMonth()+1;
		var D = date.getDate();
		var h = date.getHours();
		var m = date.getMinutes();
		var s = date.getSeconds();
		return Y+"-"+M+"-"+D+" "+h+":"+m+":"+s;
	}
	flushMan("concern");
	//刷新联系人
	function flushMan(str)
	{
		$jqxhr = $.post("/message/flushMan.php",{suggest:str},function(data,textStatus){
			$('#listman').empty();
			for(var item3 in data)
			{
				var json = data[item3];
				var da  = "<li><ul class='list-infor'>";
				da += "<li class='nickname'><span class='username'>"+json['nickname']+"</span><span class='unreadNum'></span></li>";
				da += "<li class='iduser'>"+json['iduser']+"</li>";
				da += "<li class='hidden'>"+json['email']+"</li>";
				da += "</ul></li>";
				$('#listman').append(da);
				
			}
			addUserEvent($('#list-linkman'));
		},'json');
	}
	getCOM();
//获取所有交流过的人,即私信部分
	function getCOM()
	{
		$.post('/message/communication.php',{},function(data,textStatus){
			$('#COM-listman').empty();
			for(var item3 in data)
			{
				var json = data[item3];
				var da  = "<li><ul class='list-infor'>";
				da += "<li class='nickname'><span class='username'>"+json['nickname']+"</span><span class='unreadNum'></span></li>";
				da += "<li class='iduser'>"+json['iduser']+"</li>";
				da += "<li class='hidden'>"+json['email']+"</li>";
				da += "</ul></li>";
				$('#COM-listman').append(da);
				
			}
			addUserEvent($('#COM-linkman'));
		},'json');
	}	
	getMessageNum();
//轮询查阅用户消息,如果有则提醒用户
	function getMessageNum()
	{
		$.post('/message/unreadNum.php',{},function (data,textStatus){
			
			var man = person = $('#COM-listman li').first();
			var j = $('#COM-listman li').length;

			for(var item in data)
			{
				var json = data[item];
				var flag = true;
				for(var i=0;i<j;i++)
				{
					//如果用户存在列表中
					if(man.children().children('.iduser').html()==item)
					{
						//如果主人正在与该用户聊天并且该窗口处于显示状态
						if($('.chat .one-linkman').html()==man.html()&&$('.chat').css('display')=='block')
						{
							displayChatLog(man.children());
							MsgPrompt();
							checkMsgPrompt();
						}
						else
						{
							var unreadNode = man.children().children('.nickname').children('.unreadNum');
							//如果该用户消息没有增加则不更新
							if(unreadNode.text()==("消息+"+json['num']))
							{}
							else
							{
								unreadNode.text("消息+"+json['num']);
								MsgPrompt();
							}
						}
						flag=false;
						break;
					}
					else
					{
						man = man.next();
					}
				}
				//如果用户不在列表中,刷新私信列表
				if(flag)
				{	
					getCOM();
				}
				man = person;
			}
		},'json');
		setTimeout(getMessageNum,20000);
	}
//当收到新消息时消息盒子会通过变换字体大小\颜色\透明度来提醒用户,同时私信也会相应改变
function MsgPrompt(){
	var box = $('#message-box');						
	box.css('color','red');
	box.animate({width:'30px',fontSize:'20px',opacity:'0.1'},"slow");
	box.animate({width:'20px',fontSize:'16px',opacity:'1'},"slow");
	var box = $('#private');
	box.css('color','red');
	box.animate({opacity:'0.1'},"slow");
	box.animate({opacity:'1'},"slow");
}
//当用户读取消息时改变私信中的信息条数
function changeNum(id){
	var child = $('#COM-listman').children();
	for(var i=0;i<child.length;i++){
		var node = $(child[i]).children();
		var iduser = node.children('.iduser').text();
		if(iduser==id)
		{
			node.children('.nickname').children('.unreadNum').text("");
		}
	}
	checkMsgPrompt();
}
//查看是否还有未读消息,如果没有则将私信和消息盒子重置为正常状态
function checkMsgPrompt(){
	var child = $('#COM-listman').children();
	for(var j=0;j<child.length;j++){
		var node = $(child[j]).children();
		var msg = node.children('.nickname').children('.unreadNum').text();
		if(msg)
		{
			return;
		}
	}
	$('#message-box').css('color','black');
	$('#private').css('color','black');
}
/*****************************************right-posts.php私信******************************************************/
rightPostsSendMsg();
//给专家列表添加事件处理,当用户点击专家时自动进入会话状态
function rightPostsSendMsg(){
	
	var child = $('#list-science').children();
	child.click(function (){
		var node = $(this);
		$.post('/message/checkLogin.php',{},function(data,textStatus){
			if(data=="false")
			{
				location.href="/users/login.php";
			}
			else
			{
				if($('.chat .one-linkman').html()==node.html())
				{
					display($('.chat'));
					displayMsgWin();
					return;
				}
				else{
					changeNum(node.children().children('.iduser').text());
					$('.chat .one-linkman').html(node.html());
					displayChatLog(node.children());
					display($('.chat'));
					displayMsgWin();
				}
			}
		});
	});
	
}
});

