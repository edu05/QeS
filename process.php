<?php session_start();
		$user="root";
		$host="localhost";
		$password="";
		$connection = mysql_connect($host,$user,$password)
			or die ("couldn’t connect to server");
		$database = "qes";
		$db = mysql_select_db($database,$connection)
			or die ("Couldn’t select database");
$id = $_SESSION['k_UserId'];
    function assertValidUpload($code)
    {
        if ($code == UPLOAD_ERR_OK) {
            return;
        }
 
        switch ($code) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                $msg = 'Image is too large';
                break;
 
            case UPLOAD_ERR_PARTIAL:
                $msg = 'Image was only partially uploaded';
                break;
 
            case UPLOAD_ERR_NO_FILE:
                $msg = 'No image was uploaded';
                break;
 
            case UPLOAD_ERR_NO_TMP_DIR:
                $msg = 'Upload folder not found';
                break;
 
            case UPLOAD_ERR_CANT_WRITE:
                $msg = 'Unable to write uploaded file';
                break;
 
            case UPLOAD_ERR_EXTENSION:
                $msg = 'Upload failed due to extension';
                break;
 
            default:
                $msg = 'Unknown error';
        }
 
        throw new Exception($msg);
    }
 
    $errors = array();
 
    try {
        if (!array_key_exists('image', $_FILES)) {
            throw new Exception('Image not found in uploaded data');
        }
 
        $image = $_FILES['image'];
 
        // ensure the file was successfully uploaded
        assertValidUpload($image['error']);
 
        if (!is_uploaded_file($image['tmp_name'])) {
            throw new Exception('File is not an uploaded file');
        }
 
        $info = getImageSize($image['tmp_name']);
 
        if (!$info) {
            throw new Exception('File is not an image');
        }
    }
    catch (Exception $ex) {
        $errors[] = $ex->getMessage();
    }
 
    if (count($errors) == 0) {
        // no errors, so insert the image
		$check = mysql_query("SELECT UserId FROM images WHERE UserId = $id");
		$checkrow = mysql_fetch_row($check);
		echo $checkrow."<br>".$checkrow[0];
		if(!$checkrow[0]){
			$query = sprintf(
				"insert into images (filename, mime_type, file_size, file_data,UserId)
					values ('%s', '%s', %d, '%s',$id)",
				mysql_real_escape_string($image['name']),
				mysql_real_escape_string($info['mime']),
				$image['size'],
				mysql_real_escape_string(
					file_get_contents($image['tmp_name'])
				)
			);
	 
			mysql_query($query, $connection);
	 
			// finally, redirect the user to view the new image
			header('Location: main.php');
			exit;
		}
		else{
			$del = mysql_query("DELETE FROM images WHERE UserId=$id");
			$query = sprintf(
				"insert into images (filename, mime_type, file_size, file_data,UserId)
					values ('%s', '%s', %d, '%s',$id)",
				mysql_real_escape_string($image['name']),
				mysql_real_escape_string($info['mime']),
				$image['size'],
				mysql_real_escape_string(
					file_get_contents($image['tmp_name'])
				)
			);
	 
			mysql_query($query, $connection);
			header('Location: main.php');
			// finally, redirect the user to view the new image
			
			exit;
		}
	}
?>
<html>
    <head>
        <title>Error</title>
    </head>
    <body>
        <div>
            <p>
                The following errors occurred:
            </p>
 
            <ul>
                <?php foreach ($errors as $error) { ?>
                    <li>
                        <?php echo htmlSpecialChars($error) ?>
                    </li>
                <?php } ?>
            </ul>
 
            <p>
                <a href="main.php">Try again</a>
            </p>
        </div>
    </body>
</html>