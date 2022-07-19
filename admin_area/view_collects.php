

	<?php

	$get_collects = "select * from collect";

	$run_collects = mysqli_query($con, $get_collects);

	$i = 0;
	while ($row_collects = mysqli_fetch_array($run_collects)) {
		$collect = $row_collects['collect'];
		$collect_id = $row_collects['collect_id'];
		$i++;

		echo "$i. $collect

		<a href='index.php?edit_collect= $collect_id'><button type='submit' name='details' class='btn btn-success'>Edit</button>
		</a>
		
		<a href='index.php?delete_collect= $collect_id'><button type='submit' name='details' class='btn btn-danger'>Delete</button></a>

		<br>";
			}
	?>
		
		