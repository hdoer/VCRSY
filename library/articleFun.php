<?php
function displayEditor()
{
?>
<div class="page">
	<script src="../ckeditor/ckeditor.js">
	</script>
	<form>
		<textarea name="editor1" id="editor1" rows="10" cols="80">
		This is my first editor!Thank myself!
		</textarea>
		<script type="text/javascript">
		   CKEDITOR.replace( 'editor1', {
	extraPlugins: 'codesnippet',
	codeSnippet_theme: 'monokai_sublime'
} );
		</script>
	</form>
</div>
<?php
}
function displayArticleMiddle()
{
?>
<div id="a1" style="display:block">
				<?php displayEmbellish("a1.jpg");?>
				<div>
					<div class="article_title font3">原来我不是一棵植物 我是一只动物</div>
					<div class="article_message">
						<div class="author">作者:韩寒</div>
						<div class="clearfloat"></div>
					</div>
					<div class="article_content article_p">

						<p>这么多年来，一直是我脚下的流沙裹着我四处漂泊，它也不淹没我，它只是时不时提醒我，你没有别的选择,否则你就被风吹走了。我就这么浑浑噩噩地度过了我所有热血的岁月，被裹到东，被裹到西，连我曾经所鄙视的种子都不如。</p>

						<p>一直到一周以前，我对流沙说，让风把我吹走吧。</p>

						<p>流沙说，你没了根，马上就死。</p>

						<p>我说，我存够了水，能活一阵子。</p>

						<p>流沙说，但是风会把你无休止地留在空中，你就脱水了。</p>

						<p>我说，我还有雨水。</p>

						<p>流沙说，雨水要流到大地上，才能够积蓄成水塘，它在空中的时候，只是一个装饰品。</p>

						<p>我说，我会掉到水塘里的。</p>

						<p>流沙说，那你就淹死了。</p>

						<p>我说，让我试试吧。</p>

						<p>流沙说，我把你拱到小沙丘上，你低头看看，多少像你这样的植物，都是依附着我们。</p>

						<p>我说，有种你就把我抬得更高一点，让我看看普天下所有的植物，是不是都是像我们这样生活着。</p>

						<p>流沙说，你怎么能反抗我。我要吞没你。</p>

						<p>我说，那我就让西风带走我。</p>
					</div>
					<div class="support">
						<span class="support_image"><img src="../images/support.jpg" style="height:18px;width:18px;"/>12</span>
						<span class="publish_date"><img src="../images/time.jpg" style="height:18px;width:18px;"/> 2014-05-27</span>
					</div>
				</div>
			</div>
			<div id="a2" style="display:none">
				<?php displayEmbellish("a2.jpg");?>
				<div>
					<div class="article_title font3">小妹</div>
					<div class="article_message">
						<div class="author">作者:许耀方</div>
						<div class="clearfloat"></div>
					</div>
					<div class="article_content article_p" >

						<p>今天写写我妹，许诺。</p>
						 
						<p>她不曾出现在我的任何一篇文章里，但与我相熟的朋友都知道这个孽障。她对于我的意义，便是使我排除了YY小说里任何关于乱伦诱惑的干扰，无忧无虑地度过了健康的青春期。</p>
						 
						<p>说实话，如果你也有个小你两岁，打光着屁股就开始抡着鼻涕抢玩具争宠夺爱、打翻醋坛子互相挤兑，撕烂了脸从床上打到地上再滚下楼梯磕破了脑袋，被她掐哭，被她告刁状，被她举报揭发我早恋，被她搞各种大新闻，然后终于熬到她青春期，出落得亭亭玉立肤如凝脂的时候，你也会像我一样，满眼都是她熊孩子时的影子。</p>
						 
						<p>父亲是公务员，小妹是以父亲一己之力，不，是合我妈二人之力偷着生的。户口找人落的，从小学到初中高中，一直到她已经上了大学，终于尘埃落定。</p>
						 
						<p>爸妈给她取了一个美丽温柔的名字，可她如今还没学会温柔。</p>
						 
						<p>在青春期猝不及防的某一瞬间，我突然发现她——自己的妹妹，还挺好看的。</p>
						 
						<p>我当时便对她说，咱爹娘为了生你，已经用完了老子一生的运气。</p>
						 
						<p>她撇嘴无视我的自黑：“人丑多作怪，你丑你的独木桥，我美我的阳关道，关我什么事？”</p>
						 
						<p>我说：“你妈的！”她运了一口气，我感觉不妙。</p>
						 
						<p>“妈——哥又说你坏话——”</p>
						 
						<p>脆生生的，亮晶晶的，我的小妹。</p>
					</div>
					<div class="support">
						<span class="support_image"><img src="../images/support.jpg" style="height:18px;width:18px;"/>12</span>
						<span class="publish_date"><img src="../images/time.jpg" style="height:18px;width:18px;"/> 2014-05-27</span>
					</div>
				</div>
			</div>
			<div id="a3" style="display:none">
				<?php displayEmbellish("a3.jpg");?>
				<div>
					<div class="article_title font3">人无再少年 </div>
					<div class="article_message">
						<div class="author">作者:姬霄</div>
						<div class="clearfloat"></div>
					</div>
					<div class="article_content article_p" >

						<p>“我以为那天我不会流泪，只是风很大，吹得眼睛也睁不开了。我站在学校后门的石桥边上，难过得想一死了之，但徘徊了一整个下午，到底也没能鼓起勇气。直到日暮西沉，风也不知何时停了下来。我忽然想起该吃晚饭了，于是，我终于找准方向，向学校的食堂走去……”</p>

						<p>在前往云城的大巴上，你声情并茂地向粥粥描述自己第一次失恋那天的场景。还没讲完，粥粥就扑嗤一声笑了：“你的心理活动也太跌宕起伏了，可以拿去拍情景喜剧了。”</p>

						<p>你辩解道，可这都是事实啊，你的记忆甚至可以具体到你和子青分手的那一秒钟。听到你这么说，粥粥不说话了，只是带着诡异的笑容望向你，像是问，都过去多久啦，你怎么还记得这茬事呀。</p>

						<p>你还想解释，但前排座位上忽然有人晕车，吐了一地，臭味在狭窄的车厢里弥漫开来。粥粥紧跟着骂了一句，像乌龟似的把脑袋缩进了衣领里。于是你只好将剩下的半截话压在舌底，眯着眼向车窗外望去。</p>

						<p>说起你和子青，就不得不说你们共同经历的中学时代。那是一个从头到脚都散发荷尔蒙气息的年龄，你们年轻而愚蠢，没人思考一段感情是否合适，有无未来，恋爱的唯一条件就是彼此喜欢。那时的你情窦初开，她年少爱笑，两个人成为情侣可以说顺理成章。</p>

						<p>然而少年的恋爱不仅拥有灿烂的美好，还充满了矫情和自我。</p>

						<p>时过境迁，当你重新审视这份恋爱棋局中的关系。如果当时子青的同桌不是你，如果子青那天回家时你没有邀请她坐上你的自行车后座，如果子青因为小考失利躲在楼顶哭泣时，没有撞上偷偷跑去抽烟的你。那么你和子青还会在一起吗？</p>

						<p>你没有敢继续往下想，虽然与朋友在K歌房欢唱时也会缠绵悱恻地唱“冥冥中遇上她，倦极也不痛”，但时光已经让你清楚地明白，青春的爱恋之所以近乎完美，是因为那其中包含了太多一厢情愿的幻想。</p>
					</div>
					<div class="support">
						<span class="support_image"><img src="../images/support.jpg" style="height:18px;width:18px;"/>12</span>
						<span class="publish_date"><img src="../images/time.jpg" style="height:18px;width:18px;"/> 2014-05-27</span>
					</div>
				</div>
			</div>
			<div id="a4" style="display:none">
				<?php displayEmbellish("a4.jpg");?>
				<div>
					<div class="article_title font3">礼物的守护</div>
					<div class="article_message">
						<div class="author">作者:蒋话</div>
						<div class="clearfloat"></div>
					</div>
					<div class="article_content article_p" >
						<p>细雨。</p>
						<p>九月，初秋。天气骤然转凉，路上行人都换上较厚外衣。</p>
						<p>炉斧酒吧内，东墙贴着嫣红的杀手排行榜。墙边座位上，坐着两男一女。</p>
						<p>“我前女友是跨栏运动员。”嘉旻猛灌口酒，“三个月前，她劈腿，爱上别人。”</p>
						<p>“劈腿……是练跨栏的缘故？”小琪问，绑着粉色丝带的马尾，像个高中生。</p>
						<p>“……”嘉旻被这突如其来的吐槽弄得一时语塞。</p>
						<p>小琪身边的长发男则一脸冷漠听着嘉旻叙述，不时喝一口桌上的香草奶昔。</p>
						<p>长发男名叫叶小枪，杀手排行榜位列第二，仅次于柯刀。</p>
						<p>叶小枪二了太久太久，他急于摆脱这一不利地位。柯刀利用年假去南美看羊驼，再吊儿郎当下去，榜首位置很可能拱手让人。</p>
						<p>叶小枪用的是再普通不过的M40A2狙击步枪，却能在几百米外轻易取人性命。</p>
						<p>静如石佛、苛刻自我。</p>
						<p>叶小枪不能容忍失败，狙击精准如制导导弹，出道十年从未失手，所有目标皆一枪毙命。</p>
						<p>如果杀手界还有柯刀战胜不了的对手，那就是叶小枪。</p>
						<p>王牌杀手总有怪癖，叶小枪也不例外。每年，他只为狙击枪准备十发子弹，子弹告罄，雇主出价再高也拒不接受。</p>
						<p>任务在身的当天，叶小枪会戴上白色手套，清早就到炉斧酒吧，不再点奶昔只喝烈酒，直到日上正中，手执黑色皮箱前往猎杀地点，即使路途再遥远，也会赶在夜幕降临前回来。</p>
					</div>
					<div class="support">
						<span class="support_image"><img src="../images/support.jpg" style="height:18px;width:18px;"/>12</span>
						<span class="publish_date"><img src="../images/time.jpg" style="height:18px;width:18px;"/> 2014-05-27</span>
					</div>
				</div>
			</div>
			<div id="a5" style="display:none">
				<?php displayEmbellish("a5.jpg");?>
				<div>
					<div class="article_title font3">心太软</div>
					<div class="article_message">
						<div class="author">作者:李莹</div>
						<div class="clearfloat"></div>
					</div>
					<div class="article_content article_p" >
						<p>我爸有病，神经衰弱癫狂症，别人家孩子对比综合效应，习惯性打击儿童心理诱因，总之就是一句话都说不到点子上。</p>

						<p>当年高考前夜最关键的时候跟我说，算了你也别瞎费劲了，估计也考不上啥好大学，明年复读算了。</p>

						<p>大学毕业学车临考前一天，我比高考还紧张，练了一冬天右手都冻伤了，想跟他这个老司机讨教一下。人家缓缓丢出一句，现在电子考严，反正大不了你再重学一轮，又不用另外交钱。弄得人好不容易鼓起的勇气全部丧失殆尽。</p>

						<p>是的，我爸就是这么一个让人泄气的父亲。</p>

						<p>去年难得几天小假，我带着男朋友千里迢迢回了趟家。本着新女婿第一次上门的张扬态度，浮夸地给他买了三条上千的烟，提了两瓶好酒。提前一星期就通知了他。结果一进门，我爸不见踪影。</p>

						<p>忙忙碌碌饭菜上桌，我爸才晃晃悠悠地回来，我白了他一眼，没说话，饭吃得闷闷不乐。</p>

						<p>吃完饭我跟我妈收拾桌子，不知道我爸跟男朋友聊了些啥，看起来挺开心。聊完我爸上班去了，我俩坐了一夜火车累毙了，倒头就睡。睡了一半我爸回来拿东西，一推门我一个激灵就醒了，坐在床上脑袋发蒙，心里直打鼓，想的全是，完了，我爸看到我和他睡一张床了。</p>

						<p>虽然我初中就开始早恋的种种劣迹我爸心知肚明，但如此明目张胆还是第一次。我受到了惊吓，想起我爸从几年前就开始辣手摧花般毁掉我的爱情美梦，我心里有些忐忑。我一早恋被发现我爸就会暗暗嘟囔一句，你这没戏。也怪我不争气，每次都被他说中。不过想想，我这男朋友北京人，家里二环有房，他和他妈都待我特好，够可以了吧？</p>
					</div>
					<div class="support">
						<span class="support_image"><img src="../images/support.jpg" style="height:18px;width:18px;"/>12</span>
						<span class="publish_date"><img src="../images/time.jpg" style="height:18px;width:18px;"/> 2014-05-27</span>
					</div>
				</div>
			</div>
			<div id="a6" style="display:none">
				<?php displayEmbellish("a6.jpg");?>
				<div>
					<div class="article_title font3">我的王国</div>
					<div class="article_message">
						<div class="author">作者:里则林</div>
						<div class="clearfloat"></div>
					</div>
					<div class="article_content article_p" >
						<p>七岁那年，妈妈牵着我的手带我上小学，我问妈妈：“一节课40分钟有多久？”</p>

						<p>妈妈说：“你认真听老师讲课就很快很快，但你要是老想着下课就很久很久。”我点点头，就进去了。可是我有多动症，甚至没有办法短时间集中注意力，然后每节课就真的好久好久。</p>

						<p>一年级快结束的时候，我机关算计，极尽能事，才终于最后一批入了少先队，戴上了红领巾。戴上红领巾那天，我觉得是我人生中最快乐的一天。
						但是快乐没持续多久，我就去了上海。在上海我的红领巾又被取了下来，换上了绿领巾，我不服，老师给我的解释是，我们只能算“苗苗团”，要到三年级才能戴红领巾。</p>

						<p>并且到了上海我才知道，书包居然可以那么重，每天早上妈妈把上万斤的书包帮我背上肩膀以后，手在下面抬着，问我准备好没，我深呼吸一口说准备好了，然后妈妈放手，我就跪了下去，接着再爬起来，一步一脚印地上学去。但这并不影响我快乐成长。
						刚刚去上海那年，我连普通话都说不溜，然后我就直接说起了上海话，他们听不懂我说什么，我也不知道自己在说什么，我时而粤语，时而普通话，再凭着满嘴“十三点”“猪头三”，很快就和上海小伙伴打成了一片。</p>

						<p>不 久之后我基本成了孩子王，每天放学带着邻近几个小区里的一群孩子到处跑。我是总司令，跟一个小胖子特别要好，因为小胖子是疯的，我只要手指一指，大喊一声 “有敌人”，他就会义无反顾地边喊着“杀阿”边朝着一片虚无的空气冲去，一顿手舞足蹈，冲了上万公里之后才回头认真地跟我说：“报告总司令，敌人已经消灭 了，可以继续前进！”由于我颇为欣赏他这种认真的态度，然后他就成了副司令。</p>
						<p>我们这支部队主要存在的意义就是每天瞎逛，敌人基本上除了空气就是地上小昆虫。同住一栋楼的施阿姨每天站在三楼晾衣服，看着我们在楼下跑来跑去，总会问我：“泽林阿，又去打仗啊？”</p>
					</div>
					<div class="support">
						<span class="support_image"><img src="../images/support.jpg" style="height:18px;width:18px;"/>12</span>
						<span class="publish_date"><img src="../images/time.jpg" style="height:18px;width:18px;"/> 2014-05-27</span>
					</div>
				</div>
			</div>
			<div id="a7" style="display:none">
				<?php displayEmbellish("a7.jpg");?>
				<div>
					<div class="article_title font3">将军肚</div>
					<div class="article_message">
						<div class="author">作者:红肚兜儿</div>
						<div class="clearfloat"></div>
					</div>
					<div class="article_content article_p" >
						<p>他有一个将军肚，沉甸甸地向外凸起，腰带怎么系都不够长。</p>

						<p>他马上就要四十岁了。这个将军肚，一天一天悄无声息地长大，像有人偷偷在他肚子里塞了一把种子，吸收了消化成浆液状的食物，发芽，胀大，把他的肚皮拱起来，拱成一个在电扇下肥软的不停沁出汗珠儿的将军肚。他没有办法平躺着睡觉，因为肚子会压得他窒息。每天早晨，他在镜前穿一条商场里买回来的昂贵的西裤，肥大的裤腰张开嘴，吞进他的下半身。</p>
						<p>他每天开车上班，那辆车是他五年前买的夏利。在这个籍籍无名的北方小城市，他是庸碌人群中不起眼的一个。他在这里出生，长大，上了个不入流的职业中学，毕业后父母托关系给他找了个坐办公室的稳定工作。</p>

						<p>他20岁开始上班，最先学会的是喝酒，山呼海啸的大酒，把他淹透。从喝2瓶啤酒就晕眩，进化到连喝12瓶啤酒不用上厕所，他变成一座会呼吸的人肉酒窑。也吐，可吐出去的东西越多，肚子胀得越大。虽同指大肚子，他宁愿称其为将军肚，而非啤酒肚。前者听起来威风气派，后者怎么听都觉得市井小民。肚子里装的又岂止是啤酒，那里面的每一堆脂肪都是某一种酒的幻形。</p>

						<p>在酒桌上，他妙语连珠，目光锐利如炬，短粗的手指捏着酒杯，却能灵活地穿梭在杯盘人隙间，伺机说一个笑话逗众人开心，并不失时机地给上司拍马屁。只要有上司在的酒局，他喝酒从不耍滑，反而带着一股壮烈，上司端起酒杯沾一沾嘴唇，他就迅速地自动连干三杯，杯底一滴酒都不剩。他在庸俗的人际关系中如鱼得水，在一场又一场酒局中张大喉咙，让各种酒奔腾着冲入食管，在胃里泛起泡沫。只有稳稳地抓着酒杯，他才能感到自己在上司眼里稳稳地坐住一个位置。他已经习惯时刻观察别人脸色，像这个小城市里许多臃肿痴肥的中年人一样，靠着一点狡猾，波澜不惊地活下去。</p>

						<p>当然经常吐，吐得眼冒血丝，鼻涕飞溅，整个人像摊稀泥一样栽倒在路边。有时吐得猛烈，他会觉得自己的天灵盖裂开一个口子，多年积压的腐臭了的生活碎片喷涌而出，视线中的景物开始重影，像有一台掘土机在大脑里轰隆开动。他会有一瞬间的垂头丧气，真他妈没劲，他抹掉嘴边黏糊的食物残渣，一种类似绝望的东西像针一样扎他的心。恍惚间，他会想起曾经那个姑娘。</p>
					</div>
					<div class="support">
						<span class="support_image"><img src="../images/support.jpg" style="height:18px;width:18px;"/>12</span>
						<span class="publish_date"><img src="../images/time.jpg" style="height:18px;width:18px;"/> 2014-05-27</span>
					</div>
				</div>
			</div>
<?php
}
function displayArticleRight()
{
?>
<div class="ul4 ul_extend">
	<li onclick="displayArticle(1)">1</li>
	<li onclick="displayArticle(2)">2</li>
	<li onclick="displayArticle(3)">3</li>
	<li onclick="displayArticle(4)">4</li>
	<li onclick="displayArticle(5)">5</li>
	<li onclick="displayArticle(6)">6</li>
	<li onclick="displayArticle(7)">7</li>
</div>
<?php
}
function displayEmbellish($img)
{
?>
	<div class="black_board clearfloat">
    	<img width="100%" height="100%" src="/images/<?php echo $img;?>" />
    </div>
	<div class="line"></div>
<?php
}
function displayContent()
{
	if(isset($_SESSION['email']))
	{
		$person = $_SESSION['email'];
		$aiduser = $person->getElement('iduser');
	}
	else
	{
		$aiduser = 1;
	}
	global $db;
	$sql="select * from articles where idarticle='$idarticle'";
	$result = $db->query($sql);
	$rows = $result->fetch_assoc();
	$iduser =$rows['iduser'];
	$sql="select name from user where iduser='$iduser'";
	$result = $db->query($sql);
	$rows2 = $result->fetch_assoc();
	insertBrows($db,$aiduser,$idarticle);
	if($aiduser==1)
	unset($aiduser);
?>
<div>
	<div class="article_title font3"><?php echo $rows['title'];?></div>
    <div class="article_message">
    	<div class="author"><?php echo $rows2['name'];?></div>
    </div>
    <div class="article_content">
    	<pre class="pre">
		<?php echo $rows['content'];?>
	</pre>
    </div>
    <div class="support"><a class="font_color4" href="javascript:void(0)"><?php /*赞：12*/?></a> &nbsp <span><?php /*发表日期：2014-05-27*/ echo $rows['publish_date'];?></span></div>
    <?php displayPageTurn();?>
<?php
}
function displayPageTurn()
{
	global $db;
	$sql="select idarticle from articles limit 7";
	$result = $db->query($sql); 
	while($rows = $result->fetch_assoc())
	{
?>
	<a class="font_color4" href="index.php?idarticle=<?php echo $rows['idarticle'];?>"><?php echo $rows['idarticle'];?></a>
<?php
	}
echo "</div>";
}
?>
