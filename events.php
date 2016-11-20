<!DOCTYPE HTML>
<html>
	<head>
		<title>Events | SketchMyRoom</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
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
                    //$_SESSION['regno']=$user_id;
                    //$encrp=$_SESSION['encr'];  
                    
                    $query=  mysql_query("select * from user");
                    $exist=  mysql_num_rows($query);
                    $temp="0";
                    $table_fname="";
					$batch="";
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
                             header("location:../index.php");
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
		<section id="main" class="container 100%">
			<div class="row">
                <div class="12u">
					<section class="box">
						<div class="table-wrapper">
							<table class="alt">
								<thead>
									<tr>
										
										<th>SNo</th>
										<th>Date</th>
										<th>Title</th>
										<th>Description</th>
										
										<th>Event Type</th>
										<th>Delete</th>
										
										
									</tr>
                                <tbody>
								<?PHP
									$query=  mysql_query("select * from event ORDER BY `date` DESC");
									$exist=  mysql_num_rows($query);
									$temp="0";
									$table_id="";
									$table_title="";
									$sno=0;
									if($exist>0)
									{
										while($row=  mysql_fetch_assoc($query))
										{
											$table_id=$row['sno'];
											$encc_id=encryptor('encrypt',$table_id);
											$table_title=$row['title'];
											$body=$row['body'];
											$date=$row['date'];
											$type=$row['type'];
											$sno+=1;	
											?>
											<tr>
														
											<td><?php print "$sno"; ?></td>
											<td><?php print date("d-m-Y  h:i:sa",strtotime($date)); ?></td>
											
												<?PHP
													if( strtotime($date)>time())
													{
														?><td><ans_blue><?php print "$table_title"; ?></ans_blue></td>
														<?PHP
													}
													else
													{
														?><td><warning><?php print "$table_title"; ?></warning></td>
														<?PHP
													}
											
												?>				
														
												<td><?php print "$body"; ?></td>
												<td><?php print "$type"; ?></td>
												<td><a href="delete.php?id=<?php print "$encc_id"; ?>" > delete</a></td>
																	
														
												</tr>	
												<?php
										}
											
									}
								?>
                                    
                                             
                                    
								</tbody>
                            </table>
						</div>
					</section>
				</div>
			</div>
		</section>			
						
			<!-- Footer -->
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

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>