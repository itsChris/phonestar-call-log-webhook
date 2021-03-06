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

// the header
$headers = 'From: calllog@solvia.ch' . "\r\n" .
    'Reply-To: info@solvia.ch' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// The message
$message = "Date: " . $date . "\r\n" . "Event: " . $event . "\r\n" . "Caller: " . $caller . "\r\n" . "Callee: " . $callee . "\r\n" . "timestamp: " . $timestamp . "\r\n" . "sip_from: " . $sip_from . "\r\n" . "sip_$
//$message = "Line 1\r\nLine 2\r\nLine 3";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Send
mail('cc@solvia.ch', $caller . "->" . $callee, $message, $headers);

?>
