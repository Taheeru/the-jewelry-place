<?php

if (isset($_POST['submit'])) {
	# code...
	if (isset($_GET['id'])){
		$id = $_GET['id'];
	}
		$rand = rand(0000000, 9999999);

		$first_name 	= $_POST['fname']; 
		$last_name 		= $_POST['lname'];
		$country 		= $_POST['country'];
		$sname 			= $_POST['sname'];
		$addr 			= $_POST['addr'];
		$town 			= $_POST['town'];
		$state 			= $_POST['state'];
		$zip 			= $_POST['zip'];
		$phone 			= $_POST['phone'];
		$email 			= $_POST['mail'];
		$note 			= $_POST['note'];
		$tran_id 		= "DS-"+ $rand;
		$prod_id		= $id;

		if(empty($first_name) || empty($last_name) || empty($country) || empty($sname) || empty($addr) || empty($town) || empty($state) || empty($zip) || empty($phone) || empty($email)) {
                
        if(empty($first_name)) {
            echo "<font color='red'>first name field is empty.</font><br/>";
        }
        
        if(empty($last_name)) {
            echo "<font color='red'>last name field is empty.</font><br/>";
        }

        if(empty($country)) {
            echo "<font color='red'>last name field is empty.</font><br/>";
        }

        if(empty($addr)) {
            echo "<font color='red'>address field is empty.</font><br/>";
        }

        if(empty($state)) {
            echo "<font color='red'>state field is empty.</font><br/>";
        }
        
        if(empty($zip)) {
            echo "<font color='red'>postal code field is empty.</font><br/>";
        }

        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }

        if(empty($phone)) {
            echo "<font color='red'>phone field is empty.</font><br/>";
        }
        
        //link to the previous page\
        }else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database        
		$sql = "INSERT INTO delivery_details(prod_id, first_name, last_name, country, address, town, state, postal_code, phone, email, note, tran_id)";

		$sql .= " VALUES('$prod_id', $first_name', '$last_name','$country', '$address', '$town', '$state', '$postal_code', '$phone', '$email', '$note', '$tran_id')";

		$result = query($sql);
		confirm($result);
        
        // Alternative to above bindparam and execute
        // $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
        
        //display success message
        echo "<font color='green'>Data added successfully.";
    }
	
}

?>