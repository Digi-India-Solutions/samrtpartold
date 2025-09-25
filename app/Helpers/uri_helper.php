<?php

// if ( ! function_exists('encrypt_url'))
// {
// 	function encrypt_url($string = '', $url_safe = TRUE)
// 	{
// 	$encrypt = \Config\Services::encrypter();

// 		$ret = $encrypt->encrypt($string);

// 		if ($url_safe) $ret = strtr($ret, array('+' => '.', '=' => '-', '/' => '~'));

// 		return $ret;
// 	}
// }

// if ( ! function_exists('decrypt_url'))
// {
// 	function decrypt_url($string = '')
// 	{
// 	    $encrypt = \Config\Services::encrypter();
// 		return  $encrypt->decrypt($string);
// 	}
// }



if ( ! function_exists('encrypt_url'))
{
    function encrypt_url($string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'YASIN';
    $secret_iv = 'YASIN@WEB';

    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);

    return $output;
}
}

if ( ! function_exists('decrypt_url'))
{
 function decrypt_url($string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'YASIN';
    $secret_iv = 'YASIN@WEB';

    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

  
    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    

    return $output;
}
}


//CREATE SLUG
function creatSlug($a){
    
    $a = trim($a);
    
    $a = html_entity_decode($a);
     
    $a = strip_tags($a);
    
    $a = strtolower($a);
    
    $a = preg_replace('~[^ a-z0-9_.]~', ' ', $a);
    
    $a = preg_replace(' ', '-', $a);
     
    $a = preg_replace('~-+~', '-', $a);
        
    return $a;
}