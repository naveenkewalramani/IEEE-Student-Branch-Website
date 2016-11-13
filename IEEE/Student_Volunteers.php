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

    <!--		<h3><b>vkj Student Volunteers (2016-17)</b><h3>    -->  
 
        <div id="templatemo_content">

			<div id="accordion"> 
				<h2><a href="#">Handling Publication Committee</a></h2>
				<div>
				<table width="100%" border="0">
				<tr>
		              	<td><img src="images/professional team/generic.jpg" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h4><b><a target="_blank" href = "#">Rohit Mishra</b></a></h4></div>
			                Role : Co-ordinator<br>
					GSMIEEE: 93920832<br>
			                Email: rohit129.iiita@gmail.com<br>
					Integrated M.Tech+PhD<br>
			              </td>
		            	</tr>

				<tr>
		              	<td><img src="images/professional team/swapnil.jpg" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h4><b><a target="_blank" href = "#">Swapnil Singh</b></a></h4></div>
			                Role : Co-ordinator<br>
					StMIEEE: 93927634<br>
			                Email: ibm2012002@iiita.ac.in, ibm2012002_iiita@ieee.org <br>
					Mob No: (+91)7860393856<br>
					Integrated B.Tech+M.Tech (BME)<br><br>
			              </td>
	                        </tr>
			            
					<tr>
						<td>
							<div><h4>Others - </h4></div>
							<t>Will be updated soon..</t><br><br>
						</td>
					</tr>
          		</table>
				</div>
				
		                   
				<h2><a href="#">Technical Event Management Committee</a></h2>
				<div>
				<table width="100%" border="0">
					<tr>
		              		<td><img src="images/professional team/shantal.png" width="100" height="100" /></td>
			              <td><div><h4><b><a target="_blank" href = "#">Shantal Raj</b></a></h4></div>
			                Role : Coordinator<br>
			                StMIEEE: 93930443<br>
			                Email: iec2014056@iiita.ac.in, Mob No: (+91)7054910846<br>
					B.Tech ECE<br><br>
			              </td>
		            
					<tr>
						<td>
							<div><h4><b>Others - </b></h4></div><br>
							Will be Updated Soon..
						</td>
					</tr>
				</table>
				</div>  	

				<h2><a href="#">Publicity Committee</a></h2>
				<div>
				<table width="100%" border="0">
					<tr>
		              		<td>Will be Updated Soon..
			          	</td>
		            		</tr>
									
          			</table>
				</div>				
				
				<h2><a href="#">Industry Interface Committee</a></h2>
				<div>
				<table width="100%" border="0">
		            		<tr>
		              		<td>Will be Updated Soon..
					</td>
		            		</tr>
		            					
          			</table>
				</div>		

				<h2><a href="#">Membership Committee</a></h2>
				<div>
				<table width="100%" border="0">
					<tr>
		              		<td>Will be Updated Soon..
					</td>
		            		</tr>
		            				
          			</table>
				</div>
				
				<h2><a href="#">Web Management Committee</a></h2>
				<div>
				<table width="100%" border="0">
					<tr>
		              		<td>Will be Updated Soon..
					</td>
			        	</tr>
					
	          		</table>
				</div>
			
				<h2><a href="#">Finance & Accounts Committee</a></h2>
				<div>
				<table width="100%" border="0">
					<tr>
		              		<td>Will be Updated Soon..
					</td>
			        	</tr>
					
	          		</table>
				</div>

				<h2><a href="#">Program Schedule Committee</a></h2>
				<div>
				<table width="100%" border="0">
					<tr>
		              		<td>Will be Updated Soon..
					</td>
			        	</tr>
					
	          		</table>
				</div>
						
	
				
		
        </div> <!-- END of templatemo_content -->
        
	<div class="clear"></div>

     <!--  vkj 2016-17 End-->

		
	<!--	<div id="templatemo_content">	
        	<h3><b>Student Volunteers (2015-16)</b><h3>
			<div id="accordion"> 
				<h2><a href="#">Technical Event Management Committee</a></h2>
				<div>
				<table width="100%" border="0">
					<tr>
		              	<td><img src="images/professional team/sulyab.png" width="100" height="100" /></td>
			              <td><div><h4><b><a target="_blank" href = "http://profile.iiita.ac.in/IIT2014125">Sulyab Thuttongal</b></a></h4></div>
			                Role : Co-ordinator<br>
			                B.Tech IT<br>
			                Mob No: (+91)9838216594<br>
			                Email: iit2014125@iiita.ac.in<br>
			              </td>
		            </tr>
					<tr>
		              	<td><img src="images/professional team/pratik.png" width="100" height="100" /></td>
			              <td><div><h4><b><a target="_blank" href = "http://profile.iiita.ac.in/IIT2014112">Pratik Mangalore</b></a></h4></div>
			                Role : Co-ordinator<br>
			                B.Tech IT<br>
			                Mob No: (+91)7703026704<br>
			                Email: iit2014112@iiita.ac.in<br>
			              </td>
		            </tr>
		            <tr>
		              	<td><img src="images/professional team/vartika.jpg" width="100" height="100" style="border-radius:50%;"/></td>
			              <td><div><h4><b><a target="_blank" href = "http://profile.iiita.ac.in/IIT2014135">Vartika Singh</b></a></h4></div>
			                Role : Co-ordinator<br>
			                B.Tech IT<br>
			                Mob No: (+91)<br>
			                Email: iit2014135@iiita.ac.in<br>
			              </td>
		            </tr>
					<tr>
						<td>
							<div><h4><b>Others - </b></h4></div><br>
							Nikhil Ranjan (IIT2014129)<br>
							Geetha Madhuri (IIT2014123)<br>
							Varun Kumar (ICM2014008)<br>
							Faheem H.Zunjani (IIT2015113)<br>
							Shefali Verma (IIT2015031)<br>
							Sushmita Gayen (IEC2015024)<br>
							Jayati Chandra (ICM2015005)<br>
							Aditya Dewan (IIT2015097)<br>
							Tanisha Keshri (IIT2015125)<br>
							Sandeep K. Singh (IIT2015014)<br>
							N.Anusha (IIT2015116)<br>
						</td>
					</tr>
				</table>
				</div>

				<h2><a href="#">Publicity And Membership Committee</a></h2>
				<div>
				<table width="100%" border="0">
					<tr>
		              	<td><img src="images/professional team/apurva.png" width="100" height="100" style="border-radius:50%;"/></td>
			              <td><div><h4><b><a target="_blank" href = "http://profile.iiita.ac.in/IEC2014091">Apurva Gupta</b></a></h4></div>
			                Role : Co-ordinator<br>
			                B.Tech ECE<br>
			                Mob No: (+91)7376351934<br>
			                Email: iec2014091@iiita.ac.in<br>
			              </td>
		            </tr>
					<tr>
		              	<td><img src="images/professional team/Anindya Mukherjee.jpg" width="100" height="100" style="border-radius:50%;"/></td>
			              <td><div><h4><b><a target="_blank" href = "http://profile.iiita.ac.in/IEC2014051">Anindya Mukherjee</b></a></h4></div>
			                Role : Co-ordinator<br>
			                B.Tech ECE<br>
			                Mob No: (+91)<br>
			                Email: iec2014051@iiita.ac.in<br>
			              </td>
		            </tr>
					<tr>
						<td>
							<div><h4><b>Others - </b></h4></div><br>
							Divyesh Soni (IIT2014079)<br>
							Ritika Motwani (IIT2015096)<br>
							Manasi Mohandas (IHM2015001)<br>
							Jayesh Patil (IIT2015064)<br>
							Sonal Gupta (IEC2015050)<br>
							Sagar (IEC2015029)<br>
							Priyanka Singla (ISM2015004)<br>
							Ishani Mishra (IWM2015008)<br>
							Chaitanya Yadav (IIT2015120)<br>
						</td>
					</tr>
          		</table>
				</div>				
				
				<h2><a href="#">Industry Interface Committee</a></h2>
				<div>
				<table width="100%" border="0">
		            <tr>
		              	<td><img src="images/professional team/Utkarsh.jpg" width="100" height="100" style="border-radius:50%;"/></td>
			              <td><div><h4><b><a target="_blank" href = "https://in.linkedin.com/in/1312utkarshagarwal">Utkarsh Agrawal</b></a></h4></div>
			                Role : Coordinator<br>
			                B.Tech IT<br>
			                Mob No: (+91)8172888611<br>
			                Email: iit2013115@iiita.ac.in<br>
			              </td>
		            </tr>
		            <tr>
		              	<td><img src="images/professional team/bhavana.jpg" width="100" height="100" style="border-radius:50%;"/></td>
			              <td><div><h4><b><a target="_blank" href = "https://in.linkedin.com/pub/bhavana-puthi/89/748/913">Bhavana Puthi</b></a></h4></div>
			                Role : Coordinator<br>
			                B.Tech ECE<br>
			                Mob No: (+91)<br>
			                Email: iec2013034@iiita.ac.in<br>
			              </td>
		            </tr>
		            <tr>
		              	<td><img src="images/professional team/shantal.png" width="100" height="100" /></td>
			              <td><div><h4><b><a target="_blank" href = "http://profile.iiita.ac.in/IEC2014056">Shantal Raj</b></a></h4></div>
			                Role : Coordinator<br>
			                B.Tech ECE<br>
			                Mob No: (+91)7054910846<br>
			                Email: iec2014056@iiita.ac.in<br>
			              </td>
		            </tr>
					<tr>
						<td>
							<div><h4><b>Others - </b></h4></div><br>
							Suraj Prasad (IEC2013035)<br>
							Sumit Kumar Verma (IEC2013068)<br>
							Sweety (IEC2013015)<br>
							Vineel Reddy (IEC2013027)<br>
							Likitha (IMM2014123)<br>
							Shreerang (IMM2015001)<br>
							Praneetha (IIT2015106)<br>
							Sameer Namdeo (IEC2015051)<br>
						</td>
					</tr>
          		</table>
				</div>		

				<h2><a href="#">Handling Publication Committee</a></h2>
				<div>
				<table width="100%" border="0">
					<tr>
		              	<td><img src="images/professional team/pratyush.png" width="100" height="100" style="border-radius:50%;"/></td>
			              <td><div><h4><b><a target="_blank" href = "http://profile.iiita.ac.in/IBM2014008">Pratyush Singh</b></a></h4></div>
			                Role : Co-ordinator<br>
			                Dual Degree(B.Tech ECE + Bio-Med)<br>
			                Mob No: (+91)8604532739<br>
			                Email: ibm2014008@iiita.ac.in<br>
			              </td>
		            </tr>
		            <tr>
		              	<td><img src="images/professional team/smiti.png" width="100" height="100" style="border-radius:50%;"/></td>
			              <td><div><h4><b><a target="_blank" href = "http://profile.iiita.ac.in/IIT2014067">Smiti Maheshwari</b></a></h4></div>
			                Role : Co-ordinator<br>
			                B.Tech IT<br>
			                Mob No: (+91)7054024785<br>
			                Email: iit2014067@iiita.ac.in<br>
			              </td>
		            </tr>
					<tr>
						<td>
							<div><h4><b>Others - </b></h4></div><br>
							Kushagra Yadav (IIT2014075)<br>
							Radhika Chandak (LIT2015025)<br>
							Nishtha Sharma (LIT2015039)<br>
							Meha Ranjan (LIT2015008)<br>
						</td>
					</tr>
          		</table>
				</div>
				
				<h2><a href="#">Web Management Committee</a></h2>
				<div>
				<table width="100%" border="0">
					<tr>
		              	<td><img src="images/professional team/shelly.PNG" width="100" height="100" style="border-radius:50%;"/></td>
			              <td><div><h4><b><a target="_blank" href = "http://profile.iiita.ac.in/IIT2013008">Shelly Kashyap</b></a></h4></div>
			                Role : Co-ordinator<br>
			                B.Tech IT<br>
			                Mob No: (+91)9794172297<br>
			                Email: iit2013048@iiita.ac.in<br>
			              </td>
			        </tr>
					<tr>
		              	<td><img src="images/professional team/Kumar Sanyam.jpg" width="100" height="100" style="border-radius:50%;"style="border-radius:50%;"/></td>
			              <td><div><h4><b><a target="_blank" href = "http://profile.iiita.ac.in/IIT2013121">Kumar Sanyam</b></a></h4></div>
			                Role : With IEEE UPCON 2015<br>
			                B.Tech IT<br>
			                Mob No: (+91)<br>
			                Email: iit2013121@iiita.ac.in<br>
			              </td>
		            </tr>
		            <tr>
		              	<td><img src="images/professional team/Baishali Saha.jpg" width="100" height="100" style="border-radius:50%;"/></td>
			              <td><div><h4><b><a target="_blank" href = "http://profile.iiita.ac.in/IIT2013122">Baishali Saha</b></a></h4></div>
			                Role : With IEEE UPCON 2015<br>
			                B.Tech IT<br>
			                Mob No: (+91)<br>
			                Email: iit2013122@iiita.ac.in<br>
			              </td>
		            </tr>
		            <tr>
						<td><img src="images/professional team/swapnaneel.png" width="100" height="100" style="border-radius:50%;"style="border-radius:50%;"/></td>
			              <td><div><h4><b><a target="_blank" href = "http://profile.iiita.ac.in/IIT2014111">Swapnaneel Nandy</b></a></h4></div>
			                Role : Co-ordinator<br>
			                B.Tech IT<br>
			                Mob No: (+91)8756438637<br>
			                Email: iit2014111@iiita.ac.in<br>
			              </td>
					</tr>
					<tr>
						<td>
							<div><h4><b>Others - </b></h4></div><br>
							Amba Khare (IIT2013032)<br>
							Ruhi Singh (IIT2013005)<br>
							Amit Vijay (IIT2014110)<br>
							Sandeep Sharma (IIT2014073)<br>
							Kundan Sen (IIT2014105)<br>
							Amit Vijay (IIT2014110)<br>
							Sachin Agarwal (IIT2014501)<br>
							Shiv Pratap Singh (IIT2014121)<br>
							Akanshu Gupta (IWM2014501)<br>
							S. Akash (IIT2015067)<br>
						</td>
					</tr>
          		</table>
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
