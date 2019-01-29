
<?php
require_once "Item.php";
session_start();
//twix 1, kit 2, mars 3

//connect to database (only connects if $_COOKIE['userid'] matches table entry)
$mysqli = new mysqli("localhost", "phpmyadmin", "embedded", "phpmyadmin");

//select row corresponding to user token in cookie
$selectCart = "SELECT userid, numtwix, numkit, nummars FROM usercart WHERE userid='$_COOKIE[userid]'";
	
//fetch entire row		
if ($result = $mysqli->query($query)) {

	/* fetch object array */
	while ($row = $result->fetch_row()) {
		$numtwix = $row[1];
		$numkit = $row[2];
		$nummars = $row[3];
		printf ("%s (%s)\n", $row[0], $row[1]);
	}

	/* free result set */
	$result->close();
}
	


//create KitKat object for use of methods for adding, setting, getting
$kitkat = new KitKat();

//after importing table data, set kitkat object with correct current number
$kitkat->setItemNum($numkit);
$kitkat->addItemNum(1);

$currkit= $kitkat->getItemNum();
//get total cost 
$cost = $kitkat->getCost();

//update table with correct number of items
$cartupdate = mysql_query("UPDATE usercart SET numkit = $currkit WHERE userid='$_COOKIE[userid]'")
	or die("Could not update database: " . mysql_error());
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
	<p class="title"> shopCart | Add/Remove Items</p>	
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
		<h4>Your item has been added!</h4>
			<a href= "frontpage.php"> <button type="button" class="btn btn-success">Click here to keep shopping </button></a>
    </div>
    <div class="col-sm-4">
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
		<h3>Kit Kat Chunky!</h3>
		<img class="img-thumbnail" width="304" height="236" src = "http://thumbs1.ebaystatic.com/d/l225/m/mZs9BTHDJ3Nn5aP1UOBGIcA.jpg">
		<p class="well">Price: $3.99/ea </p>
	</div>
    <div class="col-sm-4">
    </div>
  </div>
</div>
