<?php
    require_once "dbh-inc.php";

    if(isset($_GET['image_name_ID'])) {
        $sql = "SELECT fileType,image FROM output_images WHERE imageId=" . $_GET['image_name_ID '];
		$result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["fileType"]);
        echo $row["image"];
	}
	mysqli_close($conn);
?>