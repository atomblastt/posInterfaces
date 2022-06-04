<?php 

	function test($apapun){
        $test = $apapun. ' Masuk kok ';
		return $test;
	}


    function sendCurl($path, $data){
        if (!function_exists('curl_init')) {
            die('Sorry cURL is not installed!');
        }

        $url = "http://localhost/posApi".$path;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        $response = curl_exec($ch);

        if (curl_error($ch)) {
            echo 'error is :' . curl_error($ch);
        }

        if ($errno = curl_errno($ch)) {
            $error_message = curl_strerror($errno);
            echo "\rcURL error ({$errno}):\n {$error_message}";
        }

        curl_close($ch);
        return $response;
    }

?>