<?php 
$mysqli = new mysqli('localhost','root','','cars') or die(mysql_error($mysqli));
$update = false;
$brand ='';
$id =0;
$model = '';
 if (isset($_POST['save'])) {
 	$brand = $_POST['brand'];
 	$model = $_POST['model'];
 	$mysqli->query("INSERT INTO data (brand,model) VALUES ('$brand','$model')") or 
 	die ($mysqli->error());

 	header("location:ind.php");
 }
if (isset($_GET['delete'])) {
 	$id = $_GET['delete'];
 	$mysqli->query("DELETE  FROM data WHERE id=$id") or die($mysqli->error());
 	header("location:ind.php");
 } 

 if (isset($_GET['edit'])) {
 	$id = $_GET['edit'];

 	$result = $mysqli->query("SELECT * FROM data WHERE id = $id") or die($mysqli->error());

 	$row = $result->fetch_array();
 	$model = $row['model'];
 	$brand = $row['brand'];
 	$update = true;
 }

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$brand = $_POST['brand'];
	$model = $_POST['model'];
	$mysqli->query("UPDATE data SET brand='$brand',model='$model' WHERE id ='$id'") or die($mysqli->error());
	header("location:ind.php");
}
?>