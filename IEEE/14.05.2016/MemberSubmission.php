<?php
	require_once("includes/header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/ieee_merge.ico" />
<title>IEEE SB IIIT Allahabad</title>
<meta name="keywords" content="IEEE, IIITA, IIIT Allahabad, IEEE Students Branch, Engineering" />
<meta name="description" content="Official Page of IEEE Students Branch of IIIT Allahabad." />
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />

<script type="text/javascript" src="js/jquery-1.7.2.min.js" ></script>
<script type="text/javascript" src="js/jquery-ui.min.js" ></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);
	});
</script>

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
<script type="text/JavaScript" src="js/moreless.js"></script>
		<!-- Important Owl stylesheet -->
		<link rel="stylesheet" href="owl-carousel/owl.carousel.css">
		 
		<!-- Default Theme -->
		<link rel="stylesheet" href="owl-carousel/owl.theme.css">
 
		<!--  jQuery 1.7+  -->
		 
		<!-- Include js plugin -->
		<script src="owl-carousel/owl.carousel.js"></script>
		<style>
    #owl-demo .item img{
        display: block;
        width: 100%;
        height: 100%;
    }

    </style>


    <script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
		navigation : true,
		slideSpeed : 250,
		paginationSpeed : 400,
		singleItem : true
      });
    });
    </script>
</head>

<body>
	<div id="templatemo_wrapper">
		<a href="index.php"><img id = "site_title" src = "images/header.png" style = "height: 150px"></a>
		<div id="templatemo_header">
			<div id="templatemo_menu" class="ddsmoothmenu">
				<ul>
					<li><a href="index.php" class="selected"><span></span>Home</a></li>
					<li><a href="#"><span></span>Office Bearers</a>
						<ul>
							<li><a href="professional_team.php">Office Bearers</a></li>
							<li><a href="comitee_members.php">Committee Members</a></li>
						</ul>
					</li>
					<li><a href="student_team.php"><span>Members</span></a>
					<li><a href="event.php"><span></span>Events</a></li>
					<li><a href="reports.php"><span></span>Reports</a></li>
					<li><a href="IEEE-Shop.php"><span></span>IEEE-Shop</a></li>
					<li><a href="contact.php"><span></span>Contact</a></li>
					
			</ul>
				<br style="clear: left" />
			</div> <!-- end of templatemo_menu -->
			<div class="clear"></div>
		</div> <!-- END of header -->
	    
		
		<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
		<script type="text/javascript">
		$(window).load(function() {
		    $('#slider').nivoSlider({
				effect: 'random',
				captionOpacity: 1,			
				controlNav: true, // 1,2,3... navigation
				directionNavHide: false,
		    directionNav: true,
				animSpeed: 800, // Slide transition speed
			pauseTime: 4000, // How long each slide will show
				});
		});
		</script>
	    </div> <!-- END of slider -->
	    
	    <div id="templatemo_main_content">
		<div id="templatemo_sidebar">
			<div class="sidebar_content_box">
				<!-- <h3>IEEE Members</h3>
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
				</ul> -->
				<div class="clear"></div>
			</div>
			<div class="sidebar_content_box ">
				<a href="sponsors.pdf" download="Sponsorship Benefits and Categories"><img src="images/sp.png" style="width: 100%;"></a>
			</div>
		</div>
		
		<div id="templatemo_content" >
			<div class="col_2">
				
			
			</div>
			<div class="col_2 no_margin_right ">
				<div class = "updates">
					<h1 class = "post_title">Recent Updates</h1>
					
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
	    </div> <!-- END of templatemo_main_content -->
	    
	    <div id="templatemo_footer">
			Copyright © 2014 <a href = "http://www.iiita.ac.in" target = "_blank" style="font-size: 110%; color: #0c0cff; text-decoration: underline;">IIIT Allahabad</a>| Designed by: <a href="web_dev_team.php" style="font-size: 110%; color: #0c0cff; text-decoration: underline;">Web Management Team - IEEE SB IIITA</a>
	    </div> <!-- END of templatemo_footer -->
	</div> <!-- END of templatemo_wrapper -->
	
	<script>
		$(document).ready(function() {
		 
		  $("#owl-example").owlCarousel();
		 
		});
	</script>
</body>

</html>
