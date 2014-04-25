<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta charset="utf-8">
<title>SWFUpload Demos - Simple Demo</title>

<script type="text/javascript" src="../swfupload/swfupload.js"></script>
<script type="text/javascript">
		var swfu;

		window.onload = function() {
			var settings = {
				flash_url : "../swfupload/swfupload.swf",
				upload_url: "upload.php",
				post_params: {"xx" : "YES"},
				file_size_limit : "100 MB",
				file_types : "*.*",
				file_types_description : "All Files",
				file_upload_limit : 100,
				file_queue_limit : 0,
				debug: false,

				// Button settings
				button_image_url: "images/TestImageNoText_65x29.png",
				button_width: "65",
				button_height: "29",
				button_placeholder_id: "spanButtonPlaceHolder",
				button_text: '<span class="theFont">选择文件</span>',
				button_text_style: ".theFont { font-size: 12; }",
				button_text_left_padding: 8,
				button_text_top_padding: 4,
				
				upload_complete_handler: uploadComplete,
				file_dialog_complete_handler: fileDialogComplete
			};
			var statusE = document.getElementById('divStatus');
			function uploadComplete(file) {
				statusE.innerHTML = '文件['+file.name+']结束上传';
				this.setButtonDisabled(false);//恢复上传按钮
			}
			function fileDialogComplete(selectedNum, queuedNum) {
				if (queuedNum > 0) {//选择并添加到上传队列的文件数大于0
					this.startUpload();//开始上传
					this.setButtonDisabled(true);//禁用上传按钮
				}
			}
			swfu = new SWFUpload(settings);
	     };
	</script>
</head>
<body>


<div id="content">


	
			<div id="divStatus"></div>
			<div>
				<span id="spanButtonPlaceHolder"></span>
				<input type="button" onclick="swfu.startUpload();" value="上传" /></div>
			</div>


</div>
</body>
</html>
