<?php
    Abstract class Session{

        private static function start(){
            return session_start();
        }

        public static function check(){
            self::start();
            if(!empty($_SESSION["id"])){
                return true;
            }
            else{
                return false;
            }
        }

        public static function destroy(){
            return session_destroy();
        }
    }