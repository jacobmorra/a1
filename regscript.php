<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel='stylesheet' href='style.css'/>
<link href="http://s3.amazonaws.com/codecademy-content/courses/ltp2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="jumbotron">
	<a href= "frontpage.php"> <img class="logo" src="greenCart.jpg"> </a>	
	<p class="title"> shopCart | New User Registration</p>
</div>

<?php
	if (isset($_POST["submit"]) && !empty($_POST["uname"]) && !empty($_POST["upass"]) && !empty($_POST["umail"])){
		echo "cant connect to phpmyadmin</h3>";
		$mysqli = new mysqli("localhost", "phpmyadmin", "embedded", "phpmyadmin");
		//$dbLocalhost = mysql_connect("13.59.242.162:3306", "phpmyadmin@localhost", "embedded")
		//		or die("Could not connect: " . mysql_error());
		
		echo "cant connect to db</h3>";
		//mysql_select_db("phpmyadmin", $dbLocalhost)
		//		or die ("Could not find database: " . mysql_error());

		$insertRec = "INSERT INTO userinfo (username, password, email) 
			VALUES ('$_POST[uname]', '$_POST[upass]', '$_POST[umail]')";
			
		echo "cant insert record</h3>";	
		if ($mysqli->query($insertRec) === TRUE) {
			echo "New record created successfully";
		} 
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		//mysqli_query($mysqli, $insertRec)
		//	or die("Could not insert user: " . mysql_error());
	}
	else if (isset($_POST["submit"]) && empty($_POST["uname"]) && empty($_POST["upass"]) && empty($_POST["umail"])){
	echo "Please enter a username. <br>";
	echo "Please enter a password.<br>";
	echo "Please enter an email.<br>";
	}
	else if (isset($_POST["submit"]) && !empty($_POST["uname"]) && empty($_POST["upass"]) && empty($_POST["umail"])){
	echo "Please enter a password.<br>";
	echo "Please enter an email.<br>";
	}
	else if (isset($_POST["submit"]) && empty($_POST["uname"]) && empty($_POST["upass"]) && !empty($_POST["umail"])){
	echo "Please enter a username.<br>";
	echo "Please enter a password.<br>";
	}
	else if (isset($_POST["submit"]) && empty($_POST["uname"]) && !empty($_POST["upass"]) && empty($_POST["umail"])){
	echo "Please enter a username.<br>";
	echo "Please enter an email.<br>";
	}
	else if (isset($_POST["submit"]) && empty($_POST["uname"]) && !empty($_POST["upass"]) && !empty($_POST["umail"])){
	echo "Please enter a username.<br>";
	}
	else if (isset($_POST["submit"]) && !empty($_POST["uname"]) && empty($_POST["upass"]) && !empty($_POST["umail"])){
	echo "Please enter a password.<br>";
	}
	else if (isset($_POST["submit"]) && !empty($_POST["uname"]) && !empty($_POST["upass"]) && empty($_POST["umail"])){
	echo "Please enter an email.<br>";
	}
else{
	echo "You are a spambot or other form of automation.. or you forgot to copy the captcha form.";
}
?>
