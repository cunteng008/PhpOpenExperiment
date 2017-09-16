<?php  
$arr = array(  
    'name' => 'tanteng',  
    'nick' => 'pony',  
    'contact' => array(  
        'email' => 'a@gmail.com',  
        'website' => 'http://aa.sinaapp.com',  
    )  
);  
$json_string = json_encode($arr);  
echo "getProfile($json_string)";  
?>