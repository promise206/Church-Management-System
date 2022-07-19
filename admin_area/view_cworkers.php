<table width="750" align="center" style="background: white;">
	
<tr align="center">
	<td colspan="6"><h3>View Current Workers</h3></td>
</tr>

	<tr align="" bgcolor="skyblue">
		<th>S.N</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Category</th>
		<th>Image</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php
	include("includes/db.php");

	$get_cworker = "select * from current_workers";

	$run_cworker = mysqli_query($con, $get_cworker);

	$i = 0;
	while ($row_cworker = mysqli_fetch_array($run_cworker)) {
		$cworker_id = $row_cworker['worker_id'];
		$cworker_firstname = $row_cworker['worker_firstname'];
		$cworker_lastname = $row_cworker['worker_lastname'];
		$cworker_cat = $row_cworker['worker_cat'];
		$cworker_image = $row_cworker['worker_image'];
		$i++;
	?>
	<tr align="">
		
		<td><?php echo $i; ?></td>
		<td><?php echo $cworker_firstname; ?></td>
		<td><?php echo $cworker_lastname; ?></td>
		<td><?php echo $cworker_cat; ?></td>
		
		<td><img src="../cworkers/images/<?php echo $cworker_image;?>" width="50" height="50"/></td>
		<td><a href="index.php?edit_cworkers=<?php echo $cworker_id; ?>">Edit</a></td>
		<td><a href="index.php?delete_cworkers=<?php echo $cworker_id; ?>">Delete</a></td>

	</tr>
<?php } ?>
</table>