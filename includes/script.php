<?php
    require_once 'dbh-inc.php';

    if (isset($_POST["submit"])){
        $location = $_POST["input1"];
        $image = addslashes(file_get_contents($_FILES["image"]["tmp_name"])); 

        $sql = "INSERT INTO locationdetails(location, images) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $location, $image);
        mysqli_stmt_execute($stmt);
        
        $lastID = mysqli_insert_id($conn);
        mysqli_stmt_close($stmt);

        session_start();

        $_SESSION["locationFromDB"] = $location;
        $_SESSION["lastID"] = $lastID;

        
        $sampleVariable = $_SESSION["locationFromDB"];
        // $locationFromDB = $location;
        header ("location: ../index.php?success");
        exit();
        // echo $_SESSION['locationFromDB'];
    }

    else{
        header("Location: ../index.php?error");
        echo("Error Inserting data!");
    }