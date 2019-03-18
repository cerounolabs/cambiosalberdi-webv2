<?php
    $api                            = 'http://www.cambiosalberdi.com/ws';

    function get_curl($ext){
        global $api;
        $urlAPI                     = $api.'/'.$ext;
        $ch                         = curl_init($urlAPI);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $dataJSON                   = curl_exec($ch);
        curl_close($ch);
        $result                     = json_decode($dataJSON, TRUE);
        return $result;
    }
?>