<?php

// Ghost function in case we want to translate strings in the futures
function __($str) {
  return $str;
}

function ellipsis($string, $length=100, $ellipsis = '...') {
  if (strlen($string) > $length) {
      $string = substr($string, 0, $length) . $ellipsis;
  }
  return $string;
}

function doHash($str) {
  return md5($str);
}

function generatePassword($length = 10) {
  $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
  $pass = array(); 
  $alphaLength = strlen($alphabet) - 1;
  for ($i = 0; $i < $length; $i++) {
    $n = rand(0, $alphaLength);
    $pass[] = $alphabet[$n];
  }
  return implode($pass);
}