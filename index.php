<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php require_once 'process.php'; ?>

	<?php 
		$mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
		$result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
		//pre_r($result);
		//pre_r($result->fetch_assoc());
		//pre_r($result->fetch_assoc());
		//pre_r($result->fetch_assoc());
		?>

		<div class="row justify-content-center">
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Location</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				<?php
					while ($row=$result->fetch_assoc()):
				 ?>
				 <tr>
				 	<td>
				 		<?php echo $row['name']; ?>
				 	</td>
				 	<td>
				 		<?php echo $row['location']; ?>
				 	</td>
				 	<td>
				 		<a href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
				 		<a href="process.php?delete=<?php echo $row['id']; ?>">Del</a>
				 	</td>
				 </tr>
				<?php endwhile; ?>
			</table>

		</div>

		<?php
		function pre_r($array){
		echo '<pre>';
		print_r($array);
		echo '</pre>';	
	}
		?>
<form action="process.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<label>Name</label>
	<input type="" name="name" value="<?php echo $name; ?>" placeholder="name" >
	<br>
	<label>Brand</label>
	<input type="" name="location" value="<?php echo $location; ?>" placeholder="location">
	<br>
	<?php if ($update == true): ?>
	<button type="submit" name="update">Update</button>
	<?php else:

	 ?>
	<button type="submit" name="save">Save</button>
<?php endif; ?>
</form>
</body>
</html>