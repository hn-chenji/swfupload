<?php

	// Work-around for setting up a session because Flash Player doesn't send the cookies
	if (isset($_POST["PHPSESSID"])) {
		session_id($_POST["PHPSESSID"]);
	}
	session_start();

	// The Demos don't save files
	$dir = dirname(__FILE__); 
	define('ROOT_PATH', realpath($dir));

	$uploads_dir = ROOT_PATH.'/upload';
	if ($_FILES["Filedata"]["error"] == 0) {
		$name = $_FILES["Filedata"]["name"];
		$tmp_name = $_FILES["Filedata"]["tmp_name"];

		$save_path = $uploads_dir.'/images/';
		//检查目录
		if (@is_dir($save_path) === false) {
			echo "上传目录不存在。";
		}
		//检查目录写权限
		if (@is_writable($save_path) === false) {
			echo "上传目录没有写权限。";
		}

		if (!file_exists($save_path)) {
			mkdir($save_path);
		}

		$ym = date("Ym");
		$save_path .= $ym . "/";
		if (!file_exists($save_path)) {
			mkdir($save_path);
		}
		//新文件名
		$new_file_name = date("YmdHis") . '_' . rand(10000, 99999) ;
		$ext=strrchr($name,".");
		//移动文件
		move_uploaded_file($tmp_name, "$save_path/$new_file_name.$ext");

		$img = '/upload/images/'.$ym.'/'.$new_file_name.$ext;
		echo $img;
	}
	exit(0);
?>