<?php
set_time_limit(0);

require 'class.PHPWebSocket.php';

function wsOnMessage($clientID, $message, $messageLength, $binary) {
    global $Server;
    if ($message != '') {
        foreach ( $Server->wsClients as $id => $client )
            $Server->wsSend($id, $message);
    }
}
function wsOnOpen($clientID) {
    global $Server;
    $Server->log( "$clientID has connected." );
//  $stx = @file_get_contents('getCotizaciones.json');
    $stx = file_get_contents('getCotizaciones.json');
    $Server->wsSend($clientID, $stx);
}
function wsOnClose($clientID, $status) {
    global $Server;
    $Server->log( "$clientID has disconnected." );
}

// start the server
$Server = new PHPWebSocket();
$Server->bind('message', 'wsOnMessage');
$Server->bind('open', 'wsOnOpen');
$Server->bind('close', 'wsOnClose');

$Server->wsStartServer('cambiosalberdi.com', 9300);