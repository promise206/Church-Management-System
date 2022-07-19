<table width="750" align="center" style="background: white;">
	
<tr align="center">
	<td colspan="6"><h3>View All Sliders Here</h3></td>
</tr>

	<tr align="" bgcolor="skyblue">
		<th>S.N</th>
		<th>Title</th>
		<th>Image</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php
	include("includes/db.php");

	$get_slider = "select * from slider ";

	$run_slider = mysqli_query($con, $get_slider);

	$i = 0;
	while ($row_slider = mysqli_fetch_array($run_slider)) {
		$slider_id = $row_slider['slider_id'];
		$slider_title = $row_slider['slider_title'];
		$slider_image = $row_slider['slider_image'];
		$i++;
	?>
	<tr align="">
		
		<td><?php echo $i; ?></td>
		<td><?php echo $slider_title; ?></td>
		<td><img src="slider_images/<?php echo $slider_image;?>" width="50" height="50"/></td>
		<td><a href="index.php?edit_slider=<?php echo $slider_id; ?>">Edit</a></td>
		<td><a href="index.php?delete_slider=<?php echo $slider_id; ?>">Delete</a></td>

	</tr>
<?php } ?>
</table>