<html>

<body>

<?php
	$first = null;
	$last = null;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$first = $_POST["first"];
		$last = $_POST["last"];
		if (!$first || !$last) {
			$error = "对不起，您必须填写所有的栏目！";
		}
    } else {
		// 处理表格输入内容
		echo "谢谢！";
    }
	if (!$_SERVER["REQUEST_METHOD"] != "POST") {
	?>
		<P>
		<form method="post" action="">
		第一栏: <input type="text" name="first" value="<?php echo $first ?>"><br>
		第二栏: <input type="text" name="last" value="<?php echo $last ?>"><br>
		<input type="Submit" name="submit" value="输入信息">
		</form>
	<?php
	} // if结束

?>



</body>

</html>
