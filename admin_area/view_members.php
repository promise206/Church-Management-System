<table width="750" align="center" style="background: white;">
	
<tr align="center">
	<td colspan="6"><h3>View All Members Here</h3></td>
</tr>

	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Email</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Phone No</th>
		<th>Date</th>
		<th>Image</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php
	include("includes/db.php");

	$get_member = "select * from members LIMIT 0,11";

	$run_member = mysqli_query($con, $get_member);

	$i = 0;
	while ($row_member = mysqli_fetch_array($run_member)) {
		$member_email = $row_member['email'];
		$member_id = $row_member['member_id'];
		$member_firstname = $row_member['first_name'];
		$member_lastname= $row_member['last_name'];
		$member_phoneno= $row_member['phone_no'];
		$member_date = $row_member['date'];
		$member_image = $row_member['image'];
		$i++;
	?>
	<tr align="center">
		
		<td><?php echo $i; ?></td>
		<td><?php echo $member_email; ?></td>
		<td><?php echo $member_firstname; ?></td>
		<td><?php echo $member_lastname; ?></td>
		<td><?php echo $member_phoneno; ?></td>
		<td><?php echo $member_date; ?></td>
		<td><img src="../members/members_images/<?php echo $member_image;?>" width="50" height="50"/></td>
		<td><a href="index.php?edit_member=<?php echo $member_id; ?>">Edit</a></td>
		<td><a href="index.php?delete_member=<?php echo $member_id; ?>">Delete</a></td>

	</tr>
<?php } ?>
</table>