<?php
include '../conn.php';
$target_dir = "../docs/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  //$check = getimagesize($_FILES["file"]["tmp_name"]);
  //if($check !== false) {
   //  $check["mime"] . ".";
   // $uploadOk = 1;
  } //else {
    //echo "File is not an image.";
    //$uploadOk = 1;
  //}
//}


if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "docx" && $imageFileType != "") {
  echo "Sorry, that file type is not allowed.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
 echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
  } else {
   // echo "Sorry, there was an error uploading your file.";
  }
}
#########################################################################################

$index = $_POST['index'];
$name = $_POST['fllname'];
$time = $_POST['time'];
$type = $_POST['service_type'];
$filename = $_FILES["file"]["name"];


$sql = "SELECT * FROM service_table WHERE Service_index='$index' ORDER BY Service_Index";
$result = $conn->query($sql);

if($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
             $id = $row['service_index'];
             $type = $row['service_type'];	
        }
    }

$id = $index + 1;

  $conn->query("INSERT INTO `request_table` SET  `request_id` = '$id',`customer_name` = '$name',
    `timestamp` = '$time', `service_type` = '$type' ,`file_upload` = '$target_file'");
    echo "                  Service Added Successfully.";

?>

<html><head><title>Request Confirmation</title></head>

<body><br><a href="customer-ui.php">Back</a></body>




</html>