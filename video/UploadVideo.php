<?php
class UploadVideo {
	/**声明**/
	private $type,$name,$size,$tmp_path,$error,$db;
	private $max_size;
	private $id;
	
 	/*构造函数*/
	public function __construct($type,$name,$size,$tmp_path,$error,$db)
	{
		$this->type=$type;
		$this->name=$name;
		$this->size=$size;
		$this->tmp_path=$tmp_path;
		$this->error=$error;
		$this->db=$db;
	}
	/*设置元素*/
	public function setElement($element,$value){
		$this->$element=$value;
	}
	/*获取元素值*/
	public function getElement($element){
		return $this->$element;
	}
	/*测试文件大小是否符合规定*/
	public function testSize(){
		if ($this->size<$this->max_size)
		return true;
		return false;
	}
	/*测试上传文件是否发生错误*/
	public function testError(){
		if ($this->error>0)
		return false;
		return true;
	}
	/*保存电影*/
	public function saveVideo($iduser,$dir){
		if (!is_dir($dir))
		{
			mkdir($dir);
		}
		$newName = $this->setName($this->name);
		$address = $dir.$newName;
		if($this->insertVideo($iduser,$address)){
			echo move_uploaded_file($this->tmp_path,$address);
			echo "<br /><br/><br /><br/>上传成功：Stored in: ".$address;
			$this->poster($dir,$address);
			return true;
		}
		else{
			echo "<br /><br/><br /><br/>上传失败";
			return false;
		}
		
	}
	public function skipTo($time,$url){
		echo "<meta http-equiv='Refresh' content='$time;url=$url' />";
	}
	/*文件重命名*/
	public function setName($name){
		
		$being_timestamp = strtotime('2014-05-03');
		$time = explode(' ', microtime());
		$this->id = ($time[1]-$being_timestamp).sprintf('%06',substr($time[0],2,6));
	
		$suffix = explode('.',$name);
		if (count($suffix)>1){$suffix = $suffix[count($suffix)-1];}
		else{$suffix = $suffix[0];}
		$newName = $this->id.".".$suffix;
		return $newName;
		
	}
	/*将电影信息插入数据库*/
	public function insertVideo($iduser,$address){
		$length = $this->size;
		$title = $this->name;
		$result = $this->db->query("call insertVideos('$iduser','$title',NULL,NULL,NULL,NULL,'$length','$address',1);");
		if($result){
			$this->db->close();
			return true;
		}
		else{
			$this->db->close();
			return false;
		}
	}
	private function poster($dir,$address){
		$abdir = __DIR__;
		$ffinstance = new ffmpeg_movie("$abdir/$address");
		$ff_frame = $ffinstance->getFrame(180);
		$gd_img = $ff_frame->toGDImage();
		$img = "$abdir/$dir".$this->id.".jpg";
		imagejpeg($gd_img,$img);
	}
	
 }

?>