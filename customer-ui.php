<?php
include '../conn.php';

$query = "select * from service_table";
$serviceResult = mysqli_query($conn, $query);


?>

<style>
    table, th, td {
  border: 1px solid black;
}

</style>


<head><title>Service Display</title></head>

<body>

<table>

                    <tr>
                        <td>
                            <h1>Service ID</h1>
                        </td>
                        <td>
                            <h1>Service Type</h1>
                        </td>
                    </tr>

                    <tr>
                        <?php
                            while($row = mysqli_fetch_assoc($serviceResult)){
                        ?>

                            <td><?php echo $row['service_id'] ?></td>
                            <td><?php echo $row['service_type'] ?></td>
                            <td><a class="btn" href="request-service.php?id=<?php echo $row['service_index'] ?>">Reserve</a></td>
                        </tr>
                        <?php
                            }
                        ?>

                    </table>

