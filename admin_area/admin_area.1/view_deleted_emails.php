<table width="750" align="center" style="background: white;">
	
<tr align="center">
	<td colspan="6"><h3>View All Deleted Emails</h3></td>
</tr>
    <?php if (isset($_GET['msg'])): ?>
    <p class="success"><?php echo $_GET['msg'] ?></p> 
    <?php endif; ?>

	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Reciever Email</th>
		<th>Sender Email</th>
		<th>Subject</th>
		<th>Date & Time</th>
		<th>Read</th>
		<th>Delete</th>
	</tr>
	<?php
	include('admin.class.php');
	$data = new admin();

	$post_data = $data->select_deleted_emails("messages");
	$i = 1;
	foreach ($post_data as $post) 
	{
		?>
		
	<tr align="">
	
		<td><?php echo $i; ?></td>
		<td><?php echo $post["email"]; ?></td>
		<td><?php echo $post["from"]; ?></td>
		<td><?php echo $post["subject"]; ?></td>
		<td><?php echo  date('Y-m-d h:i a', $post["time"]); ?></td>
		<td><a href="dashboard.php?read_mail=<?php echo $post['id'] ?>">Read</a></td>
		<td><a href="delete_mail.php?delete_mail=<?php echo $post['id']; ?>">Delete</a></td>

	</tr>
<?php $i++; } ?>
</table>