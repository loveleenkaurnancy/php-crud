<?php
include("action.php");


  if (isset($_GET['edit']))
  {
    $id = $_GET['edit'];
    $update = true;
    $query = mysqli_query($con, "SELECT * FROM student WHERE id=$id");

    if (mysqli_num_rows($query) > 0 )
    {
    	$row = mysqli_fetch_array($query);
    	$name = $row['name'];
    	$address = $row['address'];
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php if (isset($_SESSION['message']))
{
	echo $_SESSION['message'];
	unset($_SESSION['message']);
}
?>

	<form method="post" action="action.php">
	
    	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="text" name="name" placeholder="Enter Your Name" value="<?php echo $name; ?>"><br>
		<input type="text" name="address" placeholder="Enter Your address" value="<?php echo $address; ?>"><br>
		
		<?php
			if($update == true)
			{
		?>
				<button type="submit" name="update">Update</button>
		<?php
			}
			else
			{
		?>
				<button type="submit" name="submit">Register</button>
		<?php
			}
		?>

			
	</form>

	<table border="1">
		<tr>
			<th>Sr. No.</th>
			<th>Name</th>
			<th>Adress</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>

		<?php
			$idd=0;
			$query = mysqli_query($con,"select * from student");
			while($row=mysqli_fetch_array($query))
			{
				$idd++;
				echo "<tr><td>$idd</td>";
				echo "<td>$row[name]</td>";
				echo "<td>$row[address]</td>";
				echo "<td><a href='index.php?edit=$row[id]'>update</a></td>";
				echo "<td><a href='action.php?del=$row[id]'>delete</a></td></tr>";
			}
		?>

	</table>

</body>
</html>