<table width="750" align="center" style="background: white;">
	
<tr align="center">
	<td colspan="6"><h3>View All Users Here</h3></td>
</tr>

	<tr align="center" bgcolor="skyblue">
		<th>User Id</th>
		<th>Surname</th>
		<th>First Name</th>
		<th>Middle Name</th>
		<th>Username</th>
		<th>Address</th>
		<th>Mobile No</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php
	include('admin.class.php');
	$data = new admin();

	$post_data = $data->select_users("users");
	
	foreach ($post_data as $post) 
	{
		?>
		
	<tr align="">
	
		<td><?php echo $post["id"]; ?></td>
		<td><?php echo $post["surname"]; ?></td>
		<td><?php echo $post["firstname"]; ?></td>
		<td><?php echo $post["middlename"]; ?></td>
		<td><?php echo $post["email"]; ?></td>
		<td><?php echo $post["address"]; ?></td>
		<td><?php echo $post["phone"]; ?></td>
		<td><a href="#">Edit</a></td>
		<td><a href="delete_user.php?delete_user=<?php echo $post['id']; ?>">Delete</a></td>

	</tr>
<?php } ?>
</table>