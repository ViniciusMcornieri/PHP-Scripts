<?php

#error_reporting(0);
$community= 'h@S&cshfiw';

function mac_address_dec2hex($macAddress){
        $macDecimalArr = explode(".", $macAddress);

        for($j=0; $j < count($macDecimalArr); $j++){
                $macHex[$j] = dechex($macDecimalArr[$j]);
                $macHex[$j] = str_pad($macHex[$j], 2, "0", STR_PAD_LEFT);
        }

        $mac_hex = implode(":", $macHex);
        return $mac_hex;
}

function ap_clients_aruba_wlan_controller($ip_wlan_controller, $community="public"){ 
        $APNumCli = array();;
        #wlanAPRadioNumAssociatedClients
        $OID             = ".1.3.6.1.4.1.14823.2.2.1.5.2.1.5.1.7"; 

        $walk            = snmpwalkoid($ip_wlan_controller, $community, $OID);
        
        for (reset($walk); $i = key($walk); next($walk)) {
                $macDecimal = substr($i, 48, -2); 
                $numCli   = substr($walk[$i], 8);

                $macAddress = mac_address_dec2hex($macDecimal);

                if (array_key_exists($macAddress, $APNumCli)){
                        $APNumCli[$macAddress] += $numCli;

                }else{
                        $APNumCli[$macAddress]  = $numCli;

                }
            #echo "$macAddress --> $numCli"
        }
        return $APNumCli;
}

function all_aruba_controllers($community="public"){
        for($i=1; $i < 11; $i++){
                $ipController=  "10.253.0.$i";
                $sysName     = @snmpget($ipController, $community, ".1.3.6.1.2.1.1.5.0");
                if($sysName == NULL){
                        continue;
                }
                $cli[$ipController] = ap_clients_aruba_wlan_controller($ipController, $community);

        }        
        var_dump($cli);
}
all_aruba_controllers($community);
?>
