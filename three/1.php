<html>
<body>
<?php

	$db = mysqli_connect("localhost", "root",'');
	mysqli_select_db($db,"mydb");

	$result = mysqli_query($db,"SELECT * FROM employees");
	$data = [];
	while($row = mysqli_fetch_assoc($result)) {//mysqli_fetch_array
	    $data[] = $row;
	}
	printf("First Name: %s<br>\n", $data[0]['first']);
	printf("Last Name: %s<br>\n", $data[0]['last']);
	printf("Address: %s<br>\n", $data[0]['address']);
	printf("Position: %s<br>\n",$data[0]['position']);
?>

</body>
</html>
