<?php

  function dec_enc($action, $string, $salt) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'srm care eResearch';
    $secret_iv = $salt;

    // hash
    $key = hash('sha512', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha512', $secret_iv), 0, 16);

    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
  }

?>
