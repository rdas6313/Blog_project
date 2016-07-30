<?php
	class validation{
		public static function valid($data){
			$data=trim($data);
			//$data=trim($data,'<p></p>');
			$data=stripslashes($data);
			$data=htmlspecialchars($data);
			return $data;
		}
		public static function in_it($array,$search){
			$search = strtolower($search);
			foreach($array as $a){
				if($a==$search){
					return true;
				}
			}
			return false;
		}
	}
?>