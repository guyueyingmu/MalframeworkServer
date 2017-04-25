<?php
$allowedDomains = array("http://127.0.0.1/", "127.0.0.1", "http://192.168.100.40", "192.168.100.40", "http://10.109.235.138", "10.109.235.138", "http://222.128.13.70:13880", "222.128.13.70:13880", "http://app.softsec.com.cn:13880", "app.softsec.com.cn:13880", "http://10.8.0.1", "10.8.0.1");

if (in_array($_SERVER['HTTP_HOST'], $allowedDomains)) {
	$validDomain = "true";
} else {
	$validDomain = "false";
}
?>
