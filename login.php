<?php
    include("functions.php");
  if (file_exists("config.php")) {
    include("config.php");
  } else {
    die();
  }
if(empty($_POST['username'])) {
  header( 'Location: index.php?error=user' ) ;
  die();
}
if(empty($_POST['password'])) {
  header( 'Location: index.php?error=pass' ) ;
  die();
}

$inputpass = hash('whirlpool', $_POST['password']);

//if ($_POST['username'] == $username AND $inputpass == $password) {
if (user_access($_POST['username'], $inputpass)) {
  $supercode = hash('whirlpool', $_POST['username'] . $inputpass);


  session_start();
  user_config_init($supercode);

  $_SESSION['code'] = $supercode;
  //$_SESSION['last_post'] = $_POST;
  //$_SESSION['lias_get'] = $_GET;

  header( 'Location: control.php' ) ;
} else {
  header( 'Location: index.php?error=both' ) ;
}

?>
