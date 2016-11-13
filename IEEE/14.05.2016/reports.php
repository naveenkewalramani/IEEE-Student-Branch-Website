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
		<div class="sidebar_content_box ">
				<a href = "http://www.ieeer10.org/" target="_blank"><image src = "images/linksUp/ieeeRegion10.jpg" height = "50px" width = "65"></a>
				<a href = "http://ewh.ieee.org/r10/india_council/" target="_blank"><image src = "images/linksUp/ieee_india_council.png" height = "50px" width = "65px" style="margin-left:10px"></a>
				<a href = "http://www.ieeeup.org/"  target="_blank"><image src = "images/linksUp/ieee-up.png" height = "50px" width = "73px" style="margin-left:10px"></a>
			</div>
        </div>
        
		   <div id="templatemo_content">
        	<div id="accordion">
              <h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> Reports </h3>
              <div>
                <br>
                <br>
                    
                    <p>
					<ul style = "list-style-type:square">
					<li><a target="_blank" href="documents/IEEE_PosterPresentation_2015.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">06/10/2015 IEEE Poster Presentation on Humanitarian Technology - 2015 </a></li><br>					
					<li><a target="_blank" href="documents/IEEE_technical_talk_ak_deb.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">03/10/2015 IEEE Tech Talk by Dr. Alok Kanti Deb </a></li><br>					
					<li><a target="_blank" href="documents/Reports_14-09-2015.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">14/09/2015 Minutes of Meeting </a></li><br>					
					<li><a target="_blank" href="documents/inauguration.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">11/09/2015 Inauguration of IEEE SB IIITA office </a></li><br>					
					<li><a target="_blank" href="documents/list_of_members_of_ieee_sb_iiita_(2015_16).pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">05/09/2015 The List of Members of IEEE Student Branch for 2015-2016</a></li><br>
					<li><a target="_blank" href="documents/IEEE_Tech_Talk_steven_pearce.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">05/09/2015 IEEE Tech Talk by Dr. Steven Pearce</a></li><br>
					<li><a target="_blank" href="documents/IEEE_WIE_Awareness.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">31/08/2015 IEEE Women In Engineering (WIE) Awareness Committee Formation</a></li><br>
					<li><a target="_blank" href="documents/MoM_28-08-2015.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">28/08/2015 Minutes of Meeting</a></li><br>
					<li><a target="_blank" href="documents/MoM_26-08-2015.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">26/08/2015 Minutes of Meeting</a></li><br>
					<li><a target="_blank" href="documents/Technikwiz_2015_2.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">22/08/2015 IEEE Annual Technikwiz IIIT Allahabad - Report 2 </li><br>
					<li><a target="_blank" href="documents/Technikwiz_2015.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">22/08/2015 IEEE Annual Technikwiz IIIT Allahabad - Report 1 </li><br>
					<li><a target="_blank" href="documents/IEEE_Awareness_to_new_comers.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">10/08/2015 IEEE Awareness Program 2015 to new students</li><br>
					<li><a target="_blank" href="documents/Report_on_talk_by_Davide_Scaramuzza.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">18/03/2015 Report on talk by Davide Scaramuzza IIIT Allahabad</li><br>
					<li><a target="_blank" href="documents/Report_TechQuiz.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">08/11/2014 IEEE Technical Quiz - 8<sup>th</sup> November 2014, IIIT Allahabad</li><br>
					<li><a target="_blank" href="documents/IEEE_ExCom_2_NOV_2014.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">02/11/2014 5<sup>th</sup> IEEE Executive Committee Meeting IIIT Allahabad </li><br>
					<li><a target="_blank" href="documents/IEEE_Leadership_Workshop_1_NOV_2014.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">01/11/2014 IEEE Sponsored Leadership Workshop IIIT Allahabad </li><br>
					<li><a target="_blank" href="documents/Report_15_10_2014_1.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">15/10/2014 Meeting with IEEE UP Section Chairperson</a></li><br>
                   	<li><a target="_blank" href="documents/Report_15_10_2014_2.pdf"><span style="color:#3366FF;text-decoration: underline;float: left;">15/10/2014 PROJECT CARNIVAL</a></li><br>
					<li><a target="_blank" href="documents/MoM_28_10_2014.pdf"><span style="color: #3366FF;text-decoration: underline;float: left;">05/10/2014 Minutes of Meeting</a><br>
					</li>
                    
					</ul>
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
			Copyright © 2014, IEEE Student Branch IIIT Allahabad (Web: ieee.sb.iiita.ac.in; Email: ieee.sb@iiita.ac.in)
	    </div> <!-- END of templatemo_footer -->
</div> <!-- END of templatemo_wrapper -->
</body>


</html>
