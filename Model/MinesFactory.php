<?php
include_once 'MineNormal.php';
class MinesFactory{
	
	public static function factory($type){
		switch($type){
			case 'easy':
				$ret = new MineEasy;
				break;
			case 'normal';
				$ret = new MineNormal;
				break;
			case 'hard';
				$ret = new MineHard;
				break;
			default:
				$ret = new MineSpecific;
			
		}
		
		return $ret;
			
	
		                 
	}
}
	
	
?>