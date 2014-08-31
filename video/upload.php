<?php
include("../require.php");
include("UploadVideo.php");
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

$upload = new UploadVideo($ftype,$fname,$fsize,$ftmp_path,$ferror,$db);
$upload->setElement('max_size',1024*1024*2000);

if ($upload->testError()&&$upload->testSize()){
		if($upload->saveVideo($iduser,$dir)){
			$upload->skipTo(2,'publish.php');
		}
		else{
			$upload->skipTo(2,'publish.php');
		}

}
else{
  	echo $_FILES["file"]["type"]."Invalid file";
}
?>
