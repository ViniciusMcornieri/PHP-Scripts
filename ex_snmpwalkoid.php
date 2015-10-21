<?php
$a = snmpwalkoid($argv[1], "public", ""); 
 for (reset($a); $i = key($a); next($a)) {
             echo "$i: $a[$i]\n";
 }
 ?>
