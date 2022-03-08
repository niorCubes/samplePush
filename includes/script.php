<?php
    require_once 'dbh-inc.php';

    if (isset($_POST["submit"])){
        
        // $image = addslashes(file_get_contents($_FILES["image"]["tmp_name"])); 
        $location = $_POST["input1"];
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

        $query = "INSERT INTO locationdetails(images, myPlace) VALUES ('$file', '$location')";
        $run_query = mysqli_query($conn, $query);

        session_start();
        $lastID = mysqli_insert_id($conn);
        $_SESSION["locationFromDB"] = $location;
        $_SESSION["lastID"] = $lastID;
        

       
        $sampleVariable = $_SESSION["locationFromDB"];
        echo $_SESSION['locationFromDB'];
        // $locationFromDB = $location;
        header ("location: ../index.php?success");
        exit();

        // if($run_query){
        //     // echo '<script>alert("Image Inserted into Database")</script>';

            
        // }

        // $sql = "INSERT INTO locationdetails(location, images) VALUES (?,?)";
        // $stmt = mysqli_stmt_init($conn);

        // if (!mysqli_stmt_prepare($stmt, $sql)) {
        //     header("location: ../index.php?error=stmtfailed");
        //     exit();
        // }

        // mysqli_stmt_bind_param($stmt, "ss", $location, $image);
        // mysqli_stmt_execute($stmt);
        
        // $lastID = mysqli_insert_id($conn);
        // mysqli_stmt_close($stmt);

        // session_start();

        
        // echo $_SESSION['locationFromDB'];
    }

    else{
        header("Location: ../index.php?error");
        echo("Error Inserting data!");
    }