<?php

$filedatetime = new DateTime();
$filedatetimeformat = $filedatetime->format("Y-m-d");

$myfile = fopen($filedatetimeformat . "-call-log.txt", "a") or die("Unable to open file!");

$date = new DateTime();
$date = $date->format("Y-m-d h:i:s");

fwrite($myfile, "date: " . $date . "\r\n");

$url = $_SERVER['REQUEST_URI'];
echo $url;

$url_components = parse_url($url);

parse_str($url_components['query'], $params);

$event = $params['event'];
$caller = $params['caller'];
$callee = $params['callee'];
$timestamp = $params['timestamp'];
$sip_from = $params['sip_from'];
$sip_request = $params['sip_request'];

fwrite($myfile, "url: " . $url . "\r\n");
fwrite($myfile, "event: " . $event . "\r\n");
fwrite($myfile, "caller: " . $caller . "\r\n");
fwrite($myfile, "callee: " . $callee . "\r\n");
fwrite($myfile, "timestamp: " . $timestamp . "\r\n");
fwrite($myfile, "sip_from: " . $sip_from . "\r\n");
fwrite($myfile, "sip_request: " . $sip_request . "\r\n");
fwrite($myfile, "--------------------------------------------------------------------" . "\r\n");
fclose($myfile);
?>
