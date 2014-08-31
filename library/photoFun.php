<?php
function displayPhotoMiddle()
{
/*		$result = $db->query("call getPhotos(7)");
		if($result->num_rows){
			while($rows = $result->fetch_assoc())
				{
					$iduser = $rows['iduser'];
					$author = $rows['author'];
					$title = $rows['title'];
					$address = $rows['address'];
					if ($author=="")
					{
						$author = $iduser;
					}
				}
*/
?>
<div class='p_wall '>
	<div class="body">
		<div class="publish_photo" >
			<div class="upload_photo_show">
				<img id="p" class='lookPhoto' src= 'upload/1.jpg' />
			</div>
		</div>
		<ul class="ul5">
			<li onclick="displayPhoto(1)"><div class="photo_border"><img src="/photo/upload/1.jpg" /></div></li>
		
			<li onclick="displayPhoto(2)"><div class="photo_border"><img src="/photo/upload/2.jpg" /></div></li>
		
			<li onclick="displayPhoto(3)"><div class="photo_border"><img src="/photo/upload/3.jpg" /></div></li>
			<li onclick="displayPhoto(4)"><div class="photo_border"><img src="/photo/upload/4.jpg" /></div></li>
			<li onclick="displayPhoto(5)"><div class="photo_border"><img src="/photo/upload/5.jpg" /></div></li>
			<li onclick="displayPhoto(6)"><div class="photo_border"><img src="/photo/upload/6.jpg" /></div></li>
			<li onclick="displayPhoto(7)"><div class="photo_border"><img src="/photo/upload/7.jpg" /></div></li>
		</ul>
		<div class="clearfloat"></div>
	</div>
</div>
<?php
}
function displayPhotoRight()
{
?>
<?php
}
function lookPhoto()
{
		global $person;
		global $db;
		$iduser = $person->getElement('iduser');
		$time = explode(' ', microtime());
		$time = date("Y-m-d H:i:s",($time[1]-60));
		$sql = "select address from photos where iduser='$iduser' and date >'$time'  order by date desc limit 1; ";
		$result = $db->query($sql);
		if($result->num_rows>0){
			while(($rows = $result->fetch_assoc()))
				{
					$address = $rows['address'];
					echo "<img class='lookPhoto' src= '$address' />";
				}
		}
	}
	function displayPhotoPublishMiddle()
	{
?>
        <div class="body">
            <div class="publish_photo" >
            	<div class="upload_photo_show">
			<div class="video-publish" style="text-align:center;">
                     <?php lookPhoto();?>
			</div>
                    <div class="search_file">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                        	<?php
					$data  = "<input id='text' class='file_text' type='text' />";
					$data .= "<input class='upload_submit' type='submit' name='submit' value='上传' />";
					$data .= "<input class='upload_button' type='button' value='浏览' />";
					$data .= "<input type='hidden' name='MAX_FILE_SIZE' value='5242880' />";
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
?>
