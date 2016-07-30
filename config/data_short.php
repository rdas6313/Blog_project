<?php
class data_short{
	public static function short($data,$limit=200){
		$len=strlen($data);
		if($limit>$len){
			$limit=$len-4;
			$text=substr($data,0,$limit).'</p>';
		}else{
			$end=strpos($data,' ',$limit);
			if($end>0){
				$limit=$end;
			}
			$text=substr($data,0,$limit).'....</p>';
		}

		return $text;
	}
}
?>