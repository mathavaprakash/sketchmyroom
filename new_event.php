<!DOCTYPE HTML>
<html>
	<head>
		<title>Create Event | SketchMyRoom</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="images/logo.png" />
		<link rel="stylesheet" href="assets/css/main.css" />
		
                <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(function(){
                jQuery("#class").validate({
                    expression: "if (VAL != '0') return true; else return false;",
                    message: "Please enter the Required field"
                });
                jQuery("#subject").validate({
                    expression:"if(VAL != '0') return true; else return false;",
                    message:"Please enter the Required field"
                });
                jQuery("#box1").validate({
                    expression:"if(VAL) return true; else return false;",
                    message:"Please enter the Required field"
                });
                jQuery("#stdate").validate({
                    expression:"if(VAL)return true; else return false;",
                    message:"Please enter the Required field"
                });
				jQuery("#enddate").validate({
                    expression:"if(VAL) return true; else return false;",
                    message:"Please enter the Required field"
                });
				jQuery("#box3").validate({
                    expression:"if(VAL) return true; else return false;",
                    message:"Please enter the Required field"
                });
				jQuery("#box5").validate({
                    expression:"if(VAL) return true; else return false;",
                    message:"Please enter the Required field"
                });
				
            });
            </script>
			
		<?php            
                   session_start();
                include_once "assets/db/dbconnect.php";
				if($_SESSION['encregno']){
                    }
                    else
                    {
                        header("location:index.php");
                    }
                    
                    $user_id=  encryptor('decrypt',$_SESSION['encregno']); 
                    $_SESSION['encregno']=encryptor('encrypt',$user_id); 
				
                    $query=  mysql_query("select * from user");
                    $exist=  mysql_num_rows($query);
                    $temp="0";
                    $table_fname="";
                    if($exist>0)
                    {
                        while($row=  mysql_fetch_assoc($query))
                        {
                            $table_userid=$row['userid'];
                            if($user_id==$table_userid)
                            {
                                $temp=1;
                                $table_fname=$row['name'];
                                break;
                            }
                        }
                        if($temp==0)
                        {
                             header("location:index.php");
                        }
                    }
                    
                    
                    
                ?>
	
	</head>
	<body  class="landing">
		<div id="page-wrapper">
			<div class="header-overlay">
			<!-- Header -->
				<header id="header" class="alt">
					<a href="../logout.php"><img src="logo.png" height="50" /></a>
					<nav id="nav">
						<ul>
							<li><a href="events.php">Home</a></li>
							<li><a href="new_event.php">Create Event</a></li>
							<li><a href="#" class="icon fa-angle-down"><?php  print "$table_fname"; ?></a></li>
                            <li><a href="logout.php" class="button">Log out</a></li>
						</ul>
					</nav>
				</header>
			</div>
			<section id="banner-empty">
					
				</section>

			<!-- Main -->
                    <section id="main" class="container">
                        
                    <div class="row">
						<div class="12u">
							<section id="cta">
							<!-- Form -->
								
									<h2>Enter Event Details</h2>
                            <form method="post" action="#" >
								
								<div class="row uniform 50%">
									<div class="12u 12u(mobilep)">
									<h4>Event title</h4>
                                        <input type="text" name="title" required="true" placeholder="Title" />
									</div>
								</div>
								
								<div class="row uniform 50%">
									<div class="12u 12u(mobilep)">
									<h4>Event Date</h4>
                                        <input type="datetime-local" name="date" required="true"/>
									</div>
								</div>
								<div class="row uniform 50%">
									<div class="12u 12u(mobilep)">
									<h4>Description</h4>
                                        <textarea placeholder="Enter Event Description" name="desc" required="true"></textarea>
									</div>
								</div>
								<div class="row uniform 50%">
									<div class="12u 12u(mobilep)">
									<h4>Event Type</h4>
                                        <select name="etype">
											<option value="0">Select Event Type</option>
											<option value="Public">Public</option>
											<option value="Private">Private</option>
											<option value="Anniversary">Anniversary</option>
											<option value="Others">others</option>
										</select>
									</div>
								</div>
								
								<div class="row uniform">
											<div class="12u">
												<ul class="actions">
													<li><input type="submit" value="Submit"/></li>
													<li><input type="reset" class="button alt"value="Reset"/></li>
												</ul>
											</div>
										</div>
								
                                    
                                                    
							</form>   
                        
                            
                        </section>
					</section>
                            
                           
                        
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Mathavaprakash. All rights reserved.</li>
					</ul>
				</footer>
                </section>
		</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/jquery.scrollgress.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>
                        
                        
    <?php
               
		$query=  mysql_query("select * from event");
		if($_SERVER['REQUEST_METHOD']=='POST') 
		{
		 
			$title =mysql_real_escape_string( $_POST['title']);
			
			$date=mysql_real_escape_string( $_POST['date']);
			$descr=mysql_real_escape_string( $_POST['desc']);
			$etype=mysql_real_escape_string( $_POST['etype']);
			
			
			$time_now=strtotime("now");
			$time=strtotime($date);
			if($title=="")
			{
				print '<script>alert("Enter Event title");</script>';
				print '<script>window.location.assign("new_event.php");</script>';
				exit;
			}
			if($descr=="")
			{
				print '<script>alert("Enter Event Description");</script>';
				print '<script>window.location.assign("new_event.php");</script>';
				exit;
			}
			if($etype=="0")
			{
				print '<script>alert("Select Event Type");</script>';
				print '<script>window.location.assign("new_event.php");</script>';
				exit;
			}
			
			if($time<$time_now)
			{
				print '<script>alert("you cant enter past event. please select future event date");</script>';
				print '<script>window.location.assign("new_event.php");</script>';
				exit;
			}
			
			mysql_query("INSERT INTO `event` (`title`, `body`, `date`, `type`) VALUES ('$title', '$descr', '$date', '$etype')");
			print '<script>alert("your Event created successfully");</script>';
			print '<script>window.location.assign("events.php");</script>';
    }

    ?>
	</body>
</html>