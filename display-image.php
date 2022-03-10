<?php
    require_once 'includes/dbh-inc.php';
    $sql = "SELECT ID FROM imagename ORDER BY ID DESC"; 
    $result = mysqli_query($conn, $sql);
?>
<HTML>
    <HEAD>
    <TITLE>List BLOB Images</TITLE>
    </HEAD>
<BODY>
<?php
	while($row = mysqli_fetch_array($result)) {
	?>
		<img src="inlcudes/display-image-inc.php?image_name_ID=<?php echo $row["ID"]; ?>" /><br/>
	
<?php		
	}
    mysqli_close($conn);
?>
</BODY>
</HTML>