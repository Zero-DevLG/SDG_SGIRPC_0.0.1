<?php
    

    function getRealIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
           
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
       
        return $_SERVER['REMOTE_ADDR'];
    }

    $ip = getRealIP();
    echo $ip;
    echo "<br>";
    $localIP = getHostByName(php_uname('n'));
    echo $localIP;
    echo "<br>";
    function getLocalIp() { return gethostbyname(trim(`hostname`)); }
    $ip_host = getLocalIp();
    echo $ip_host;
    echo "Tu dirección IP es: {$_SERVER['REMOTE_ADDR']}";

  ?>