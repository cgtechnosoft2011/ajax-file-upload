<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="jquery.min.js"></script>
<script src="ajaxupload.3.5.js"></script>
<script>
$(document).ready(function(){
	
$(function(){
		var btnUpload	=	$('#upload_2');
		var randId		=	Math.random();
		var status		=	$('#status');
		//var j = $('#no_img').val();
		//var i = '';
		new AjaxUpload(btnUpload, 
			{
				action: 'http://localhost/sites/uploadimagebyajax/uploader.php',
				name: 'uploadfile',
				data: 
				{
					example_key1 : randId		    
				},
				onSubmit: function(file, ext)
				{
				 	if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext)))
					{ 
						// extension is not allowed 
						alert('Only JPG, PNG or GIF files are allowed');
				   	$("#status").hide();
						status.text('Only JPG, PNG or GIF files are allowed');
						return false;
					}
					//status.text('Uploading...');
					$("#myno_2").html('<img id="status" src="ajax-loader1.gif" />');
				},
				onComplete: function(file, response)
				{
					alert("response: "+response);
					$("#myno_2").html('<img id="status" src="ajax-loader1.gif" />');
					//On completion clear the status
					//$("#status").hide();
					//Add uploaded file to list
					if(response!="error")
					{
						$('#upload_2').text('Change');
						$("#myno_2").html('<img id="img_2" src="'+response+'?rand='+randId+'" alt="" />');
						$("#myno_2").append('<canvas id="canvas2"></canvas>');
						$("#dname_2").val(response);
					} 
					else
					{
						$("#myno_2").html('<span style="line-height:55px; padding-left:5px;">Error!</span>');
						$("#del_2").hide();
						$("#dname_2").val('');
						
					}
				}
		});
	});	
	
});
</script>
</head>
<body>

<div class="mybutton" id="upload_2" style="width:100px;height:25px;background-color:#dadada;">Browse</div>
<img id="status" style="display:none;" src="ajax-loader1.gif" />
<div class="upload-pic" id="myno_2"><span style="line-height:55px; padding-left:5px;">Image 2</span></div>
<input type="text" id="dname_2" name="" value="">


<!--<div class="rotate" id="myop_2">

  <img onclick="rotme(2)" id="rotate_2" style="cursor:pointer; display:none;" alt="rotate" src="http://dynamicwebsite.co.in/grnfleaold/public/images/rotate.png"><img id="del_2" onclick="delme(2)" style="cursor:pointer; display:none;" alt="delete" src="http://dynamicwebsite.co.in/grnfleaold/public/images/del.png">
  <input type="hidden" id="cim_2" name="s_image2" value="">
  <input type="hidden" id="dname_2" value="">
  <input type="hidden" id="rot2" name="rot2" value="">
</div>-->

</body>
</html>