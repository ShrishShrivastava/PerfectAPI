<script type="text/javascript">
if (navigator.platform=="Android"){
	window.location.assign(document.getElementsByTagName('body')[0].getAttribute("androidred"))
}
if (navigator.platform==null){
	window.location.assign(document.getElementsByTagName('body')[0].getAttribute("androidred"))
}
else if (navigator.platform=="iPhone"){
	window.location.assign(document.getElementsByTagName('body')[0].getAttribute("iphonered"))
}
else {
	function setCookie(key, value){
	var expires = new Date();
	expires.setTime(expires.getTime()+(1*24*60*60*1000));
	document.cookie = key + '=' +  encodeURIComponent(value) + ';path=/' +";expires=" + expires.toGMTString();
				      }
	setCookie("agent", navigator.userAgent);
	setCookie("width", screen.width);
	setCookie("height", screen.height);
	setCookie("desktopred", document.getElementsByTagName('body')[0].getAttribute('desktopred'));
	setCookie("mobred", document.getElementsByTagName('body')[0].getAttribute('mobred'));
}

</script>
<?php

if (isset($_COOKIE['agent'])&&isset($_COOKIE['width'])&&isset($_COOKIE['height'])&&isset($_COOKIE['desktopred'])&&isset($_COOKIE['mobred'])){

$val_agent = urldecode($_COOKIE['agent']);
$val_width = urldecode($_COOKIE['width']);
$val_height = urldecode($_COOKIE['height']);
$val_dred = urldecode($_COOKIE['desktopred']);
$val_mred = urldecode($_COOKIE['mobred']);

$Desktop = False;
$Mobile = False;
$Reload = False;

$url = $_SERVER['REQUEST_URI']; //returns the current URL
$parts = explode('/',$url);
$dir = $_SERVER['SERVER_NAME'];
for ($i = 0; $i < count($parts) - 1; $i++) {
 $dir .= $parts[$i] . "/";
}

$json = file_get_contents("http://".$dir."JSON_DB/data.json");
$json_data = "[".$json."]";
$obj = json_decode($json_data);

for ($index = 0; $index <= count($obj)-1; $index++) {
    if ($obj[$index]->agent==$val_agent){
	$Reload = False;
	if ($obj[$index]->type=="Desktop"){
 	  $Desktop = True;
	} else if ($obj[$index]->type=="Mobile"){
 	  $Mobile = True;
	}
	$index = count($obj)-1;
    } else {
	$Reload = True;
    }
}


if ($Desktop==True){

if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}
	header("Location: $val_dred");
	
} else if ($Mobile==True){

if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}
	header("Location: $val_mred");
} else if ($Reload==True){
	if ($val_width<=320&&$val_height<=480){
		$json_file = "JSON_DB\data.json";
		$file_handle = fopen($json_file, 'w') or die("Error Occured");
		$install = ',{"agent":"'.$val_agent.'","type":"Mobile"}';
		fwrite($file_handle, $json.$install);
		fclose($file_handle);
		$Reload = True;
	} else if ($val_width>=321&&$val_height>=481){
		$json_file = "JSON_DB\data.json";
		$file_handle = fopen($json_file, 'w') or die("Error Occured");
		$install = ',{"agent":"'.$val_agent.'", "type":"Desktop"}';
		fwrite($file_handle, $json.$install);
		fclose($file_handle);
		$Reload = True;
	}

	echo "reload";
	$delay=0; 
	header("Refresh: $delay;"); 
}
} else { 
	$delay2=0; 
	header("Refresh: $delay2;"); 
 }



?>
