<a href="index.php">Kembali</a><br>
<?php
error_reporting(0);
include "database.php";
include "func_database.php";
if ($_FILES["fileImg"]) {
$target_dir = "uploads/";
// print_r($_FILES["fileImg"]);
$target_file = $target_dir . basename($_FILES["fileImg"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileImg"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileImg"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileImg"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileImg"]["name"]). " has been uploaded.";
        //menyimpan ke database
        $result=InsertImages($_FILES["fileImg"]["name"],$_POST['title'],$_POST['alttext']);
        // print_r($result);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>

<?php /*Update*/

								if ($_POST['id']) {
									$result=UpdateImages($_POST['id'],$_POST['title'],$_POST['alttext']);
									if ($result) {
										print "Updated";

									}
								}
							
							?>

