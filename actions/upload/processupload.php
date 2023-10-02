<?php
if (@session_start()) {
    
}
if(isset($_FILES["FileInput"]) && $_FILES["FileInput"]["error"]== UPLOAD_ERR_OK)
{
	############ Edit settings ##############
	$UploadDirectory	= ''; //specify upload directory ends with / (slash)
	##########################################

	if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
		die();
	}
	
	if ($_FILES["FileInput"]["size"] > 5242880) {
		die("File size is too big!");
	}
	
	switch(strtolower($_FILES['FileInput']['type']))
	{
		case 'image/png': 
		case 'image/gif': 
		case 'image/jpeg': 
		case 'image/pjpeg':
		case 'text/plain':
			case 'text/html': 
			case 'application/x-zip-compressed':
			case 'application/pdf':
			case 'application/msword':
			case 'application/vnd.ms-excel':
			case 'video/mp4':
			break;
			default:
			die('Unsupported File!'); 
		}

		$File_Name          = strtolower($_FILES['FileInput']['name']);
		$File_Ext           = substr($File_Name, strrpos($File_Name, '.')); 
		$Random_Number      = rand(0, 999999); 
		$NewFileName 		= $Random_Number.$File_Ext; 

		if(move_uploaded_file($_FILES['FileInput']['tmp_name'], $UploadDirectory.$NewFileName ))
		{
			$_SESSION['filename'] = $NewFileName;
			die('فایل با موفیت آپلود شد');
		}else{
			die('خطا در آپلود');
		}

	}
	else
	{
		die('Something wrong with upload! Is "upload_max_filesize" set correctly?');
	}