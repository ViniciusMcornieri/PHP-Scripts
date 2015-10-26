<?php

/* do NOT run this script through a web browser */
if (!isset($_SERVER["argv"][0]) || isset($_SERVER['REQUEST_METHOD'])  || isset($_SERVER['REMOTE_ADDR'])) {
   die("<br><strong>This script is only meant to run at the command line.</strong>");
}

$no_http_headers = true;

include( "/var/www/html/cacti/include/global.php");

function ap_clients($ap){

        $result = @pg_select($dbconn, "ap_clients", array("mac" => "$ap"));

        if(!$result){
                $result = @pg_select($dbconn, "ap_clients", array("ip" => "$ap"));
                if(!$result){
                        echo "Erro AP não encontrado!\n";
                        return false;
                        }
        }
        pg_close($dbconn);
        print $result[0]["num_clients"];
}

$result =  ap_clients($_SERVER["argv"][1]);
print $result;
?>
