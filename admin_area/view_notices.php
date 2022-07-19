	<h3 style="text-align: center;text-decoration: underline;">NOTICES</h3>

	<?php

	$get_notice = "select * from notices";

	$run_notice = mysqli_query($con, $get_notice);

	$i = 0;
	while ($row_notice = mysqli_fetch_array($run_notice)) {
		$notice_title = $row_notice['notices_title'];
		$notice_id = $row_notice['notices_id'];
		$i++;

		echo "$i. $notice_title

		<a href='index.php?edit_notice= $notice_id'><button type='submit' name='notice' class='btn btn-success'>Edit</button>
		</a>
		
		<a href='index.php?delete_notice= $notice_id'><button type='submit' name='details' class='btn btn-danger'>Delete</button></a>

		<br>";
			}
	?>
		
		