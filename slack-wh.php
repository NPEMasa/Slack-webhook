<?php

$url = "<Your Slack API URL>";
if(!empty($_GET['msg'])){
  $msg = $_GET['msg'];
}else{
  $msg = "Test messages.";
}

$payload = array(
    'channel'=>'#<channel name>',
    'username'=>'webhookbot',
    'text'=>$msg,
    'icon_emoji'=>'ghost',
);
$payload = json_encode($payload);

$options = stream_context_create(array('http' => array(
  'method'=>'POST',
  'content'=>$payload,
)));

$html = file_get_contents($url, false, $options);
echo $html;
?>
