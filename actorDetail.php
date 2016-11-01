<h2>Actor Details</h2>
<table class="sortable" border="2" cellspacing="2" cellpadding="2">
	<tr>
		<th> aid </th>
		<th> aname </th>
		<th> wage </th>
		<th> starring </th>
	</tr>

<?php
$mid = $_GET['mid'];
$db = new mysqli('localhost', 'root', '','actor_movie');
	if ( $db->connect_errno ) die("Database Connection Failed: ".$db->connect_error);
	$q = "SELECT actor.aid, aname, wage, starring FROM actedin JOIN actor ON actedin.aid=actor.aid WHERE mid=$mid order by aname";
	$resource = $db->query($q);
	while ( $row = $resource->fetch_assoc() ) {
		$aid = $row['aid'];
		$aname = $row['aname'];
		$wage = $row['wage'];
		$starring = $row['starring'];
?>

<tr>
	<td> <?php echo $aid;?> </td>
	<td> <?php echo $aname;?> </td>
	<td> <?php echo $wage;?> </td>
	<td> <?php echo $starring;?> </td>
</tr>	

<?php
	}
	echo "</table>";
	$resource->free();
	$db->close();
?>