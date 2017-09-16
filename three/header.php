<?php
	function  db_query($sql) {
		global $db;
		$result = mysqli_query($db,$sql);
		return $result;
	}
	function  db_connect($host = "localhost", $user="username", $pass="graeme") {
		$db = mysqli_connect($host, $username, $password);
		return $db;
	}


	function  do_error($error) {
		echo  "噢，好象有点儿问题...<br>";
		echo "系统报告的错误是：$error.\n<br>";
		echo "最好是暂时关闭网站并通知系统管理员。";
		die;
	}
 	// 数据库的密码为空，所以有任何其他密码都会出错
	$db = mysqli_connect("localhost", "root",''); 
	if(!$db){
		$db_error = "无法连接到MySQL数据库";
		do_error($db_error);
	}
	mysqli_select_db($db,"mydb");
	$sql = "SELECT * FROM mytable";
	$result = db_query($sql);

	$new_host = "site.com";
	$new_db = db_connect($new_host);  //当然会出错

?>
<html>
<head>
<title>
	<?php echo $title ?>
</title>
</head>
<body>

<center><h2><?php echo $title ?></h2></center>
