<?php
include("../require.php");
include('UploadPhoto.php');
displayHead();
$ftype = $_FILES['file']['type'];
$fname = $_FILES['file']['name'];
$fsize = $_FILES['file']['size'];
$ftmp_path = $_FILES['file']['tmp_name'];
$ferror = $_FILES['file']['error'];

$person=$_SESSION['email'];
$email=$person->getElement('email');
$name = $person->getElement('name');
$iduser = $person->getElement('iduser');
$dir="upload/".$email."/";

$format = array("image/gif","image/jpeg","image/pjpeg","image/png");

$upload = new UploadPhoto($ftype,$fname,$fsize,$ftmp_path,$ferror,$db);
$upload->setElement('format',$format);
$upload->setElement('max_size',1024*1024*2000);

if ($upload->testError()&&$upload->testSize()&&$upload->testFormat()){
		if($upload->savePhoto($iduser,$dir)){
			$upload->skipTo(2,'publish.php');
		}
		else{
			$upload->skipTo(2,'publish.php');
		}

}
else{
  	echo $_FILES["file"]["type"]."Invalid file";
}






/*
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 1024*1024*5))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
		if (!is_dir($dir))
		{
			mkdir($dir);
		}
		$being_timestamp = strtotime('2014-05-03');
		$time = explode(' ', microtime());
		print_r($time);
		$id = ($time[1]-$being_timestamp).sprintf('%06',substr($time[0],2,6));
		
		$suffix = explode('/',$_FILES['file']['type']);
		if (count($suffix)>1){$suffix = $suffix[1];}
		else{$suffix = $suffix[0];}
		$address = $dir."/".$id.".".$suffix;
		$length = $_FILES["file"]["size"];
		$title = $_FILES["file"]["name"];
		/
		 idphoto     | int(11)
		 iduser      | int(11)
		 title       | char(50)
		 description | char(200)
		 author      | char(50)
		 date        | datetime
		 address     | char(50)
		 length      | int(11)
		 sign        | bit(1)
		 idarticle   | int(11)
		 
		 in ema char(50),in tit char(50),in des char(200), in aut char(50),in ads char(50),in len int,in sig bit,in ida char(11)
		 /
		$result = $db->query("call insertPhotos('$iduser','$title',NULL,NULL,'$address','$length',1,NULL);");
		echo $db->errno.":".$db->error;
		if ($result){
			move_uploaded_file($_FILES["file"]["tmp_name"],$address);
			echo "Stored in: " . $_FILES["file"]["size"].$address;
		}
    }
  }
else
  {
  echo "Invalid file";
  }
  echo "<meta http-equiv='Refresh' content='0;url=publish.php' />";
  */
?>
