	<h3 style="text-align: center;text-decoration: underline;">SONGS</h3>

	<?php

	$get_song = "select * from songs LIMIT 0,18";

	$run_song = mysqli_query($con, $get_song);

	$i = 0;
	while ($row_song = mysqli_fetch_array($run_song)) {
		$song = $row_song['song'];
		$song_id = $row_song['song_id'];
		$i++;

		echo "$i. $song

		<a href='index.php?edit_song= $song_id'><button type='submit' name='notice' class='btn btn-success'>Edit</button>
		</a>
		
		<a href='index.php?delete_song= $song_id'><button type='submit' name='details' class='btn btn-danger'>Delete</button></a>

		<br>";
			}
	?>
		
		