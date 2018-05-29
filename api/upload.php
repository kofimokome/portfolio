<?php
    session_start();
    require_once("../includes/header.php");
    if(isset($_SESSION['id'])){
        $id=$_SESSION['id'];
    }
    else
    {
        echo '<script>window.location="../blog";</script>';
        die("please log in first");
    }
?>

<?php
$target_dir = "../profile/pics/users/";
$real_dir="pics/users/";
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . "{$id}.png";
$real_target=$real_dir . "{$id}.png";
echo $real_target;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check != false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
/*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
&& $imageFileType != "GIF") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $query="UPDATE users SET pic = '{$real_target}' WHERE ID = {$id}";
        $result=mysqli_query($con,$query);
        echo '<script>window.location="../profile";</script>';
        if(!$result){
            echo '<br /> picture location not known';
            die("please try uploading again");
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
