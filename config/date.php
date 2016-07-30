<?php
class date{
	public static function convert($t){
		return date('M d Y, h:i:sa',strtotime($t));
	}
}
?>