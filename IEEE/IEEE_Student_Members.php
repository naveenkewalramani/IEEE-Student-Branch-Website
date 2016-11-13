<?php
	require_once("includes/header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/ieee_merge.ico" />
<title>Member Affiliation - IEEE SB IIIT Allahabad</title>
<meta name="keywords" content="IEEE, IIITA, IIIT Allahabad, IEEE Students Branch, Engineering" />
<meta name="description" content="Official Page of IEEE Students Branch of IIIT Allahabad." />
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery-1.7.2.min.js" ></script>

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
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

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
							<li><a href="Execom.php">ExCom Members</a></li>
							<li><a href="Student_Volunteers.php">Student Volunteers</a></li>
						</ul></li>
					<li><a href="#"><span></span>Chapters</a>
						<ul>
							<li><a href="ras_chapter.php">RAS (SBC14321A)</a></li>							
							<li><a href="cs_chapter.php">Computer Society (SBC14321B)</a><br/></li>
							<li><a href="sp_chapter.php">Signal Processing (SBC14321C)</a><br/></li>
							<li><a href="wie_chapter.php">WIE Affinity Group (SBA14321)</a><br/></li>
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
						    $rand_img = rand (11, 22);
						    while (in_array($rand_img, $check)) {
							  $rand_img = rand (1, $rw);
							  $rand_img = rand (11, 22);
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
			    <li><a href="<?php echo "IEEE_Student_Members.php?page=" . urlencode($num) . "&id=" . urlencode($a) . "#" . $a; ?>"><img src="<?php echo $p; ?>"  /></a></li>
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
                
		<h3 style="text-align:center; font-weight: 900">Affiliated Members</h3><br>
		<table class="flat-table flat-table-1">
			<thead>
				<th>S.No.</th>
				<th>Name</th>
				<th>Course</th>
				<th>E-Mail</th>
				<th>Membership ID</th>
			</thead>
			<tbody>
                                
                                <?php
								
									$query = "SELECT * FROM student_team";
                                    $stmt = $dbh->prepare($query);
                                    $stmt->execute();
                                    $row = $stmt->rowCount();
                                    
                                    if ($row%10 == 0) {
                                        $i = $row/10;
                                    } else {
                                        $i = $row/10 + 1;
                                    }
                                    if (!isset($_GET['page']) || (int) urldecode($_GET['page']) > $i || (int) urldecode($_GET['page']) < 1) {
                                        $start = 1;
                                    } else {
                                        $start = ((int) urldecode($_GET['page'])-1) * 10 + 1;
                                    }
				    if (isset($_GET['id'])) {
					$color = (int) urldecode($_GET['id']);
				    } else {
					$color = 0;
				    }
                                    $start--;
                                    $query = "SELECT * FROM student_team ORDER BY course DESC LIMIT 10 OFFSET :start";
                                    $stmt = $dbh->prepare($query);
                                    $stmt->bindParam(':start', $start, PDO::PARAM_INT);
                                    $stmt->execute();
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        $member_id = $row['member_id'];
                                        $name = $row['name'];
                                        $email_id = $row['email_id'];
                                        $course = $row['course'];
                                        $start++;
                                        $query1 = "SELECT image_path FROM image WHERE image_id = (SELECT image_id FROM student_image WHERE member_id = :id)";
                                        $stmt1 = $dbh->prepare($query1);
                                        $stmt1->bindParam(':id', $member_id, PDO::PARAM_STR);
                                        $stmt1->execute();
                                        $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
                                        $path = $row1['image_path'];
					if ($start == $color) {
						$c = "#BEB813";
					} else {
						$c = "#6AA9E2";
					}
                                        
                                ?>
				<tr bgcolor="<?php echo $c; ?>">
					<td id="<?php echo $start; ?>"><?php echo $start; ?></td>
					<td><a href="<?php echo $path; ?>"  rel="lightbox"><?php echo $name; ?></a></td>
					<td><?php echo $course; ?></td>
					<td><a href = "<?php echo "mailto:" . $email_id; ?>"><?php echo $email_id; ?></a></td>
					<td><?php echo $member_id; ?></td>
				</tr>
                                <?php
                                    }
                                ?>
			</tbody>
		</table>
                <div class="templatemo_paging">
                    <ul>
                        <?php
                                $query = "SELECT * FROM student_team";
                                $stmt = $dbh->prepare($query);
                                $stmt->execute();
                                $row = $stmt->rowCount();
                                for ($i = 1; $i <= $row/10; $i++) {
                                    
                        ?>
                                    <li><a href="IEEE_Student_Members.php?page=<?php echo $i; ?>"><?php echo $i . " "; ?></a></li>
                        <?php
                                }
                                if ($row%10 != 0) {
                        ?>
                                    <li><a href="IEEE_Student_Members.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                
                        <?php
                                }
                        ?>
                    </ul>
                    <div class="clear"></div>
                </div>
        </div> <!-- END of templatemo_content -->
        <div class="clear"></div>
    </div> <!-- END of templatemo_main_content -->
    <div id="templatemo_footer">
			Copyright © 2014 <a href = "http://www.iiita.ac.in" target = "_blank" style="font-size: 110%; color: #0c0cff; text-decoration: underline;">IIIT Allahabad</a>| Designed by: <a href="student_team.php" style="font-size: 110%; color: #0c0cff; text-decoration: underline;">Web Management Team, IEEE-SB-IIITA</a>
	    </div> <!-- END of templatemo_footer -->
</div> <!-- END of templatemo_wrapper -->
</body>

</html>
