<?php
include '../conn.php';

$query = "select * from `active_table`";

$query_ = "SELECT *
FROM request_table
JOIN active_table ON request_table.request_id = active_table.request_id;";

$activeResult = mysqli_query($conn, $query);
$fetchResult = mysqli_query($conn,$query_);

?>

<style>
    table, th, td {
  border: 1px solid black;
}

</style>


<head><title>Employee Display</title></head>

<body>

<table>

                    <tr>
                        <td>
                            <h1>Service Type</h1>
                        </td>
                        <td>
                            <h1>Customer Name</h1>
                        </td>
                        <td>
                            <h1>Time</h1>
                        </td>
                        <td>
                            <h1>File Upload</h1>
                        </td>
                    </tr>

                    <tr>
                        <?php
                            while($row = mysqli_fetch_assoc($fetchResult)){
                        ?>

                            <td><?php echo $row['service_type'] ?></td>
                            <td><?php echo $row['customer_name'] ?></td>
                            <td><?php echo $row['timestamp'] ?></td>
                            <td><a href="<?php echo $row['file_upload'] ?>"><img src="<?php echo $row['file_upload'] ?>" width="15px"
                            , height="15px";></a></td>
                            <td><a class="btn" href="remove-active.php?id=<?php echo $row['active_index'] ?>">Delete</a></td>
                        </tr>
                        <?php
                            }
                        ?>

                    </table>

