<?php

    function display_image($image_id, $dbh) {
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT image, image_type, image_size FROM image_events WHERE image_id=$image_id";
            $stmt2 = $dbh->prepare($sql);
            $stmt2->execute();
            $stmt2->setFetchMode(PDO::FETCH_ASSOC);
            $array = $stmt2->fetch();
            if(sizeof($array) == 3) {
                header('Content-type: '.$array['image_type']);
                header('Content-length: '.$array['image_size']);
                echo $array['image'];
            } else {
                throw new Exception("Out of bounds Error");
            }
    }
?>