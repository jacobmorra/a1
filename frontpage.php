<?php
session_start();

//if user is not logged into a session, give them guest page 
if (!isset($_SESSION['username'])){
	echo file_get_contents("http://ec2-13-59-242-162.us-east-2.compute.amazonaws.com/shopCart/frontguest.html");
}
//if user is logged into a session, give them full access
else{
	include 'frontuser.php';

	//echo file_get_contents("frontuser.php");
}
?>