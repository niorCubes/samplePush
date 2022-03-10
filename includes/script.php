<?php
    require_once 'dbh-inc.php';

    if (isset($_POST["submit"])){

        $imageName = $_POST["input1"];
        $filename = $final_file = $file_type = "";
		$file_size = 0;
		if(isset($_FILES["image"]["name"])){
			$filename = basename($_FILES["image"]["name"]);
			$file = file_get_contents($_FILES["image"]["tmp_name"]);
			$final_file = base64_encode($file);
			$file_type = $_FILES["image"]["type"];
			$file_size = $_FILES["image"]["size"];

		}

        $insImageName = "INSERT INTO imagename (image_name) VALUES (?);";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $insImageName)) {
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $imageName);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        $imageNameID = mysqli_insert_id($conn);

        if ($insImageName) {
            $insertImage = "INSERT INTO imagestorage(image_name_ID, image, file_name, fileType, fileSize) VALUES ('$imageNameID', '$final_file', '$filename', '$file_type', '$file_size')";
            $run_query = mysqli_query($conn, $insertImage);
        }

        session_start();
        $_SESSION["locationFromDB"] = $imageName;
        $_SESSION["lastID"] = $imageNameID;

        // $sampleVariable = $_SESSION["locationFromDB"];
        echo $_SESSION['locationFromDB'];
        header ("location: ../show_image.php?success");
        exit();
        
        // $location = $_POST["input1"];
        // $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

        // $query = "INSERT INTO locationdetails(images, myPlace) VALUES ('$file', '$location')";
        // $run_query = mysqli_query($conn, $query);

        // session_start();
        // $lastID = mysqli_insert_id($conn);
        // $_SESSION["locationFromDB"] = $location;
        // $_SESSION["lastID"] = $lastID;
        

       
        // $sampleVariable = $_SESSION["locationFromDB"];
        // echo $_SESSION['locationFromDB'];
        // header ("location: ../index.php?success");
        // exit();
    }

    else{
        header("Location: ../index.php?error");
        echo("Error Inserting data!");
    }