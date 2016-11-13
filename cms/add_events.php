<?php
    require_once("includes/header.php");
    require_once("ContentSanitize.class.php");
    require_once("session.php");
    confirm_logged_in();
    //require_once("upload.php");
?>

<?php
    $san = new Sanitize();
    if (isset($_POST['submit'])) {
        $details = $_POST['details'];
	$details = $san->cleanString($details);
	$details = $san->cleanHtml($details);
	$details = $san->cleanJs($details);
        $name = $_POST['name'];
	$name = $san->cleanString($name);
        $name = $san->cleanHtml($name);
        $name = $san->cleanJs($name);
        $venue = $_POST['venue'];
	$venue = $san->cleanString($venue);
	$venue = $san->cleanHtml($venue);
	$venue = $san->cleanJs($venue);
        $guidelines = $_POST['guidelines'];
	$guidelines = $san->cleanString($guidelines);
	$guidelines = $san->cleanHtml($guidelines);
	$guidelines = $san->cleanJs($guidelines);
	$fees = $_POST['fees'];
	$fees = $san->cleanString($fees);
	$fees = $san->cleanHtml($fees);
	$fees = $san->cleanJs($fees);
	$date = $_POST['date'];
	$date = $san->cleanString($date);
	$date = $san->cleanHtml($date);
	$date = $san->cleanJs($date);
	$array = array();
        $array = $_FILES['image'];
	$target = $_SERVER["DOCUMENT_ROOT"] . "/project_x/gone/event_images/" . $array['name'];
        $query = "INSERT INTO events VALUES(:name, :detail, :venue, :guidelines, :fee, :date)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':detail', $details, PDO::PARAM_STR);
        $stmt->bindParam(':venue', $venue, PDO::PARAM_STR);
	$stmt->bindParam(':guidelines', $guidelines, PDO::PARAM_STR);
	$stmt->bindParam(':fee', $fees, PDO::PARAM_STR);
	$stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->execute();
	if (is_uploaded_file($array['tmp_name']) && getimagesize($array['tmp_name']) != false) {
            move_uploaded_file($array['tmp_name'], $target);
        }
	$target = "event_images/" . $array['name'];
	$query = "INSERT INTO image_events (image_path) VALUES (:path)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':path', $target, PDO::PARAM_STR);
        $stmt->execute();
        $query = "SELECT image_id FROM image_events WHERE image_path = :path";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':path', $target, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch();
        $image_id = $row['image_id'];
        $query = "INSERT INTO events_image VALUES(:name, :image)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image_id, PDO::PARAM_STR);
        $stmt->execute();
	/*$table1 = "image_events";
	$table2 = "events_image";
	$column = "name";
        upload($dbh, $name, $arr, $table1, $table2, $column);*/
        echo "Successfully Added" . '</br>';
    }
?>

<html>
    <head>
	<title>Add Events</title>
	<!--<link rel="stylesheet" type="text/css" href="form.css">-->
    </head>	
    <body>
	<form action="add_events.php" method="post" enctype="multipart/form-data">
	    Name: <input type="text" name="name" value="" id="name" placeholder="" required=""></br>
	    Details: <input type="text" name="details" value="" id="details" placeholder="" required=""></br>
	    Venue: <input type="text" name="venue" value="" id="venue" placeholder="" required=""></br>
	    Date: <input type="text" name="date" value="" id="date" placeholder="" required=""></br>
	    Guidelines: <input type="text" name="guidelines" value="" id="guidelines" placeholder="" required=""></br>
	    Participation Fee: <input type="text" name="fees" value="" id="fees" placeholder="" required=""></br>
	    Image: <input name="image" type="file" /> </br>
	    <input class="buttom" name="submit" type="submit" value="Add">
	</form>
	 <form action="logout.php" method="post">
            <input type="submit" name="logout" value="logout">
        </form>
    </body>
</html>
