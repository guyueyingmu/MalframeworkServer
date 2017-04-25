<?php
    class userconfig{
        private $username='';
        private $password='';
        private $postboxtextsize=-1;
        private $devicestablerefreshspeed=-1;
        private $filestablerefreshspeed=-1;
        private $messageboxrefreshspeed=-1;
        private $offlineminutes=-1;
        private $timezonesetting='Asia/Hong_Kong';
        private $autoscrolltextbox=true;

        public function __construct($u, $pa, $po, $d, $f, $m, $o, $t, $a){
            $this->username = $u;
            $this->password = $pa;
            $this->postboxtextsize = $po;
            $this->devicestablerefreshspeed = $d;
            $this->filestablerefreshspeed = $f;
            $this->messageboxrefreshspeed = $m;
            $this->offlineminutes = $o;
            $this->timezonesetting = $t;
            if($a == 1){
                $this->autoscrolltextbox = true;
            }else{
                $this->autoscrolltextbox = false;
            }
        }
            
        public function getUserName(){
            return $this->username;
        }
        public function getPostboxTextSize(){
            return $this->postboxtextsize;
        }
        public function getDevicesTableRefreshSpeed(){
            return $this->devicestablerefreshspeed;
        }
        public function getFilesTableRefreshSpeed(){
            return $this->filestablerefreshspeed;
        }
        public function getMessageBoxRefreshSpeed(){
            return $this->messageboxrefreshspeed;
        }
        public function getAutoScrollTextBox(){
            return $this->autoscrolltextbox;
        }
    }
    
?>
