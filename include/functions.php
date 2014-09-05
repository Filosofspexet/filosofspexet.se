<?php

// Ghost function in case we want to translate strings in the futures
function __($str) {
  return $str;
}

function ellipsis($string, $length=100, $ellipsis = '...') {
  if (strlen($string) > $length) $string = substr($string, 0, $length) . $ellipsis;
  return $string;
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

function moveKeyFirstInArray($key, &$arr) {
  $tmp = array($key => $arr[$key]);
  unset($arr[$key]);
  $arr = $tmp + $arr;
}

function paginator($format_string, $current_page, $num_pages) {
  $pages = '';
  $get_variables = array();
  if(isset($_GET['orderby'])) $get_variables['orderby'] = $_GET['orderby'];
  if(isset($_GET['sortdir'])) $get_variables['sortdir'] = $_GET['sortdir'];
  for($i = 1; $i <= $num_pages; $i++) {
    if($current_page == $i) $additional_class = ' active';
    else $additional_class = '';
    $pages .= sprintf("  <li><a class=\"btn btn-default%s\" href=\"%s\">%d</a></li>\n", $additional_class, Uri::create(sprintf($format_string, $i), $get_variables), $i); 
  }
  return sprintf("<div class=\"paginator\"><ul>Gå till sida:\n%s</ul></div>", $pages);
}

function tableHeader($url, $columns) {
  $result = '';
  $get_variables = array();
  if(isset($_GET['page'])) $get_variables['page'] = intval($_GET['page']);
  else $get_variables['page'] = 1;
  if(isset($_GET['orderby'])) $get_variables['orderby'] = $_GET['orderby'];
  else $get_variables['orderby'] = 'id';
  if(isset($_GET['sortdir']) && $_GET['sortdir'] == 'desc') $get_variables['sortdir'] = 'asc';
  else $get_variables['sortdir'] = 'desc';
  foreach($columns as $key => $val) { 
    $get_variables['orderby'] = $key;  
    $fa = '';
    if(isset($_GET['sortdir'])) {
      if(isset($_GET['orderby']) && $_GET['orderby'] == $key) {
        if($get_variables['sortdir'] == 'asc') $fa = '<i class="fa fa-arrow-down"></i> ';
        else $fa = '<i class="fa fa-arrow-up"></i> ';     
      }
    }
    $result .= sprintf("<th><a class=\"\" href=\"%s\">%s%s</a></th>\n", Uri::create($url, $get_variables), $fa, $val);
  }
  return $result;
}

function escape($value) {
  $return = '';
  for($i = 0; $i < strlen($value); ++$i) {
    $char = $value[$i];
    $ord = ord($char);
    if($char !== "'" && $char !== "\"" && $char !== '\\' && $ord >= 32 && $ord <= 126) $return .= $char;
    else $return .= '\\x' . dechex($ord);  
  }
    return $return;
}

function getTemplates() {
  return glob(TEMPLATES_DIR . '/*.php');
}

function any_in_array(array $keys, &$arr) {
  foreach($keys as $key) {
    if(in_array($key, $arr)) return true;
  }
  return false;
}

function all_in_array(array $keys, &$arr) {
  foreach($keys as $key) {
    if(!in_array($key, $arr)) return false;
  }
  return true;
}