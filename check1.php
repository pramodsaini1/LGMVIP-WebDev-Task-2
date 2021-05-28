<?php
        if(empty($_POST["email"])|| empty($_POST["pass"])){
			header("location:login_portfolio.php?error = 1") ;
		}
		else{
			
			$email = $_POST["email"] ;
			$pass  = $_POST["pass"] ;
			 
			$conn=mysqli_connect("localhost","root","","university");
			$rs=mysqli_query($conn,"select * from cet where email='$email'");
		    if($r=mysqli_fetch_array($rs)){
		       if($r["password"]==$pass){
				   setcookie("login",$email,time()+3600);
				   header("location:portfolio_profile.php");
			   }
			   else{
				   header("location:login_portfolio.php?checkpass=1");
			   }
		    }
			else{
				header("location:login_portfolio.php?invalid=1");
			}
		}
		
?>