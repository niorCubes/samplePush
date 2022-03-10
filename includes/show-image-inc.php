<?php
    session_start();
    require_once 'dbh-inc.php';

    if (isset($_POST['submit'])) {
        $locationID = $_POST['search'];

        $sql = "SELECT * FROM imagestorage WHERE locationID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $locationID);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_array();
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['fileContent']).'"/>';

        header ("location: ../show_image.php");

        // header("Content-type: image/jpg"); 
        // echo $img['fileContent']; 
        
        // if(isset($_GET['image_id'])) {
        //     $sql = "SELECT imageType,imageData FROM output_images WHERE imageId=" . $_GET['image_id'];
        //     $result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
        //     $row = mysqli_fetch_array($result);
        //     header("Content-type: " . $row["imageType"]);
        //     echo $row["imageData"];
        // }
        // mysqli_close($conn);

    }
    else {
        echo "Not found!";
    }