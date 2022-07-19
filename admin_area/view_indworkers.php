<table width="750" align="center" style="background: white;">
	
<tr align="center">
	<td colspan="6"><h3>View All Members Here</h3></td>
</tr>

	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Category</th>
		<th>Ordained</th>
		<th>Died</th>
		<th>Image</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php
	include("includes/db.php");

	$get_worker = "select * from ind_workers";

	$run_worker = mysqli_query($con, $get_worker);

	$i = 0;
	while ($row_worker = mysqli_fetch_array($run_worker)) {
		$worker_id = $row_worker['worker_id'];
		$worker_firstname = $row_worker['worker_firstname'];
		$worker_lastname = $row_worker['worker_lastname'];
		$worker_cat = $row_worker['worker_cat'];
		$worker_image = $row_worker['image'];
		$ordained = $row_worker['ordained_on'];
		$died = $row_worker['died_on'];
		$i++;
	?>
	<tr align="center">
		
		<td><?php echo $i; ?></td>
		<td><?php echo $worker_firstname; ?></td>
		<td><?php echo $worker_lastname; ?></td>
		<td><?php echo $worker_cat; ?></td>
		<td><?php echo $ordained; ?></td>
		<td><?php echo $died; ?></td>
		
		<td><img src="../indworkers/indworkers_images/<?php echo $worker_image;?>" width="50" height="50"/></td>
		<td><a href="index.php?edit_worker=<?php echo $worker_id; ?>">Edit</a></td>
		<td><a href="index.php?delete_worker=<?php echo $worker_id; ?>">Delete</a></td>

	</tr>
<?php } ?>
</table>