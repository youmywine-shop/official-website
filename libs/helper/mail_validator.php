<?php

function valid_email($email) {
  $regexp = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
  if ( !preg_match($regexp, $email) ) {
       return false;
  }
  return true;
}

?>
