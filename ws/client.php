<?php
require 'class.PHPWebSocketClient.php';

$sp  = websocket_open('cambiosalberdi.com:9300',$errstr);
$ctx = file_get_contents('/var/www/vhosts/cambiosalberdi.com/httpdocs/alberdi/cambiosalberdi/ws/getCotizaciones.json');
//$ctx = @file_get_contents('/var/www/vhosts/cambiosalberdi.com/httpdocs/alberdi/cambiosalberdi/ws/getCotizaciones.json');
websocket_write($sp, $ctx);