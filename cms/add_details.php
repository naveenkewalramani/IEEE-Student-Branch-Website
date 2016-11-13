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
        $member_id = $_POST['id'];
        $member_id = $san->cleanString($member_id);
        $member_id = $san->cleanJs($member_id);
        $member_id = $san->cleanHtml($member_id);
        $name = $_POST['name'];
        $name = $san->cleanString($name);
        $name = $san->cleanHtml($name);
        $name = $san->cleanJs($name);
        $email_id = $_POST['email_id'];
        $email_id = $san->cleanString($email_id);
        $email_id = $san->cleanHtml($email_id);
        $email_id = $san->cleanJs($email_id);
        $c = 0;
        if(filter_var($email_id, FILTER_VALIDATE_EMAIL)) {
		$c = 1;
	}
        $course = $_POST['course'];
        $course = $san->cleanString($course);
        $course = $san->cleanHtml($course);
        $course = $san->cleanJs($course);
        $array = array();
        $array = $_FILES['image'];
        $target = $_SERVER["DOCUMENT_ROOT"] . "/project_x/gone/stu_images/" . $array['name'];
        if ($c == 1) {
            $query = "INSERT INTO student_team VALUES(:id, :name, :email, :course)";
            $stmt = $dbh->prepare($query);
            $stmt->bindParam(':id', $member_id, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email_id, PDO::PARAM_STR);
            $stmt->bindParam(':course', $course, PDO::PARAM_STR);
            $stmt->execute();
            if (is_uploaded_file($array['tmp_name']) && getimagesize($array['tmp_name']) != false) {
                move_uploaded_file($array['tmp_name'], $target);
            }
            $target = "stu_images/" . $array['name'];
            $query = "INSERT INTO image (image_path) VALUES (:path)";
            $stmt = $dbh->prepare($query);
            $stmt->bindParam(':path', $target, PDO::PARAM_STR);
            $stmt->execute();
            $query = "SELECT image_id FROM image WHERE image_path = :path";
                $stmt = $dbh->prepare($query);
            $stmt->bindParam(':path', $target, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch();
            $image_id = $row['image_id'];
            $query = "INSERT INTO student_image VALUES(:member, :image)";
            $stmt = $dbh->prepare($query);
            $stmt->bindParam(':member', $member_id, PDO::PARAM_STR);
            $stmt->bindParam(':image', $image_id, PDO::PARAM_STR);
            $stmt->execute();
        /*$table1 = "image";
        $table2 = "student_image";
        $column = "member_id";
        upload($dbh, $member_id, $arr, $table1, $table2, $column);*/
        }
    }
?>

<html>
    <head>
        <title>Add Details</title>
    </head>
    <body>
        <form action="add_details.php" method="post" enctype="multipart/form-data">
            Membership ID: <input type="text" name="id" value="" id="id" placeholder=""></br>
            Name: <input type="text" name="name" value="" id="name" placeholder="" required=""></br>
            Email: <input type="text" name="email_id" value="" id="email_id" placeholder="" required=""></br>
            Course: <input type="text" name="course" value="" id="course" placeholder="" required=""></br>
            Image: <input name="image" type="file" /></br>
            <input name="submit" type="submit" value="Submit" />
        </form>
         <form action="logout.php" method="post">
            <input type="submit" name="logout" value="logout">
        </form>
    </body>
</html>