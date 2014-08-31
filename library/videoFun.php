<?php
function displayVideoMiddle(){
		global $person;
		global $db;
		$result = $db->query("call getVideos(7)");
		$num=0;
		if($result->num_rows>0){
			while(($row = $result->fetch_assoc()))
				{
					$num++;
					if($num==7){
						$center = "last_center";
					}
					else{
						$center = "";
					}
					$iduser = $row['iduser'];
					$author = $row['author'];
					$title = $row['title'];
					$address = $row['address'];
					if ($author=="")
					{
						$author = $iduser;
					}
					$str = basename($address,'.mp4');
					$poster = dirname($address).'/'.$str.'.jpg';
?>
		<div class='p_wall '>
        	<div class="yk-col8 <?php echo $center;?>">
                <div class="preview">
                    <div class="v-thumb">
                    	<img alt="<?php echo $title;?>" src="<?php echo $poster;?>">
                    </div>
                    <div class="v-link">
                    	<a title="<?php echo $title;?> " target="video" data-from="1-1" href="look.php?ads=<?php echo $address;?>"></a>
                    </div>
                	<div class="v-meta font4"  onmouseover="displayInfo(this)" onmouseleave="hideInfo(this)">
                        <div class="v-meta-title">
                            <a target="video" data-from="1-1" href="#"><?php echo $title;?></a>
                        </div>
                    	<div id = "info1" class="v-meta-entry">
                            <a class="v-username" target="_blank" data-from="1-1" href="#">
                                <i class="ico-user"></i><?php echo $author;?>
                            </a>
                            <i class="ico-statplay" title="播放"></i>
                            <span class="v-num">346</span>
                            <i class="ico-statcomment" title="评论"></i>
                            <span class="v-num">1,282</span>
                            <span class="v-meta-target" role="button"><a href="look.php?ads=<?php echo $address;?>">播放</a></span>
                        </div>
                	</div>
                	<a class="v-meta-play" target="video" data-from="1-1" href=""></a>
                    
                </div>
            </div>
	</div>
<?php
			}
		}
    }
function displayVideoRight()
{
?>
<?php
}	
	function lookVideo(){
		global $person;
		global $db;
		$iduser = $person->getElement('iduser');
		$time = explode(' ', microtime());
		$time = date("Y-m-d H:i:s",($time[1]-60));
		$sql = "select address from videos where iduser='$iduser' and date >'$time'  order by date desc limit 1; ";
		$result = $db->query($sql);
		if($result->num_rows>0){
		$rows = $result->fetch_assoc();
		$address = $rows['address'];
		$str = basename($address,'.mp4');
		$poster = dirname($address).'/'.$str.'.jpg';
?>
                 	<video class="video" controls poster="<?php echo $poster;?>">
          			  <source src="<?php echo $address?>" type="video/mp4"/>
                      Your browser does not support HTML5 video.
                    </video>
<?php
		}
}
	function displayVideoPublishMiddle()
	{
?>
        <div class="body">
            <div class="publish_photo" >
            	<div class="upload_photo_show">
			<div class="video-publish" style="text-align:center;">
                     <?php lookVideo();?>
		 </div> 
                    <div class="search_file">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
				<?php
					$data  = "<input id='text' class='file_text' type='text' />";
					$data .= "<input class='upload_submit' type='submit' name='submit' value='上传' />";
					$data .= "<input class='upload_button' type='button' value='浏览' />";
					$data .= "<input type='hidden' name='MAX_FILE_SIZE' value='2000000000' />";
					$data .= "<input class='file' type='file' name='file' id='file'  onchange='change(this.value)'/>";
					echo $data;
				?>
                        </form>
                    </div>
                </div>
			</div>
         </div>
        
<?php 
	}

	function displayVideo($ads){
		$str = basename($ads,'.mp4');
		$poster = dirname($ads).'/'.$str.'.jpg';
?>
            <div class="body">
            	<div class="publish_photo" >
                    <div class="upload_photo_show">
                        <div style="text-align:center;">
                            <video class="video" controls poster="<?php echo $poster;?>">
                              <source src="<?php echo $ads?>" type="video/mp4"/>
                              Your browser does not support HTML5 video.
                            </video>
                        </div> 
                    </div>
                </div>
	    </div>
 <?php
	}
