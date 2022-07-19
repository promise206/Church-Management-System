
<!--

RANDOM VALUES

-->



<form action="random_no.php" method="POST">
<label>First</label>
	<input type="text" name="first"><br>
	<label>second</label>
	<input type="text" name="second"><br>
	<input type="submit" name="roll" value="Submit">
</form>

<?php
/*
if (isset($_POST['roll'])) {

	$first = strtolower($_POST['first']);
	$second = strtolower($_POST['second']);

/*
	$char = $_POST['char'];
	$charlower = strtolower($char);
	$rand = rand(1, 6);
	$dice= 'You rolled '. $rand;
*/
/*
	if ($first==$second) {
		echo "correct";
	}else{
		echo "Bad result";
	}*/
	

	/*echo "<input type='text' value='$dice'><br>";
	echo "
	<label>Your Text To Small Letter</label>
	<input type='text' value='$charlower'><br>";


}*/

?>



<?php
$today   = Date("F");
echo $today;
?>