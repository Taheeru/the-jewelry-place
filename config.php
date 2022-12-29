<?php
 
	$con = mysqli_connect('localhost', 'root', '', 'blob');

	if ($con) {
		# code...
		echo "";
	}else{
		echo mysqli_error($con);
	} 

 
?>