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
    <script src="js\script.js" defer></script>
    <title>Get PHP Session Variable into JS</title>
</head>
<body>
    <center>
        <h1>This is a sample scrip!</h1>
        <p>This is a sample subheading</p>
        <form action="includes/script.php" method="post" enctype="multipart/form-data">
            <input type="text" name="input1" id="input1" placeholder="Location" required>
            <input type="file" name="image" id="image">
            <button type="submit" id="submit" name="submit">Submit</button>
        </form>

        <!-- <p id="locationdHolder" style="display: none;">
            <?php
                echo $_SESSION["locationFromDB"];
            ?>
        </p> -->

        <input type="hidden" name="locationHolder" id="locationHolder" value="<?php echo $_SESSION["locationFromDB"]; ?>" style="display: none;">
        <div>
            <?php
                require_once 'includes/dbh-inc.php';
                $lastIDVar = $_SESSION["lastID"];

                
                $sql = "SELECT * FROM locationdetails WHERE ID = $lastIDVar";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($result)) {
                    echo '<img src="data:image;base64,'.base64_encode($row['images']).'" height="200" width="200" class="img-thumnail" />';
                }
            ?>
        </div>

        <p id="output">
        </p>
    </center>
</body>
</html>