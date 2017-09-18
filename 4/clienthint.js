// var xmlHttp;
		function queryWeather(str){
			$("button").click(function(){
			  $("#result").load("weather.php",function(responseTxt,statusTxt,xhr){
			    if(statusTxt=="success")
			      alert("外部内容加载成功！");
			    if(statusTxt=="error")
			      alert("Error: "+xhr.status+": "+xhr.statusText);
			  });
			});
		}
		

		// function stateChanged(){ 
		// 	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
		// 		 document.getElementById("result").innerHTML=xmlHttp.responseText 
		// 	} 
		// }
		// //创建 XMLHTTP 对象
		// function GetXmlHttpObject(){
		// 	var xmlHttp=null;
		// 	try{
		// 		 // Firefox, Opera 8.0+, Safari
		// 		 xmlHttp=new XMLHttpRequest();
		// 	}
		// 	catch (e){
		// 		 //Internet Explorer
		// 		 try{
		// 		  	xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		// 		 }catch (e){
		// 		  	xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		// 		 }
		// 	 }
		// 	return xmlHttp;
		// }