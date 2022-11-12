<?php
$path           = "media/";
$valid_ext      = array("png","jpg","jpeg","gif");
$eInvalid       = "Please upload only valid image file.";
$eWrongFormat   = "Please upload image (*.jpg, *.jpeg, *.png, *.gif) file Only";
$eNoFile        = "No files found for upload.";
if (!empty($_FILES['fileCust'])) {

    if (!file_exists('media')) {							// Check if directory exists.
		mkdir('media', 0777, true);
		chmod('media', 0777);
	}
    $oldName    = pathinfo($_FILES['fileCust']['name'],PATHINFO_FILENAME);
    $ext        = pathinfo($_FILES['fileCust']['name'],PATHINFO_EXTENSION);
    if(in_array($ext,$valid_ext)){
        if(getimagesize($_FILES["fileCust"]["tmp_name"])){
            $newName = $path.$oldName." - ".date('YmdHis.').$ext;
            move_uploaded_file($_FILES['fileCust']["tmp_name"],$newName); 
            echo json_encode(['uploaded' => $newName]);
        }else echo json_encode(['error' => $eInvalid]);
    } else echo json_encode(['error' => $eWrongFormat]);
}else echo json_encode(['error' => $eNoFile]);