<?php
	require_once("includes/header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="images/ieee_merge.ico" />
	<title>Professional Team - IEEE SB IIIT Allahabad</title>
	
	<meta name="keywords" content="IEEE, IIITA, IIIT Allahabad, IEEE Students Branch, Engineering" />
	<meta name="description" content="Official Page of IEEE Students Branch of IIIT Allahabad." />
	
	<link rel="stylesheet" type="text/css" href="css/templatemo_style.css" />
	<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
	<link rel="stylesheet" type="text/css" href="css/slimbox2.css" media="screen" /> 
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" /> 
	
	<script type="text/javascript" src="js/jquery-1.7.2.min.js" ></script>
	<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
	<script type="text/JavaScript" src="js/slimbox2.js"></script>
	<script type="text/javascript" src="js/172.js"></script>
	<script type="text/javascript" src="js/1821.js"></script>
	<!--[if lte IE 8]>
	<script type="text/javascript" src="js/mootools.js"></script>
	<script type="text/javascript" src="js/selectivizr.js"></script>
	<![endif]-->
	<script type="text/javascript">
	ddsmoothmenu.init({
		mainmenuid: "templatemo_menu", //menu DIV id
		orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
		classname: 'ddsmoothmenu', //class added to menu's outer DIV
		//customtheme: ["#1c5a80", "#18374a"],
		contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
	})
	</script>
	<script type="text/javascript">
	$(function() {
		$( "#accordion" ).accordion({
			autoHeight: false,
			navigation: true
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
                <li><a href="#" class="selected"><span></span>IEEE Team</a>
                    <ul>
                        <li><a href="professional_team.php">Professional Team</a></li>
                        <li><a href="student_team.php">IEEE Student Members </a></li>
					</ul>
                </li>
                <li><a href="event.php"><span></span>Events</a></li>
				<li><a href="reports.php"><span></span>Reports</a></li>
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
        </div>
        
        <div id="templatemo_content">
        	
			<div id="accordion">
			<h2><a href="#">Chief Patron</a></h2>
				<div>
				<table width="100%" border="0">
		            <tr>
		              	<td width="15%"><img src="images/somenath.jpg" width="100" height="100" /></td>
		              	<td>
		              	<div><h2>Dr. Somenath Biswas </h2></div>
		                <div><h4 style="color:#848484">Chief Patron, IIIT-A IEEE Student Branch<h4></div>
		                </td>
		            </tr>
          		</table>
				</div>
				<h2><a href="#">Faculty Counselor</a></h2>
				<div>
				<table width="100%" border="0">
		            <tr>
		              	<td width="15%"><img src="images/professional team/gcnandi.jpg" width="100" height="100" /></td>
		              	<td>
		              	<div><h2>Dr. G C Nandi </h2></div>
		                <div><h4 style="color:#848484">Faculty Counselor, IIIT-A IEEE Student Branch<h4></div>
		                </td>
		            </tr>
          		</table>
				</div>
				<h2><a href="#">Co-Ordinator</a></h2>
				<div>
				<table width="100%" border="0">
		            <tr>
		              	<td width="15%"><img src="images/professional team/sksingh.jpg" width="100" height="100" /></td>
		              	<td>
		              	<div><h2>Dr. S K Singh</h2></div>
		                <div><h4 style="color:#848484">Co-ordinator, IIIT-A IEEE Student Branch<h4></div>
		                </td>
		            </tr>
          		</table>
				</div>
				<h2><a href="#">Office Bearers</a></h2>
				<div>
					<table width="100%" border="0">
			            <tr>
			              <td width="15%"><img src="images/professional team/avinash.jpg" width="100" height="100" /></td>
			              <td><div><h4><b>Avinash Kumar Singh</b></h4></div>
			                PhD Scholar<br>
			                Mob No: (+91)9807039372<br>
			                Email: avinashkumarsingh1986@gmail.com<br>
			                Role : <b>Chair</b><br>
			              </td>
			            </tr>
			            <tr>
			              <td><img src="images/professional team/vijay.jpg" width="100" height="100" /></td>
			              <td><div><h4><b><a target="_blank" href = "https://sites.google.com/site/wwwvbsemwalcom/">Vijay Bhaskar Semwal</a></b></h4></div>
			                PhD Scholar<br>
			                Mob No: (+91)8874142887<br>
			                Email: vsemwal@gmail.com<br>
			                Role : <b>Vice Chair</b><br>
			              </td>
			            </tr>
			            <tr>
			              <td><img src="images/professional team/shiv.jpg" width="100" height="100" /></td>
			              <td><div><h4><b><a target="_blank" href = "https://sites.google.com/site/shivram1987/">Shiv Ram Dubey</a></b></h4></div>
			                PhD Scholar<br>
			                Mob No: (+91)<br>
			                Email: shivram1987@gmail.com<br>
			                Role : Secretary<br>
			              </td>
			            </tr>
			            <tr>
			              <td><img src="images/professional team/vinod.jpg" width="100" height="100" /></td>
			              <td><div><h4><b>Vinod Kumar Jatav</b></h4></div>
			                PhD Scholar<br>
			                Mob No: (+91)<br>
			                Email: vinodj217@gmail.com<br>
			                Role : Treasurer<br>
			              </td>
			            </tr>
			          </table>
				</div>
				<h2><a href="#2">Mentors</a></h2>
				<div>
					<table width="100%" border="0">

			            <tr>
			              <td><img src="images/professional team/Venkat.jpg" width="100" height="100" /></td>
			              <td><div><h4><br><b><a target="_blank" href = "http://theroboticistvenkat.webs.com/">Venkat Beri</b></a></h4></div>
			                Ph.D Scholar<br>
			                Mob No: (+91)9169745241<br>
			                Email: venkat.beri@outlook.com<br>
			                Role : Mentor, Web Management<br> <br>
			              </td>
			            </tr>
			            <tr>
			              <td><img src="images/professional team/dhiraj.jpg" width="100" height="100" /></td>
			              <td><div><h4><b><a target="_blank" href = "http://chitaradheeraj.webs.com/">Dheeraj Chitara</b></a></h4></div>
			                PhD Scholar<br>
			                Mob No: (+91)8601920125<br>
			                Email: dheerajchitara@outlook.com<br>
			                Role : Mentor, Publicity &amp; Membership Committee<br>
			              </td>
			            </tr>
			            <tr>
			              <td><img src="images/professional team/anush.jpg" width="100" height="100" /></td>
			              <td><div><h4><br><b>Anush Bekal</b></h4></div>
			                PhD Scholar<br>
			                Mob No: (+91)8004857667<br>
			                Email: anush5137@gmail.com<br>
			                Role : Mentor, Technical Event Management Committee<br>
			              </td>
			            </tr>
									   
			              <td width="15%"><img src="images/professional team/SOURABH.JPG" width="100" height="100" /></td>
			              <td width="85%"><div><h4><br><b>Sourabh Prakash</b></h4></div>
			                PhD Scholar<br>
			                Mob No: (+91)7618005444<br>
			                Email: sprakash13@gmail.com<br>
			                Role : Handling Publication<br>
			               </td>
			           
			          </table>
				</div>
			</div>
        </div> <!-- END of templatemo_content -->
        <div class="clear"></div>
    </div> <!-- END of templatemo_main_content -->
    
<!--
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
-->
    <div id="templatemo_footer">
			Copyright © 2014 <a href = "http://www.iiita.ac.in" target = "_blank" style="font-size: 110%; color: #0c0cff; text-decoration: underline;">IIIT Allahabad</a>| Designed by: <a href="web_dev_team.php" style="font-size: 110%; color: #0c0cff; text-decoration: underline;">Web Management Team - IEEE SB IIITA</a>
	    </div> <!-- END of templatemo_footer -->
</div> <!-- END of templatemo_wrapper -->
</body>

</html>
