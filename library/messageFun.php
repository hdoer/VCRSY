<?php
function displayMessage()
{	
?>
<div id="message-box">消息</div>
<div id="message" >
	<div id="list-linkman">
		<ul id="listman">
		
		</ul>
	</div>
	<div id="COM-linkman">
		<ul id="COM-listman">
		
		</ul>
	</div>
	<div class="chat">
		<label class="one-linkman"></label>
		<textarea class="record"></textarea><textarea class="send-message" type="text"></textarea>
		<label class="send" type="button" >发送</label>
	</div>
	<div class="add">
		<label class="prompt">添加朋友</label>
		<div class="place">
			<input class="acount" type="text" placeholder="输入账号" /><input class="btn_search" type="button" value="搜索" />
			<ul></ul>
			<div class="result"></div>
		</div>
	</div>
	<div class="select">
		<ul>
			<li id="concern">关注</li>
			<li id="starch">粉丝</li>
			<li id="private">私信</li>
			<li id="addFriends">添加</li>
		</ul>
	</div>
<div>

</div>
</div>

<?php
}
?>
