<?php
include_once "Model/MinesFactory.php";
class MineSweeper{
	var $mines;
	var $temp;
	public function __construct(){
		
		$this->mines = MinesFactory::factory('normal');
		
	}
	
}
	
?>