<?php
	
	$content = getWeather(getCityid($_POST['city']));
	echo $content;
	

	//中国气象城市id
	function getCityid($city){
		$aim_file = "citylist.xml";
		$xml=simplexml_load_file($aim_file) or die("Error: Cannot create object");
		$findCityId="";
		foreach($xml->children() as $c) { 
		    foreach ($c->d as $d) {
		    	// echo $d["d3"] ." ".$d["d4"];   
		    	//可拼音和中文搜索，不过拼音搜索可能不准
		    	if(strcasecmp($d["d3"], $city)==0 || strcasecmp($d["d2"], $city)==0){
		    		// echo "找到城市";
		    		$findCityId = $d["d2"];
		    		break;
		    	}
		    	// echo "<br>"; 
		    }
		    // echo $findCityId;
		    // echo "<br>"; 
		} 
		return $findCityId;
	}


	/*
	bool curl_setopt ( resource $ch , int $option , mixed $value )
	ch
	由 curl_init() 返回的 cURL 句柄。
	option
	需要设置的CURLOPT_XXX选项。
	value
	将设置在option选项上的值。
	详细信息: http://www.runoob.com/php/func-curl_setopt.html
	*/
	function getWeather($city){
		//include 'cityid.php';
		$cid = getCityid($city);
	    //通过城市ID获取城市天气详情
	    $api = "http://www.sojson.com/open/api/weather/json.shtml?city=".$cid;
	    $ch = curl_init();
	    //需要获取的URL地址，也可以在curl_init()函数中设置。
	    curl_setopt($ch, CURLOPT_URL, $api);
	    curl_setopt($ch, CURLOPT_HEADER, false);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.1 Safari/537.11');
	    $ret = curl_exec($ch);
	    curl_close($ch);
		//返回获取json格式结果
	    return $ret;
	}
	

?>
