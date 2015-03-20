<?php
        function verifi($name,$number){
                $url = 'http://api.hduhelp.com/index.php/xgapi/Getxg'; 
                $data = "stdno=$number&user=$name";
                $ch = curl_init();
                curl_setopt ( $ch, CURLOPT_URL, $url );
                curl_setopt ( $ch, CURLOPT_POST, 1 );
                curl_setopt ( $ch, CURLOPT_HEADER, 0 );
                curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
                curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
                $return = curl_exec ( $ch );
                curl_close ( $ch );
                return $return;
        }
?>
