<?php
function isIpLive($ip) {
    // Execute the ping command
    exec("ping -c 1 $ip", $output, $result);
    
    // Check if the ping was successful (0 means success)
    return ($result === 0);
}

function availableUrl($host, $port=80, $timeout=10) { 
    $fp = fSockOpen($host, $port, $errno, $errstr, $timeout); 
    return $fp!=false;
  }
?>