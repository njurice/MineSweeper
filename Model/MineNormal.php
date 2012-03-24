<?php
class MineNormal{
	var $hangNum;
	var $lieNum;
	var $mineNum;
	var $mineArray;
	
	public function __construct(){
		$this->hangNum = 20;
		$this->lieNum = 20;
		$this->mineNum = 20;
		
		$this->generateMines();
	}
	
	private function generateMines(){
		
	}
}
	
?>