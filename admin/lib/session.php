<?php
	class session{
		public static function start(){
			session_start();
		}
		public static function set($key,$value){
			$_SESSION[$key]=$value;
		}
		public static function get($key){
			if(isset($_SESSION[$key])){
				return $_SESSION[$key];
			}else{
				return false;
			}
		}
		public static function check(){
			self::start();
			if(self::get('id')!=false){
				return true;
			}else{
				return false;
			}
		}
		public static function end(){
			session_destroy();
		}
	}
?>
