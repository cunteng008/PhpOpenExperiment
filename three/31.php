<?php
	$title = "Hello World";
	include("header.php");
	$result = mysqli_query($db,"SELECT * FROM employees");
	echo "<table border=1>\n";
	echo "<tr><td>名字</td><td>职位</tr>\n";
	while ($myrow = mysqli_fetch_assoc($result)) {
		printf("<tr><td>%s %s</td><td>%s</tr>\n", $myrow['first'], $myrow['last'], $myrow['position']);
	}
	echo "</table>\n";
	include("footer.php");
?>