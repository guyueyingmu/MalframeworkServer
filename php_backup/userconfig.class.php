<?php
    class UserConfig{
        private $username='';
        private $password='';
        private $postboxtextsize=-1;
        private $devicestablerefreshspeed=-1;
        private $filestablerefreshspeed=-1;
        private $messageboxrefreshspeed=-1;
        private $offlineminutes=-1;
        private $timezonesetting='Asia/Hong_Kong';
        private $autoscrolltextbox=true;

        protected static $_instance = null;

        protected function __construct(){
        } 
        protected function __clone(){
        }

        public function init($u, $pa, $po, $d, $f, $m, $o, $t, $a){
            self::$_instance->username = $u;
            self::$_instance->password = $pa;
            self::$_instance->postboxtextsize = $po;
            self::$_instance->devicestablerefreshspeed = $d;
            self::$_instance->filestablerefreshspeed = $f;
            self::$_instance->messageboxrefreshspeed = $m;
            self::$_instance->offlineminutes = $o;
            self::$_instance->timezonesetting = $t;
            if($a == 1){
                self::$_instance->autoscrolltextbox = true;
            }else{
                self::$_instance->autoscrolltextbox = false;
            }
        }
        public static function getInstance(){
            if(self::$_instance == null){
                self::$_instance = new self();
            }
            return self::$_instance;
        }
            
        public function getUserName(){
            return self::$_instance->username;
        }
        public function getPostboxTextSize(){
            return self::$_instance->postboxtextsize;
        }
        public function getDevicesTableRefreshSpeed(){
            return self::$_instance->devicestablerefreshspeed;
        }
        public function getFilesTableRefreshSpeed(){
            return self::$_instance->filestablerefreshspeed;
        }
        public function getMessageBoxRefreshSpeed(){
            return self::$_instance->messageboxrefreshspeed;
        }
        public function getOffLineMinutes(){
            return self::$_instance->offlineminutes;
        }
        public function getTimeZoneSetting(){
            return self::$_instance->timezonesetting;
        }
        public function getAutoScrollTextBox(){
            return self::$_instance->autoscrolltextbox;
        }
    }
    
?>
