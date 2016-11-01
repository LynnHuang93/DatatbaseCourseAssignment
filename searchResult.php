<h2>Search Result</h2>
<table class="sortable" border="2" cellspacing="2" cellpadding="2">
	<tr>
		<th> mid </th>
		<th> mname </th>
		<th> budget </th>
		<th> gross </th>
		<th> actor details </th>
	</tr>

<?php
	$keyWord = "";
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $keyWord = htmlspecialchars($_POST["keyWord"]);
	}
	$db = new mysqli('localhost', 'root', '','actor_movie');
	if ( $db->connect_errno ) die("Database Connection Failed: ".$db->connect_error);
	$q = "SELECT mid, mname, budget, gross FROM movie WHERE mname LIKE '%$keyWord%' order by mname";
	$resource = $db->query($q);
	while ( $row = $resource->fetch_assoc() ) {
		$mid = $row['mid'];
		$mname = $row['mname'];
		$budget = $row['budget'];
		$gross = $row['gross'];
?>
<tr>
	<td> <?php echo $mid;?> </td>
	<td> <?php echo $mname;?> </td>
	<td> <?php echo $budget;?> </td>
	<td> <?php echo $gross;?> </td>
	<td> <?php echo('<a href="actorDetail.php?mid='.$mid.'">Details</a>');?></td>
</tr>

<?php
	}
	echo "</table>";
	$resource->free();
	$db->close();
?>