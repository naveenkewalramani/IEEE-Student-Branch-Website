<?php
	require_once("includes/header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="images/ieee_merge.ico" />
	<title>Office Bearers - IEEE SB IIIT Allahabad</title>
	
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
			<div id="accordion">
				<h2><a href="#">IEEE-SB-IIITA (STB14321) Office Bearers (2016-17)</a></h2>
				<div>
					<table width="100%" border="0">
			            <tr>
			              <td><img src="images/professional team/vinod.jpg" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a href="https://sites.google.com/site/vkjatav1217/home">Vinod Kumar Jatav</a></b></h5></div>
			                Role : Chairperson<br>
					GSMIEEE: 92905735<br>
			               Email: vinodj217@gmail.com, vinodj217@ieee.org <br>
				       Mob No: (+91)9412169334<br>
			               PhD Research Scholar<br>
			              </td>
			            </tr>
						<tr>
			              <td width="15%"><img src="images/professional team/vijay.jpg" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a target="_blank" href = "https://sites.google.com/site/wwwvbsemwalcom/">Vijay Bhaskar Semwal</a></b></h5></div>
			                Role : Immediate-Past Chairperson<br>
					GSMIEEE: 93398659<br>
			                Email: vsemwal@gmail.com, Mob No: (+91)8874142887<br>
			                PhD Research Scholar<br>
			              </td>
			            </tr>
			           <tr>
			              <td><img src="images/professional team/SOURABH.JPG" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a href="https://in.linkedin.com/in/sourabh13">Sourabh Prakash</a></b></h5></div>
			                Role : Vice Chairperson<br>	
					GSMIEEE: 93217471<br>
			                Email: sprakash13@gmail.com, Mob No: (+91)7618005444<br>
			                PhD Research Scholar<br>
			              </td>
			            </tr>
						<tr>
			              <td><img src="images/professional team/padmakar.jpg" width="80" height="100" style="border-radius:50%;"/></td>
					<td><div><h5><b><a href="https://in.linkedin.com/pub/padmakar-pandey/21/54/53a">Padmakar Pandey</a></b></h5></div>
			                Role : Vice Chairperson<br>
					GSMIEEE: 93237189<br>
			                Email: rs175@iiita.ac.in, Mob No: (+91)7755866837<br>
			                PhD Research Scholar<br>
			               </td>
			            </tr>
			            <tr>
			              <td><img src="images/professional team/generic.jpg" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a target="_blank" href = "#">Sudhakar Mishra</a></b></h5></div>
			                Role : Secretary<br>
					GSMIEEE: 92496103<br>
					Email: rs163@iiita.ac.in, Mob No: (+91)8090900937<br>						
			                PhD Research Scholar<br>
			              </td>
			            </tr>
						<tr>
			              <td><img src="images/professional team/Venkat.jpg" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a target="_blank" href = "http://theroboticistvenkat.webs.com/">Venkat Beri</b></a></h4></div>
			                Role : Joint Secretary<br>
					GSMIEEE: 93237250<br>
			                Email: venkat.beri@outlook.com, Mob No: (+91)9169745241<br>
			                Integrated (M.Tech+PhD)<br>
			              </td>
			            </tr>						
			            <tr>		            
			              <td><img src="images/professional team/generic.jpg" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a target="_blank" href="#">Sumit Kumar</href="#"></a></b></h5></div>
			                Role : Treasurer<br>
					GSMIEEE: 93649243<br>
					Email: babbusumit@gmail.com, Mob No: (+91)8127710956<br>
					PhD Research Scholar<br>
			              </td>
			            </tr>
						<tr>
						<td><img src="images/professional team/sulyab.png" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a target="_blank" href = "http://profile.iiita.ac.in/IIT2014125">Sulyab Thottungal</b></a></h4></div>
			                Role : Chairperson, Event Management Committee<br>
					StMIEEE: 93926315<br>
					Email: iit2014125@iiita.ac.in, Mob No: (+91)9838216594<br>
			               	B.Tech IT<br>
			              </td>
						</tr>
						
					<tr>
		              			<td><img src="images/professional team/apurva.png" width="100" height="100" style="border-radius:50%;"/></td>
			              		<td><div><h4><b><a target="_blank" href = "http://profile.iiita.ac.in/IEC2014091">Apurva Gupta</b></a></h4></div>
			                	Role : Chairperson, Membership Committee<br>
			                	StMIEEE: 93938818<br>
			                	Email: iec2014091@iiita.ac.in, Mob No: (+91)7376351934<br>
						B.Tech ECE<br>
			              		</td>
		            		</tr>
						<tr>
						<td><img src="images/professional team/generic.jpg" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a href="#">Shrikant Malviya</b></a></h4></div>
			                Role : Chairperson, Handling Publication Committee<br>
					GSMIEEE: 92080805<br>
					Email: shrikant.iet6153@gmail.com, Mob No: (+91)9451851905<br>		
			                PhD Research Scholar<br><br>
			              </td>
						</tr>
						<tr>
						<td><img src="images/professional team/swapnaneel.png" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a target="_blank" href = "http://profile.iiita.ac.in/IIT2014111">Swapnaneel Nandy</b></a></h4></div>
			                Role : Chairperson, Web Management Committee<br>
					StMIEEE: 93926639<br>
					Email: iit2014111@iiita.ac.in, Mob No: (+91)8756438637<br>		
			                B.Tech IT<br>
			              </td>
						<tr>
						<tr>
		              	<td><img src="images/professional team/pratik.png" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a target="_blank" href = "http://profile.iiita.ac.in/IIT2014112">Pratik P. Mangalore</b></a></h4></div>
			                Role : Chairperson, Industry Interface Committee<br>
					StMIEEE: 93904379<br>
					Email: iit2014112@iiita.ac.in, Mob No: (+91)7703026714<br>		
			                B.Tech IT<br>
			              </td>
						</tr>
						<tr>
						  <td width="15%"><img src="images/professional team/Shivam.jpg" width="80" height="100" style="border-radius:50%;"/></td>
					        <td width="85%"><div><h4><b><br><a href="">Shivam</b></a></h4></div>
			                Role : Chairperson, Publicity Committee<br>
					StMIEEE: 93617272<br>
					Email: iit2014077@iiita.ac.in, Mob No: (+91)7839942679<br>
			                B.Tech Student<br>
						  </td>
						</tr>
						<tr>
		              	<td><img src="images/professional team/generic.jpg" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a target="_blank" href = "#">Vaibhav Malviya</b></a></h4></div>
			               	Role : Chairperson, Finance Committee<br>
					GSMIEEE: 93924434<br>
					Email: vaibsidea@gmail.com, Mob No: (+91)9628323336<br>		
			               	PhD Research Scholar<br>
			              </td>
						</tr>
						<tr>
		              	<td><img src="images/professional team/generic.jpg" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a target="_blank" href = "#">Punit Singh</b></a></h4></div>
			                Role : Chairperson, Program Committee<br>
					GSMIEEE: 93903876<br>
					Email: thepunitsingh@gmail.com<br>		
			                Integrated PHD Scholar<br>
			              </td>
						</tr>
			        </table>
				</div>


				<h2><a href="#">Office Bearers 2015-16</a></h2>
				<div>
					<table width="100%" border="0">
			            <tr>
			              <td><img src="images/professional team/vijay.jpg" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a target="_blank" href = "https://sites.google.com/site/wwwvbsemwalcom/">Vijay Bhaskar Semwal</a></b></h5></div>
			                Role : Chairperson<br>
							GSMIEEE: 93398659<br>
			                Email: vsemwal@gmail.com, Mob No: (+91)8874142887<br>
			                PhD Research Scholar<br><br>
			              </td>
			            </tr>
						<tr>
			              <td width="15%"><img src="images/professional team/avinash.jpg" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a target="_blank" href="http://avinashkumarsingh.in/">Avinash Kumar Singh</a></b></h5></div>
			                Role : Immediate-Past Chairperson<br>
							GSMIEEE: 92653107<br>
			                Email: avinashkumarsingh1986@gmail.com, Mob No: (+91)9807039372<br>
			                PhD Research Scholar<br><br>
			              </td>
			            </tr>
			           <tr>
			              <td><img src="images/professional team/dhiraj.jpg" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a target="_blank" href = "https://sites.google.com/site/dheersa90/home/">Dheeraj Chitara</b></a></h4></div>
			                Role : Vice Chairperson<br>
							GSMIEEE: 92927990<br>
			                Email: dheerajchitara@outlook.com, Mob No: (+91)8601920125<br>
			                PhD Research Scholar<br><br>
			              </td>
			            </tr>
						<tr>
			              <td><img src="images/professional team/SOURABH.JPG" width="80" height="100" style="border-radius:50%;"/></td>
					      <td><div><h5><b><a href="https://in.linkedin.com/in/sourabh13">Sourabh Prakash</a></b></h5></div>
			                Role : Vice Chairperson<br>
							Additional Role: Chairperson, Membership Committee<br>
							GSMIEEE: 93217471<br>
			                Email: sprakash13@gmail.com, Mob No: (+91)7618005444<br>
			                PhD Research Scholar<br><br>
			               </td>
			            </tr>
			            <tr>
			              <td><img src="images/professional team/shiv.jpg" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a target="_blank" href = "https://sites.google.com/site/shivram1987/">Shiv Ram Dubey</a></b></h5></div>
			                Role : Secretary<br>
							GSMIEEE: 92901910<br>
			                Email: shivram1987@gmail.com, Mob No: (+91)8127461014<br>
			                PhD Research Scholar<br><br>
			              </td>
			            </tr>
						<tr>
			              <td><img src="images/professional team/soumendu.jpg" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a target="_blank" href = " http://www.researchgate.net/profile/Soumendu_Chakraborty">Soumendu Chakraborty</a></b></h5></div>
			                Role : Joint Secretary<br>
							GSMIEEE: 93150548<br>
			                Email: rs169@iiita.ac.in, Mob No: (+91)9897043787<br>
			                PhD Research Scholar<br><br>
			              </td>
			            </tr>						
			            <tr>		            
			              <td><img src="images/professional team/vinod.jpg" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a target="_blank" href="https://in.linkedin.com/pub/vinod-kumar-jatav/3b/576/5a5">Vinod Kumar Jatav</href="#"></a></b></h5></div>
			                Role : Treasurer<br>
							GSMIEEE: 92905735<br>
			                Email: vinodj217@gmail.com, Mob No: (+91)9412169334<br>
			                PhD Research Scholar<br><br>
			              </td>
			            </tr>
						<tr>
						<td><img src="images/professional team/anush.jpg" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a target="_blank" href = "https://in.linkedin.com/in/anush5137">Anush Bekal</b></a></h4></div>
			                Role : Chairperson, Technical Event Management Committee<br>
							GSMIEEE: 92920835<br>
			                Email: anush5137@gmail.com, Mob No: (+91)8004857667<br>
			                PhD Research Scholar<br><br>
			              </td>
						</tr>
						<tr>
						<td><img src="images/professional team/padmakar.jpg" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a href="https://in.linkedin.com/pub/padmakar-pandey/21/54/53a">Padmakar Pandey</b></a></h4></div>
			                Role : Chairperson, Handling Publication Committee<br>
							GSMIEEE: 93237189<br>
			                Email: rs175@iiita.ac.in, Mob No: (+91)7755866837<br>
			                PhD Research Scholar<br><br>
			              </td>
						</tr>
						<tr>
						<td><img src="images/professional team/Venkat.jpg" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a target="_blank" href = "http://theroboticistvenkat.webs.com/">Venkat Beri</b></a></h4></div>
			                Role : Chairperson, Web Management Committee<br>
							GSMIEEE: 93237250<br>
			                Email: venkat.beri@outlook.com, Mob No: (+91)9169745241<br>
			                Integrated PhD Research Scholar<br><br>
			              </td>
						<tr>
						<tr>
		              	<td><img src="images/professional team/apoorva.jpg" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h5><b><a target="_blank" href = "https://www.facebook.com/profile.php?id=100002006748233&fref=ts">Apoorva Agrawal</b></a></h4></div>
			                Role : Chairperson, Industry Interface Committee<br>
							StMIEEE: 92959249<br>
			                Email: iec2013050@iiita.ac.in, Mob No: (+91)8173866538<br>
			                B.Tech Student<br><br>
			              </td>
						</tr>
						<tr>
						  <td width="15%"><img src="images/professional team/Shivam.jpg" width="80" height="100" style="border-radius:50%;"/></td>
					        <td width="85%"><div><h4><b><br><a href="">Shivam</b></a></h4></div>
			                Role : Chairperson, Publicity Committee<br>
							StMIEEE: 93617272<br>
							Email: iit2014077@iiita.ac.in, Mob No: (+91)7839942679<br>
			                B.Tech Student<br><br>
						  </td>
						</tr>
			        </table>
				</div>

				
				<h2><a href="#">Office Bearers 2014-15</a></h2>
				<div>
					<table width="100%" border="0">
			            <tr>
			              <td width="15%"><img src="images/professional team/avinash.jpg" width="80" height="100" style=""/></td>
			              <td><div><h5><b><a target="_blank" href="http://avinashkumarsingh.in/">Avinash Kumar Singh</a></b></h5></div>
			                Role : Chairperson<br>
			                Email: avinashkumarsingh1986@gmail.com<br>
			                PhD Research Scholar<br><br>
			              </td>
			            </tr>
						<tr>
			              <td><img src="images/professional team/vijay.jpg" width="80" height="100" style=""/></td>
			              <td><div><h5><b><a target="_blank" href = "https://sites.google.com/site/wwwvbsemwalcom/">Vijay Bhaskar Semwal</b></a></h4></div>
			                Role : Vice Chairperson<br>
			                Email: vsemwal@gmail.com<br>
			                PhD Research Scholar<br><br>
			              </td>
			            </tr>
			            <tr>
			              <td><img src="images/professional team/shiv.jpg" width="80" height="100" style=""/></td>
			              <td><div><h5><b><a target="_blank" href = "https://sites.google.com/site/shivram1987/">Shiv Ram Dubey</a></b></h5></div>
			                Role : Secretary<br>
			                Email: shivram1987@gmail.com<br>
			                PhD Research Scholar<br><br>
			              </td>
			            </tr>
			            <tr>		            
			              <td><img src="images/professional team/vinod.jpg" width="80" height="100" style=""/></td>
			              <td><div><h5><b><a target="_blank" href="https://in.linkedin.com/pub/vinod-kumar-jatav/3b/576/5a5">Vinod Kumar Jatav</href="#"></a></b></h5></div>
			                Role : Treasurer<br>
			                Email: vinodj217@gmail.com<br>
			                PhD Research Scholar<br><br>
			              </td>
			            </tr>
					    <tr>
					      <td><img src="images/professional team/anush.jpg" width="80" height="100" style=""/></td>
					      <td><div><h5><b><a target="_blank" href = "https://in.linkedin.com/in/anush5137">Anush Bekal</b></a></h4></div>
					        Role : Mentor, Technical Event Management Committee<br>
					        Email: anush5137@gmail.com<br>
			                PhD Research Scholar<br><br>
					      </td>
					    </tr>
					    <tr>
					      <td><img src="images/professional team/dhiraj.jpg" width="80" height="100" style=""/></td>
					      <td><div><h5><b><a target="_blank" href = "http://chitaradheeraj.webs.com/">Dheeraj Chitara</b></a></h4></div>
					        Role : Mentor, Publicity &amp; Membership Committee<br>
							Email: dheerajchitara@outlook.com<br>
					        PhD Research Scholar<br><br>
						  </td>
					    </tr>
						<tr>								
						  <td width="15%"><img src="images/professional team/SOURABH.JPG" width="80" height="100" style=""/></td>
					      <td width="85%"><div><h4><b><br><a href="https://in.linkedin.com/in/sourabh13">Sourabh Prakash</b></a></h4></div>
					        Role : Handling Publication<br>
					        Email: sprakash13@gmail.com<br>
			                PhD Research Scholar<br><br>
					      </td>
						</tr>
						<tr>
					      <td><img src="images/professional team/Venkat.jpg" width="80" height="100" style="" /></td>
					      <td><div><h5><b><a target="_blank" href = "http://theroboticistvenkat.webs.com/">Venkat Beri</b></a></h4></div>
					        Role : Mentor, Web Management<br>
						    Email: venkat.beri@outlook.com<br>
					    	Integrated PhD Research Scholar<br><br>
					      </td>
					    </tr>						
					</table>
				</div>
				
				<h2><a href="#">Office Bearers 2013-14</a></h2>
				<div>
					<table width="100%" border="0">
			            <tr>
			              <td width="15%"><img src="images/professional team/pkatare.jpg" width="80" height="100" style=""/></td>
			              <td><div><h5><b><a target="_blank" href="">Prateek Katare</a></b></h5></div>
			                Role : Chairperson<br>
			                Email: prateek.katare@gmail.com<br>
			                M.Tech Student<br><br>
			              </td>
			            </tr>
						<tr>
			              <td><img src="images/professional team/nehasakhuja.jpg" width="80" height="100" style=""/></td>
			              <td><div><h5><b><a target="_blank" href = "">Neha Sakhuja</b></a></h4></div>
			                Role : Vice Chairperson<br>
			                Email: nehasakhuja2812@gmail.com<br>
			                M.Tech Student<br><br>
			              </td>
			            </tr>
			            <tr>
			              <td><img src="images/professional team/shobhit.jpg" width="80" height="100" style=""/></td>
			              <td><div><h5><b><a target="_blank" href = "">Shobhit Singh</a></b></h5></div>
			                Role : Secretary<br>
			                Email: shobhit96@gmail.com<br>
			                M.Tech Student<br><br>
			              </td>
			            </tr>
			             <tr>
			              <td width="15%;"><img src="images/professional team/rsgupta.jpg" width="80" height="100" style=""/></td>
			              <td width="85%;"><div><h4><b><br><a target="_blank" href="">Radhey Shyam Gupta</a></b></h5></div>
			                Role : Treasurer<br>
			                Email: shyamradhey.gpt@gmail.com<br>
			                M.Tech Student<br><br>
			              </td>
						</tr>
						<tr>
					      <td><img src="images/professional team/avinash.jpg" width="80" height="100" style="" /></td>
					      <td><div><h5><b><a target="_blank" href = "http://avinashkumarsingh.in/">Avinash Singh Rathore</b></a></h4></div>
					        Role : Mentor, Web Management<br>
					        Email: avinashkumarsingh1986@gmail.com<br>
			                PhD Research Scholar<br><br>
					      </td>
					    </tr>
						<tr>		
					      <td width="15%"><img src="images/professional team/anup.jpg" width="80" height="100" style=""/></td>
					      <td width="85%"><div><h4><b><br><a href="">Anup Nandi</b></a></h4></div>
					        Role : Handling Publication<br>
					        Email: rs113@iiita.ac.in<br>
			                PhD Research Scholar<br><br>
					      </td>
						</tr>
					    <tr>
					      <td><img src="images/professional team/vijay.jpg" width="80" height="100" style=""/></td>
					      <td><div><h5><b><a target="_blank" href = "https://sites.google.com/site/wwwvbsemwalcom/">Vijay Bhaskar Semwal</b></a></h4></div>
					        Role : Mentor, Publicity &amp; Membership Committee<br>
					        Email: vsemwal@gmail.com<br>
			                PhD Research Scholar<br><br>
					      </td>
					    </tr>
					    <tr>
					      <td><img src="images/professional team/anush.jpg" width="80" height="100" style=""/></td>
					      <td><div><h5><b><a target="_blank" href = "https://in.linkedin.com/in/anush5137">Anush Bekal</b></a></h4></div>
					        Role : Mentor, Technical Event Management Committee<br>
					        Email: anush5137@gmail.com<br>
			                PhD Research Scholar<br><br>
					      </td>
					    </tr>
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
			Copyright © 2014, IEEE Student Branch IIIT Allahabad (Web: ieee.sb.iiita.ac.in; Email: ieee.sb@iiita.ac.in)
	    </div> <!-- END of templatemo_footer -->
</div> <!-- END of templatemo_wrapper -->
</body>

</html>
