<?php
	require_once("includes/header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="images/ieee_merge.ico" />
	<title>Events - IEEE SB IIIT Allahabad</title>
	
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
                <li><a href="event.php" class="selected"><span></span>Events</a></li>
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
              
			  <h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> IEEE Technical Quiz </h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">8<sup>th</sup>-9<sup>th</sup> November 2014</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/TechnicalQuiz.jpg" alt="Post Image 2" />
                <br><br><br>
                 	<p>
                		Technical quiz was successfully organized by IEEE Students Branch IIIT Allahabad with the approval of the IEEE Uttar Pradesh section. The event was initiated with the call for participation at November 5th 2014. The main aim of this event was to provide a platform for all students to showcase their technical talent with the global visibility. Students were required to register as a team with the size of maximum two members per team or solo as per individual choice. A total of 165 teams participated in the first day of quiz on November 8th 2014
					</p>

					<p>
						The quiz was started with a motivating presentation consisting of the benefits of IEEE Student membership which was presented by branch office bearers and mentors to extend the awareness within the student community. First round of quiz was consisting of the various types of written multiple choice questions from the area of logical reasoning, coding (C), IEEE, Electronics and General Sciences.
                	</p>
                    <div class = "imp">Venue:</div> CC-3, IIIT-Allahabad
                    <p>
					<a target="_blank" href="documents/Report_TechQuiz.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to download the report</span></a>
                    <br>
                </p>
                
              </div>
			  
			  <h3 style="font-weight:800; font-size: 20px; background-color:#abcdef">5<sup>th</sup> IEEE Executive Committee Meeting </h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">2<sup>nd</sup> November 2014</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/Excom_meeting_2Nov2014.jpg" alt="Post Image 2" />
                <br><br><br>
                 	<p>
                		The 5<sup>th</sup> Executive committee meeting of the IEEE Uttar Pradesh Section was hosted by IEEE Students Branch, Indian Institute of Information Technology - Allahabad on 2<sup>nd</sup> November 2014. The meeting began with the welcome note, delivered by Dr. S.N. Singh (Chairperson, IEEE Uttar Pradesh Section). Various other betterment plans along with the goals related to IEEE Uttar Pradesh Section were the key issues of the part of discussion.
					</p>

                    <div class = "imp">Venue:</div> Board Room, IIIT-Allahabad
                    <p>
					<a target="_blank" href="documents/IEEE_ExCom_2_NOV_2014.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to download the report</span></a>
                    <br>
                </p>
                
              </div>
			  <h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> IEEE Sponsored Leadership Workshop </h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">1<sup>st</sup> November 2014</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/IEEELeadershipWorkshop.jpg" alt="Post Image 2" />
                <br><br><br>
                 	<p>
                		Indian Institute of Information Technology Allahabad organized a one day IEEE Sponsored Leadership Workshop. The workshop was coordinated by Dr. Satish Kumar Singh, IIIT Allahabad and sponsored by IEEE Uttar Pradesh Section. This type of event is first time conducted by the section. About 100 participants including IEEE Student branch office bearer and faculty counsellors from Uttar Pradesh section were registered and attended the workshop.
					</p>

					<p>
						The workshop started with the welcome address by Prof. Somenath Biswas (Director, IIIT Allahabad) followed by lamp lighting and bucket presentation to invited speakers and guests. Dr. S. N. Singh (Chairperson IEEE UP Section) IITK, Dr. S. C. Srivastava (Executive Committee Member, IEEE UP Section) IITK, Dr. Dilip K Sharma (Joint Sec. IEEE UP Section) Dr. G.C. Nandi IIITA, Dr. U.S. Tiwary IIITA, Dr. Madhvendra Mishra IIITA were in the list of few eminent invited resource persons.                 	</p>
                    <div class = "imp">Venue:</div> Main Auditorium, IIIT-Allahabad
                    <p>
					<a href="leadership/leadershipindex.html"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to go to the gallery</span></a><br></p>
					<p>
					<a target="_blank" href="documents/IEEELeadershipWorkshop_1Nov2014.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to download the report</span></a>
                    <br>
                </p>
                
              </div>
              <h3 style="font-weight:800; font-size: 20px; background-color:#abcdef"> Meeting with the Chairperson, IEEE UP Section</h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">15<sup>th</sup> October, 2014</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/14.jpg" alt="Post Image 2" />
                <br><br><br>
                 	<p>
                		Chairperson of IEEE UP section, Dr. S.N. Singh (IIT Kanpur) visited Indian Institute of Information Technology Allahabad and extolled students for their efforts. He briefed students about IEEE and encouraged them to be part of our society. He apprised about benefits and opportunities students can get over IEEE platform. He also motivated the IEEE Student Branch IIITA for holding the similar events in future
					</p>

					<p>
						He then conducted a small summit with Dr. S.K Singh (Coordinator, IEEE Student Branch, IIIT-Allahabad) and all the office bearers including the chair, co-chair, secretary and treasurer and other active members of IEEE Student Branch IIIT-Allahabad.  Dr. Pavan Chkraborty was the special invitee during the meeting and event. Professor S. N. Singh had a brief discussion on the upcoming IEEE Leadership workshop and IEEE Executive Committee Meeting to be held during 1-2 Nov. 2014, in IIIT Allahabad. the meeting ended up with the few group photographs
                	</p>
                    <div class = "imp">Venue:</div> CC-3, IIIT-Allahabad
                    <p>
					<a target="_blank" href="documents/Report_15_10_2014_1.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to download the report</span></a>
                    <br>
                </p>
                
              </div>

              <h3 style="font-weight:800; font-size: 20px; background-color:#abcdef">Project Carnival</h3>
              <div>
                <div class="post_meta">
                    <span class="date"><a href="#">15<sup>th</sup> October, 2014</a></span>
                </div><br>
                <img class="img_border img_border_b" style = "width: 100%;" style = "width: 100%;" src="images/event_images/04.jpg" alt="Post Image 2" />
                <br><br><br>
                <p>
                    The <b>IEEE Student Branch</b> and <b>Tesla, The Electronics Society, Indian Institute of Information Technology, Allahabad</b> jointly organized the institute level project competition named as “PROJECT CARNIVAL”. 
				</p>

                <p>
                	Around 20 teams (including the students from B.Tech., Electronics and Communication Engineering, Information Technology and Biomedical Engineering form all the years) were registered for the event. Mostly the project were some working, demonstrating hardware models solving problems from various domains. The students actively participated and showcased their models, as result event turned out to be a huge success. The technical merit of the projects/models were judged by Dr. Satish Kumar Singh and Dr. Manish Goswami. The winners were announced on the basis of judging and were awarded the certificates on 2nd Nov 2014
                    <div class = "imp">Venue:</div> CC-3, IIIT-Allahabad
                    <a href="gallery/"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to go to the gallery</span></a>
					<br>
					<a target="_blank" href="documents/Report_15_10_2014_2.pdf"><span style="color: #2222cc;text-decoration: underline;float: right;">Click here to download the full report</span></a>
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
