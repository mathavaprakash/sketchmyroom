<?PHP
	session_start();
	include_once "assets/db/dbconnect.php";
	if($_SESSION['encregno']){
	}
	else
	{
		header("location:../index.php");
	}
	
	$user_id=  encryptor('decrypt',$_SESSION['encregno']); 
	$_SESSION['encregno']=encryptor('encrypt',$user_id); 
	$id=encryptor('decrypt',$_GET['id']);
	if(mysql_query("delete from event where sno=$id"))
	{
		print '<script>window.location.assign("events.php");</script>';
	}
	else
	{
		print '<script>alert("Error");</script>';
	}
?>