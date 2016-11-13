<?php
	require_once("includes/header.php");
?>
<?php
	require_once("includes/header.php");
	require_once("../cms/ContentSanitize.class.php");
?>

<?php
	$san = new Sanitize();
    if (isset($_POST['Submit'])) {
		$name = $_POST['fullname'];
		$name = $san->cleanString($name);
	    $name = $san->cleanHtml($name);
	    $name = $san->cleanJs($name);
		$email_id = $_POST['email'];
		$email_id = $san->cleanString($email_id);
	    $email_id = $san->cleanHtml($email_id);
	    $email_id = $san->cleanJs($email_id);
		$phone = $_POST['phone'];
		$phone = $san->cleanString($phone);
		$phone = $san->cleanHtml($phone);
		$phone = $san->cleanJs($phone);
		$size = $_POST['size'];
		$size = $san->cleanString($size);
		$size = $san->cleanHtml($size);
		$size = $san->cleanJs($size);
		$address = $_POST['text'];
		$address = $san->cleanString($address);
		$address = $san->cleanHtml($address);
		$address = $san->cleanJs($address);
		$c = 0;
		if(preg_match("/^[0-9]{10}$/", $phone)) {
			$c = 1;
		}
		if(!filter_var($email_id, FILTER_VALIDATE_EMAIL)) {
			$c = 0;
		}
		if ($c == 1) {
			$query = "INSERT INTO orders (name, email, phone, size, address) VALUES (:name, :email, :phone, :size, :address)";
			$stmt = $dbh->prepare($query);
			$stmt->bindParam(':name', $name, PDO::PARAM_STR);
			$stmt->bindParam(':email', $email_id, PDO::PARAM_STR);
			$stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
			$stmt->bindParam(':size', $size, PDO::PARAM_STR);
			$stmt->bindParam(':address', $address, PDO::PARAM_STR);
			//echo $stmt;
			$stmt->execute();
			
			echo "<script> alert('Thanks, Your order has been received. You\'ll be contacted soon.');</script><br>";
		}
    }
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/ieee_merge.ico" />
<title>IEEE-Shop - IEEE SB IIIT Allahabad</title>
<meta name="keywords" content="IEEE, IIITA, IIIT Allahabad, IEEE Students Branch, Engineering" />
<meta name="description" content="Official Page of IEEE Students Branch of IIIT Allahabad." />
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery-1.7.2.min.js" ></script>
<script src="js/jquery-ui.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css">

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

<link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" /> 
<script type="text/JavaScript" src="js/slimbox2.js"></script> 
<script type="text/javascript" src="js/jquery.magnifier.js"></script>
</head>
<body>


