<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php require_once 'proc.php'; ?>
<?php $mysqli = new mysqli('localhost','root','','cars') or die(mysql_error($mysqli)); 
	$result = $mysqli->query("SELECT * FROM data") or die($mysqli->error());
	//$brand;
	//$model;
	//pre_r($result->fetch_assoc());
	//pre_r($result->fetch_assoc());
	//pre_r($result->fetch_assoc());
?>

<table>
	<thead>
		<tr>
			<th>Brand</th>
			<th>Model</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	<?php while ($row=$result->fetch_assoc()) {
	 ?>
	<tr>
		<td><?php echo $row['brand']; ?></td>
		<td><?php echo $row['model']; ?></td>
		<td>
			<a href="ind.php?edit=<?php echo $row['id']; ?>">Edit</a>
			<a href="ind.php?delete=<?php echo $row['id']; ?>">Delete</a>
		</td>
		
	</tr>
<?php } ?>
</table>

<?php
	function pre_r($array){
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}
?>

<form action="proc.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<label>Add car brand:</label>
	<br>
	<input type="" name="brand" placeholder="brand" value="<?php echo $brand; ?>">
	<br>
	<label>Add car model:</label>
	<br>
	<input type="" name="model" placeholder="model" value="<?php echo $model; ?>">
	<br>
	<?php if ($update == true) { ?>
	<button type="submit" name="update">Update</button>
    <?php }
    else { ?>

	<button type="submit" name="save">Save</button>
    <?php }?>

</form>
</body>
</html>