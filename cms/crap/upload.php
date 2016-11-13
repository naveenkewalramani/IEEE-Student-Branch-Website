 <?php

    function upload($dbh, $member_id, $array, $table1, $table2, $column) {
        
        if(is_uploaded_file($array['tmp_name']) && getimagesize($array['tmp_name']) != false) {
            
            $size = getimagesize($array['tmp_name']);
            $type = $size['mime'];
            $imgfp = fopen($array['tmp_name'], 'rb');
            $size = $size[3];
            $name = $array['name'];
            $maxsize = 99999999;
        
            if($array['size'] < $maxsize ) {
                        /*** set the error mode ***/
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $dbh->prepare("INSERT INTO {$table1} (image_type ,image, image_size, image_name) VALUES (? ,?, ?, ?)");
                $stmt->bindParam(1, $type);
                $stmt->bindParam(2, $imgfp, PDO::PARAM_LOB);
                $stmt->bindParam(3, $size);
                $stmt->bindParam(4, $name);
                $stmt->execute();
                
                $query = "INSERT INTO {$table2} ({$column}) VALUES (:id)";
                $stmt = $dbh->prepare($query);
                $stmt->bindParam(':id', $member_id, PDO::PARAM_STR);
                $stmt->execute();
            } else {
                throw new Exception("File Size Error");
            }
        } else {
            throw new Exception("Unsupported Image Format!");
        }
    
    }
?> 