<div id="templatemo_wrapper">
	<a href="index.php"><img id = "site_title" src = "images/header.png" style = "height: 150px"></a>
	<div id="templatemo_header"><span class="header_border"></span>
		<div id="templatemo_menu" class="ddsmoothmenu">
            <ul>
					<li><a href="index.php" class="selected"><span></span>Home</a></li>
					<li><a href="#"><span></span>Office Bearers</a>
						<ul>
							<li><a href="faculty_advisors.php">Faculty Advisors</a></li>
							<li><a href="office_bearers.php">Office Bearers</a></li>
							<li><a href="Execom.php">ExeCom Members</a></li>
							<li><a href="Student_Volunteers.php">Student Volunteers</a></li>
						</ul></li>
					<li><a href="#"><span></span>Chapters</a>
						<ul>
							<li><a href="ras_chapter.php">RAS Student Chapter</a></li>
							<li><a href="wie_chapter.php">WIE Affinity Group</a></li>
						</ul></li>
					<li><a href="IEEE_Student_Members.php"><span>Members</span></a>
					<li><a href="#"><span></span>Activities</a>
						<ul>
							<li><a href="event.php"><span></span>Events</a></li>
							<li><a href="reports.php"><span></span>Reports</a></li>
						</ul></li>					
					<li><a href="IEEE-Shop.php"><span></span>Shop</a></li>		
					<li><a href="download.php"><span></span>Downloads</a></li>					
				</ul>
            <br style="clear: left" />
        </div> <!-- end of templatemo_menu -->
        <div class="clear"></div>
    </div> <!-- END of header -->
    
    
    <div id="templatemo_main_content">
    	<div id="templatemo_sidebar">
		<div class="sidebar_content_box">
			<h3>IEEE Members</h3>
			<ul class="sidebar_gallery">
				<?php
					$imgs = 1;
					$check = array();
					while ($imgs <= 9) {
					    $qry = "SELECT * FROM student_team";
                        $smt = $dbh->prepare($qry);
                        $smt->execute();
                        $rw = $smt->rowCount();
					    $rand_img = rand (1, $rw);
					    while (in_array($rand_img, $check)) {
							$rand_img = rand (1, $rw);
					    }
					    array_push($check, $rand_img);
					    $p = "stu_images/member" . $rand_img . ".jpg";
					    $query2 = "SELECT member_id FROM student_image WHERE image_id = (SELECT image_id FROM image WHERE image_path = :path)";
					    $stmt2 = $dbh->prepare($query2);
					    $stmt2->bindParam(':path', $p, PDO::PARAM_STR);
					    $stmt2->execute();
					    $row = $stmt2->fetch(PDO::FETCH_ASSOC);
					    $member_id = $row['member_id'];
					    $num = 1;
					    $query2 = "SELECT member_id FROM student_team";
					    $stmt2 = $dbh->prepare($query2);
					    $stmt2->execute();
					    while ($r = $stmt2->fetch(PDO::FETCH_ASSOC)) {
						if ($member_id == $r['member_id']) {
						    break;
						}
						$num++;
					    }
					    $a = $num;
					    if ($num%10 == 0) {
						$num = $num / 10;
					    } else {
						$num = (int) ($num / 10) + 1;
					    }
				?>
			    <li><a href="<?php echo "student_team.php?page=" . urlencode($num) . "&id=" . urlencode($a) . "#" . $a; ?>"><img src="<?php echo $p; ?>"  /></a></li>
			    <?php
				$imgs++;
				}
			    ?>
			</ul>
			<div class="clear"></div>
		</div>
		<div class="sidebar_content_box">
			<a href="sponsors.pdf" download="Sponsorship Benefits and Categories"><img src="images/sp.png" style="width: 100%"></a>
		</div>
		<div class="sidebar_content_box ">
				<a href = "http://www.ieeer10.org/" target="_blank"><image src = "images/linksUp/ieeeRegion10.jpg" height = "50px" width = "65"></a>
				<a href = "http://ewh.ieee.org/r10/india_council/" target="_blank"><image src = "images/linksUp/ieee_india_council.png" height = "50px" width = "65px" style="margin-left:10px"></a>
				<a href = "http://www.ieeeup.org/"  target="_blank"><image src = "images/linksUp/ieee-up.png" height = "50px" width = "73px" style="margin-left:10px"></a>
			</div>
        </div>
        
        <div id="templatemo_content">
        	
        	<div style="cursor: inherit; background-color:white; border: 1px #000 solid;">
        		<table>
	        		<tr>
		              <td><img src="images/shop/tshirt1.jpg"  class="magnify"  width="100" height="100"/></td>
		              <td><div><h4>IEEE - IIIT Allahabad T Shirt</h4></div>
		                <b>Price: </b> Rs. 450/-<br>
		                Delivery charges may apply for some places.
		              </td>
		            </tr>
	        	</table>
        	</div>

            <div class="content_wrapper content_mb_60" style="margin-top: 50px;">
	            <div id="contact_form">
	                <h3>Place your orders here</h3>
	                <form method="post" name="contact" action="IEEE-Shop.php">
	                    <div class="col_2">
	                        <label for="fullname">Name:</label>
	                      <input name="fullname" type="text" class="input_field" id="fullname" maxlength="30" required="" />
	                        <div class="clear"></div>
	                    </div>
	                    <div class="col_2 no_margin_right">
	                      <label for="email">Email:</label>
	                      <input name="email" type="text" class="input_field" id="email" maxlength="30" required=""/>
	                        <div class="clear"></div>
	                    </div>
	                    <div class="col_2">
	                      <label for="phone">Phone:</label>
	                      <input name="phone" type="text" class="input_field" id="phone" maxlength="10" required=""/>
	                        <div class="clear"></div>
	                    </div>
	                    <div class="col_2 no_margin_right">
	                        <label for="size">Size:</label>
	                        <select name="size" type="text" class="input_field" id="size" maxlength="50" required="">
	                        	<option value="s">S</option>
	                        	<option value="m">M</option>
	                        	<option value="l">L</option>
	                        	<option value="xl">XL</option>
	                        	<option value="xxl">XXL</option>
	                        </select>
	                        <div class="clear"></div>
	                    </div>
	                    <label for="text">Address:</label>
	                    <textarea id="text" name="text" rows="0" cols="0" class="required" required=""></textarea>
	                    
	                    <input type="submit" name="Submit" value="Submit" class="submit_btn left" />
	                    <input type="reset" name="Reset" value="Reset" class="submit_btn right" />
	                </form>
	            </div> 
	            <div class="clear"></div>
			</div>     

        </div> <!-- END of templatemo_content -->
        <div class="clear"></div>
    </div> <!-- END of templatemo_main_content -->
    
    <div id="templatemo_footer">
			Copyright © 2014, IEEE Student Branch IIIT Allahabad (Web: ieee.sb.iiita.ac.in; Email: ieee.sb@iiita.ac.in)
	    </div> <!-- END of templatemo_footer -->
</div> <!-- END of templatemo_wrapper -->
</body>
</html>
