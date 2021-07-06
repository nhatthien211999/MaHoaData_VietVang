<?php
  function encrypt($message){
    $cutEmail = explode('@', $message);
    $encryption_key ='1f4276388ad3214c873428dbef42243f' ;
    $key = hex2bin($encryption_key);
    $nonce = '';
    $ciphertext = openssl_encrypt(
      $cutEmail[0], 
      'aes-256-cbc', 
      $key,
      OPENSSL_RAW_DATA, //trả dữ liệu về kiểu base64
      null
    );
    return base64_encode($nonce.$ciphertext).'@'.$cutEmail[1];
  }

  function decrypt($message){
    $cutEmail = explode('@', $message);

    $encryption_key ='1f4276388ad3214c873428dbef42243f' ;
    $key = hex2bin($encryption_key);
    $cutEmail[0] = base64_decode($cutEmail[0]);

    $ciphertext = mb_substr($cutEmail[0], null, null, '8bit');
    $plaintext= openssl_decrypt(
      $ciphertext, 
      'aes-256-cbc', 
      $key,
      OPENSSL_RAW_DATA,
      null
    );
    return $plaintext.'@'.$cutEmail[1];
  }
?>

