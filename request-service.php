<?php
include '../conn.php';
$index = $_GET['id'];

$sql = "SELECT * FROM service_table where service_index='$index'";
        $result = $conn->query($sql);
        if($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                
                $type=$row['service_type'];			
		
            }
        }


?>

<html>
<head><title>Reserve Service</title></head>

<form method = "POST" action="request-confirm.php" enctype="multipart/form-data">
<input type="hidden" value="<?php echo $index?>" name="index" >


<label>Insert Name: </label>
<input type="text" name="fllname"><br>

<label>Insert Time: </label><br>
<label>12:00 PM <input type="radio" name="time" value="12:00:00"></label><br>
<label>12:30 PM <input type="radio" name="time" value="12:30:00"></label><br>
<label>1:00 PM <input type="radio" name="time" value="13:00:00"></label><br>
<label>1:30 PM <input type="radio" name="time" value="13:30:00"></label><br>
<label>2:00 PM <input type="radio" name="time" value="14:00:00"></label><br>
<label>2:30 PM <input type="radio" name="time" value="14:30:00"></label><br>
<label>3:00 PM <input type="radio" name="time" value="15:00:00"></label><br>
<label>3:30 PM <input type="radio" name="time" value="15:30:00"></label><br>
<label>4:00 PM <input type="radio" name="time" value="16:00:00"></label><br>
<label>4:30 PM <input type="radio" name="time" value="16:30:00"></label><br>

<label>Service Type: </label>
<input readonly type="text" name="service_type" value="<?php echo $type?>"><br>

<label>Image Upload (Optional)</label>
<input type="file" name="file" id="file"><br>

<input type="submit" value="Confirm" name="submit">

</form>

<button type="reset" class="btn btn-warning btn-s" onClick="window.location.href='serviceDisplay.php'">Back</button>

</html>