<?PHP

$ext = explode(".",urldecode($_FILES['uploadfile']['name']));
$ext = array_pop($ext);
$new_name = substr(md5(time()),0,6).".".$ext;
if(copy($_FILES['uploadfile']['tmp_name'],$new_name)){
	echo $new_name; 
} else {
	echo $output = 'error';
}


