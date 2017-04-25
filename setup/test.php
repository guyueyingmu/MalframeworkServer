<?php
$inputdbhost = '192.168.2.138';
$inputdbname = 'mydendroid';
$inputdbuser = 'root';
$inputdbpass = 'password';

$inputusername = 'lczgywzyy';
$inputpassword = 'tsh7212011';

if ($inputpassword == ""){
  die("Password is blank, please click the back button and try again.");
}

$inputpostboxtextsize = 10;

$inputdevicestablerefreshspeed = 6 * 1000;
$inputfilestablerefreshspeed = 6 * 1000;
$inputmessageboxrefreshspeed = 6 * 1000;

$inputofflineminutes = 30;

$inputtimezonesetting = 'Asia/Hong_Kong';

$inputautoscrolltextbox = 'Yes';

file_put_contents("../config.php", "");

$f = fopen("../config.php", "w+");
if($f){
  $write = "<?php\n";
  $write .= '$dbhost=\'' . $inputdbhost . "';\n";
  $write .= '$dbname=\'' . $inputdbname . "';\n";
  $write .= '$dbuser=\'' . $inputdbuser . "';\n";
  $write .= '$dbpass=\'' . $inputdbpass . "';\n";
  $write .= '$username=\'' . $inputusername . "';\n";
  $write .= '$password=\'' . hash('whirlpool', $inputpassword) . "';\n";
  $write .= '$postboxtextsize=' . $inputpostboxtextsize . ";\n";
  $write .= '$devicestablerefreshspeed=' . $inputdevicestablerefreshspeed . ";\n";
  $write .= '$filestablerefreshspeed=' . $inputfilestablerefreshspeed . ";\n";
  $write .= '$messageboxrefreshspeed=' . $inputmessageboxrefreshspeed . ";\n";
  $write .= '$offlineminutes=' . $inputofflineminutes . ";\n";
  $write .= '$timezonesetting=\'' . $inputtimezonesetting . "';\n";
  $write .= '$autoscrolltextbox=' . ($inputautoscrolltextbox == 'Yes' ? 'true' : 'false') . ";\n";
  $write .= "?\>";
  
  fwrite($f, $write);
  fclose($f);
}

header('Location: laststep.php');
?>
