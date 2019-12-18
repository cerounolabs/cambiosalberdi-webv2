<?php
$output = shell_exec("pgrep -f server.php");
$ps = trim($output);
if ($ps != "") {
    shell_exec("kill -9 ".$ps);        
}
shell_exec("nohup php server.php >/dev/null 2>&1 &");
?>