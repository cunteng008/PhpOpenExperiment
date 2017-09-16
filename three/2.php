<html>
<body>
<?php

	$db = mysqli_connect("localhost", "root",'');
	mysqli_select_db($db,"mydb");

	$id =1;
	$delete = null;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// 如果没有ID，则我们是在增加记录，否则我们是在修改记录
		$first = $_POST["first"];
		$last = $_POST["last"];
		$address = $_POST["address"];
		$position = $_POST["position"];
		 if ($id) {
		    $sql = "UPDATE employees SET first='$first',last='$last',
    		address='$address',position='$position' WHERE id=$id";
		} else {
			$sql = "INSERT INTO employees (first,last,address,position) 
			VALUES ('$first','$last','$address','$position')";
		}

        $result = mysqli_query($db,$sql);
		echo "记录修改成功！<p>";
	} elseif ($delete) {
		// 删除一条记录
		$sql = "DELETE FROM employees WHERE id=$id"; 
		$result = mysql_query($sql);
		echo "记录删除成功！<p>";
	} else{
		if ($id) {
			$result = mysqli_query($db,"SELECT * FROM employees WHERE id=$id");
			$myrow = mysqli_fetch_assoc($result);

			printf("名: %s\n<br>", $myrow["first"]);
			printf("姓: %s\n<br>", $myrow["last"]);
			printf("住址: %s\n<br>", $myrow["address"]);
			printf("职位: %s\n<br>", $myrow["position"]);
		}else{
			$result = mysqli_query($db,"SELECT * FROM employees");
			if ($myrow = mysqli_fetch_assoc($result)){
				do {
				//所有的引号前面都有一个反斜杠。这个反斜杠告诉PHP直接显示后面的字符
				//$_SERVER 这种超全局变量保存关于报头、路径和脚本位置的信息。
				    printf("<a href=\"%s?id=%s\">%s %s</a><br>\n", 
				     $_SERVER['PATH_INFO'] , $myrow["id"], $myrow["first"], $myrow["last"]);

		  		} while ($myrow = mysqli_fetch_assoc($result));
			} else {
		  		echo "对不起，没有找到记录！"; 
		    }
		}
	}
	
?>


    <P>
		<a href="<?php echo $_SERVER['PATH_INFO']?>">ADD A RECORD</a>
	<P>
	 <form method="post" action="">
    <?php
		if ($id) {

		 // 我们是在编辑修改状态，因些选择一条记录
		$sql = "SELECT * FROM employees WHERE id=$id";
		$result = mysqli_query($db,$sql);
		$myrow = mysqli_fetch_assoc($result);
		$id = $myrow["id"];
		$first = $myrow["first"];
		$last = $myrow["last"];
		$address = $myrow["address"];
		$position = $myrow["position"];
        // 显示id，供用户编辑修改
	 ?>
	 

    <input type=hidden name="id" value="<?php echo $id ?>">

    <?php

  }

   ?>
		 名：<input type="Text" name="first" value="<?php echo $first ?>"><br>
		 姓：<input type="Text" name="last" value="<?php echo $last ?>"><br>
	     住址：<input type="Text" name="address" value="<?php echo $address ?>"><br>
	     职位：<input type="Text" name="position" value="<?php echo $position ?>"><br>
		 <input type="submit" name="submit" value="输入信息">
   </form>

</body>
</html>
