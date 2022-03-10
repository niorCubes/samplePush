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
    <!-- <script src="js\script.js" defer></script> -->
    <title>Get PHP Session Variable into JS</title>
</head>
<body>
    <center>
        <h1>Upload and fetch Image from DB EDIT</h1>
        <form action="includes/script.php" method="post" enctype="multipart/form-data">
            <input type="text" name="input1" id="input1" placeholder="Image Name" required>
            <input type="file" name="image" id="image">
            <button type="submit" id="submit" name="submit">Submit</button>
        </form>
        
        <!-- <input type="hidden" name="locationHolder" id="locationHolder" value="<?php echo $_SESSION["locationFromDB"]; ?>" style="display: none;"> -->
        <!-- <p id="output">
        </p> -->
    </center>
</body>
</html>