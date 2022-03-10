<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Get PHP Session Variable into JS</title>
</head>
<body>
    <center>
        <?php
             require_once 'includes/dbh-inc.php';

            $lastId = $_SESSION["lastID"];

            $sql = "SELECT * FROM imagestorage WHERE image_name_ID = $lastId";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result)) {
                // $finalImage = $row["image"];
                echo "<img src='images/jpeg" .$row['image']."'/>";
                // echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>';
                echo  "<p>".$row['file_name']."</p>";
            }

        ?>
    </center>
</body>
</html>