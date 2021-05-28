<?php
        if(empty($_POST["fname"])||empty($_POST["lname"])||empty($_POST["email"])||empty($_POST["pass"])){
			header("location:register_portfolio.php?empty = 1") ;
		}
		else{
			$fname = $_POST["fname"] ;
			$lname = $_POST["lname"] ;
			$email = $_POST["email"] ;
			$pass  = $_POST["pass"] ;
			$sn = 0 ;
			$conn  = mysqli_connect("localhost","root","","university") ;
			$rs  = mysqli_query($conn,"select MAX(sn) from cet") ;
			if($r = mysqli_fetch_array($rs)){
				$sn = $r[0] ;
			}
			$sn++ ;
			
			$code = " " ;
			$a = array() ;
			for($i = 'A';$i<='Z';$i++){
				  array_push($a,$i) ;
				    if($i=='Z') 
					   break ;
			}
			for($i = 'a';$i<='z';$i++){
				  array_push($a,$i) ;
				    if($i=='z') 
					   break ;
			}
			for($i = 0;$i<=9;$i++){
				  array_push($a,$i) ;
			}
			$b = array_rand($a,6) ;
			for($i=0;$i<sizeof($b);$i++){
				$code = $code.$a[$b[$i]] ;
			}
			$code = $code."_".$sn ;
			if(mysqli_query($conn,"insert into cet values($sn,'$code','$fname','$lname','$email','$pass')")>0){
				header("location:register_portfolio.php?success = 1") ;
			}
		    else{
				 header("location:register_portfolio.php?again = 1") ;
			}
		}
		
		
?>