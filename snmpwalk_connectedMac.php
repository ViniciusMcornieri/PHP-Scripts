<?php
$mac_address = snmpwalkoid($argv[1], "public@30", ".1.3.6.1.2.1.17.4.3.1.1"); 

 echo "$argv[1] public .1.3.6.1.2.1.17.4.3.1.1 - mac_address\n";
 echo "$argv[1] public .1.3.6.1.2.1.17.4.3.1.2 - bridge_port\n";
 for (reset($mac_address); $i = key($mac_address); next($mac_address)) {
             echo "$i: $mac_address[$i]\n";
}
echo"\n";
$bridge_port = snmpwalkoid($argv[1], "public@30", ".1.3.6.1.2.1.17.4.3.1.2"); 
 echo "$argv[1] public .1.3.6.1.2.1.17.4.3.1.2 - bridge_port\n";
 for (reset($bridge_port); $i = key($bridge_port); next($bridge_port)) {
             echo "$i: $bridge_port[$i]\n";
 }

echo"\n";
$ifIndex = snmpwalkoid($argv[1], "public@30", ".1.3.6.1.2.1.17.1.4.1.2"); 
 echo "$argv[1] public .1.3.6.1.2.1.17.1.4.1.2   - ifIndex\n";
 for (reset($ifIndex); $i = key($ifIndex); next($ifIndex)) {
             echo "$i: $ifIndex[$i]\n";
}
echo"\n";

 $ifName = snmpwalkoid($argv[1], "public@30", ".1.3.6.1.2.1.31.1.1.1.1"); 
 echo "$argv[1] public .1.3.6.1.2.1.31.1.1.1.1    - ifName\n";
 for (reset($ifName); $i = key($ifName); next($ifName)) {
             echo "$i: $ifName[$i]\n";
 }
 echo"\n";
?>
