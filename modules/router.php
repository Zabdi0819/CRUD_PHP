<?php

    class Router{

        public function getView($view) {
            switch ($view) {
                case 'list':
                    include_once('views/'.$view.'.php');
                    break;
                case 'form':
                    include_once('views/'.$view.'.php');
                    break;
                case 'login':
                    include_once('views/'.$view.'.php');
                    break;
                    
                default:
                    include_once('views/error.php');
                    break;
            }
        }

        public function validGet($var) {
            if(empty($var)){
                include_once('views/index.php');
            }else{
                return true;
            }
        }
    }
?>