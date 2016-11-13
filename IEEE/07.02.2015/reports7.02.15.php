<?php
	require_once("includes/header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="images/ieee_merge.ico" />
	<title>Reports - IEEE SB IIIT Allahabad</title>
	
	<meta name="keywords" content="IEEE, IIITA, IIIT Allahabad, IEEE Students Branch, Engineering" />
	<meta name="description" content="Official Page of IEEE Students Branch of IIIT Allahabad." />
	
	<link rel="stylesheet" type="text/css" href="css/templatemo_style.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
	<link rel="stylesheet" type="text/css" href="css/slimbox2.css" media="screen" /> 
	
	<script type="text/javascript" src="js/jquery-1.7.2.min.js" ></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
	<script type="text/javaScript" src="js/slimbox2.js"></script> 
	<script type="text/javascript">
		ddsmoothmenu.init({
			mainmenuid: "templatemo_menu", //menu DIV id
			orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
			classname: 'ddsmoothmenu', //class added to menu's outer DIV
			//customtheme: ["#1c5a80", "#18374a"],
			contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
		})
	</script>
	<script>
	  $(function() {
	    $( "#accordion" ).accordion({
	      heightStyle: "content"
	    });
	  });
	</script>
</head>
<body>

<div id="templatemo_wrapper">
	<a href="index.php"><img id = "site_title" src = "images/header.png" style = "height: 150px"></a>
	<div id="templatemo_header"><span class="header_border"></span>
		<div id="templatemo_menu" class="ddsmoothmenu">
            <ul>
                <li><a href="index.php"><span></span>Home</a></li>
                <li><a href="#"><span></span>IEEE Team</a>
                    <ul>
                        <li><a href="professional_team.php">Professional Team</a></li>
                        <li><a href="student_team.php">Members</a></li>
                  </ul>
                </li>
                <li><a href="event.php"><span></span>Events</a></li>
				<li><a href="reports.php" class="selected"><span></span>Reports</a></li>
                <li><a href="IEEE-Shop.php"><span></span>IEEE-Shop</a></li>
                <li><a href="contact.php"><span></span>Contact</a></li>
				
            </ul>
            <br style="clear: left" />
        </div> <!-- end of templatemo_menu -->
        <div class="clear"></div>
    </div> <!-- END of header -->
    
    
    <div id="templatemo_main_content">
    	<div id="templatemo_sidebar">
		<div class="sidebar_content_box">
			<h3>IEEE Members</a></h3>
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
		<div class="sidebar_content_box" style="a:hover {background-color:red;}">
			<a href="sponsors.pdf" download="Sponsorship Benefits and Categories" ><img src="images/sp.png" style="width: 100% "></a>
		</div>
        </div>
        
		   <div id="templatemo_content">
        	<div id="accordion">
              <h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> Reports Section </h3>
              <div>
                <br>
                <br>
                    <div class = "imp">Venue:</div> CC-3, IIIT-Allahabad <br>
                    <p>
					<ol>
					<li><a target="_blank" href="documents/Report_TechQuiz.pdf"><span style="color: #2222cc;text-decoration: underline;float: left;"> IEEE Technical Quiz - 8<sup>th</sup> November 2014, IIIT - Allahabad </li>
					<li><a target="_blank" href="documents/IEEE_ExCom_2_NOV_2014.pdf"><span style="color: #2222cc;text-decoration: underline;float: left;">5<sup>th</sup> IEEE Executive Committee Meeting - 2<sup>nd</sup> November 2014, IIIT - Allahabad </li>
					<li><a target="_blank" href="documents/IEEE_Leadership_Workshop_1_NOV_2014.pdf"><span style="color: #2222cc;text-decoration: underline;float: left;">IEEE Sponsored Leadership Workshop - 1<sup>st</sup> November 2014, IIIT - Allahabad </li>
					<li><a target="_blank" href="documents/Report_15_10_2014_1.pdf"><span style="color: #2222cc;text-decoration: underline;float: left;">Meeting with IEEE UP Section Chair-person - 15<sup>th</sup> October 2014</a></li><br>
                    <li><a target="_blank" href="documents/Report_15_10_2014_2.pdf"><span style="color: #2222cc;text-decoration: underline;float: left;">PROJECT CARNIVAL - 15<sup>th</sup> October 2014</a></li>
					<li><a target="_blank" href="documents/MoM_28_10_2014.pdf"><span style="color: #2222cc;text-decoration: underline;float: left;"><br>Minutes of Meeting - 5<sup>th</sup> October 2014</a><br>
					</li>
                    
					</ol>
					<br>
                </p>
                
              </div>
		<!--
		* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
		* This notice MUST stay intact for legal use
		* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
		-->
            </div>
        </div> <!-- END of templatemo_content -->
		
        
		<div class="clear"></div>
    </div> <!-- END of templatemo_main_content -->
    <br>
	<div id="templatemo_footer">
			Copyright © 2014 <a href = "http://www.iiita.ac.in" target = "_blank" style="font-size: 110%; color: #0c0cff; text-decoration: underline;">IIIT Allahabad</a>| Designed by: <a href="web_dev_team.php" style="font-size: 110%; color: #0c0cff; text-decoration: underline;">Web Management Team - IEEE SB IIITA</a>
	    </div> <!-- END of templatemo_footer -->
</div> <!-- END of templatemo_wrapper -->
</body>


</html>
