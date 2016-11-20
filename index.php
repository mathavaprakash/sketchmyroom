 <!DOCTYPE HTML>
<html>
	<head>
	<?php
	            
                  session_start();
                include_once "assets/db/dbconnect.php";
                   
				   
		?>
		<title>Login | SketchMyRoom</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="images/logo.png" />
		<link rel="stylesheet" href="assets/css/main.css" />
		
		<script type="text/javascript">
            /* <![CDATA[ */
            jQuery(function(){
                jQuery("#user").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter username"
                });
                jQuery("#pwd").validate({
                    expression:"if (VAL>=4) return true; else return false;",
                    message:"Please enter valid password"
                });
                
            });
                </script>
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				
			<!-- Main -->
				
                <section id="main" class="container">
                    <div class="row">
						<div class="12u">					<!-- Form -->
                            <section id="cta">
							
                                <h2> Sketch My Room </h2>
								<h3> Sign In </h3>
                                <form method="post" action="#">
                                    
                                    <div class="row uniform 50%">
                                            <div class="12u 12u(mobilep)">
                                                    <input type="text" name="username" id="user" value="" placeholder="UserName" />
                                            </div>
                                    </div>
                                    <div class="row uniform 50%">
                                                <div class="12u 12u(mobilep)">
                                                    <input type="password" name="password" id="pwd" value="" placeholder="Password" />
                                                </div>
                                    </div>
									
                                    <div class="row uniform 50%">
                                        <div class="12u 12u(mobilep)">	
                                            <input type="submit" value="Log In"/>
                                            <input type="reset" class="button alt"value="Reset"/>
											
                                            <!--<a href="#" class="button special fit">Log In</a>	-->			
                                        </div>                         
                                    </div><br/>
                                                    
				</form>
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
						
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Mathavaprakash. All rights reserved.</li>
				</ul>
				</footer>
		</div>

		<!-- Scripts -->
			<!--<script src="assets/js/jquery.min.js"></script>-->
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

                        
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
           
            $uname=mysql_real_escape_string($_POST['username']);
            $pwd=mysql_real_escape_string($_POST['password']);
            if (!$conserver) echo "connection  cannot connect";
			
            if(!$condb) echo "cannot connect db ";
            $query=  mysql_query("select * from user",$conserver);
			$exist=  mysql_num_rows($query);
            $table_username="";
			$table_pwd="";
            
            $tem=0;
            if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                   
                    $table_username=$row['userid'];
                    $table_pwd=$row['Password'];
                    
                    if($uname==$table_username and $pwd==$table_pwd) 
                    {
                        $tem=2;
                        
                        $_SESSION['encregno']=  encryptor('encrypt', $uname);
						print '<script>window.location.assign("events.php");</script>';		
                        
                    }
                   
                }
                if($tem!=2)
                {
                    print '<script>alert("Username or Password Incorrect. Please try again.")</script>';
                    print '<script>window.location.assign("index.php");</script>';
                }
                
            }
            
        }    
        ?>
	</body>
</html>