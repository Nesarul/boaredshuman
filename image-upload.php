<?php
if ( 0 < $_FILES['file']['error'] )
		echo 'Error: ' . $_FILES['file']['error'] . '<br>';
else 
{
	if (!file_exists('media')) {							// Check if directory exists.
		mkdir('media', 0777, true);
		chmod('media', 0777);
	}

	$td = "media/";	 										// Target Directory => Media
	//$tf = $td . basename($_FILES["file"]["name"]);		// Target File name 
	$file = pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME);

	$tf = $td . $file." - ".date('YmdHis.').
	pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);	// Date time is the target file name.

	
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($tf,PATHINFO_EXTENSION));

	$check = getimagesize($_FILES["file"]["tmp_name"]);		// Check it is an image file. 
	if($check !== false)
		$uploadOk = 1;
	else {
		echo "File is not an image.";
		$uploadOk = 0;
	}
	
	if (file_exists($tf)) {									// Check if file already exists
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}

	if ($_FILES["file"]["size"] > 1048576) {            	// max size 1 mb
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0)
			echo "Sorry, your file was not uploaded.";
	else {
		if (move_uploaded_file($_FILES["file"]["tmp_name"], $tf))
			echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
		else 
		echo "Sorry, there was an error uploading your file.";
	}
}