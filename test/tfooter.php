

<!-- 
include （或 require）复制文件内容到此页
require 会生成致命错误（E_COMPILE_ERROR）并停止脚本
include 只生成警告（E_WARNING），并且脚本会继续
-->
<html>
<body>

<h1>欢迎访问我们的首页！</h1>
<p>一段文本。</p>
<p>一段文本。</p>
<?php include 'footer.php';?>

</body>
</html>