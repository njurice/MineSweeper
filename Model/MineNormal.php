<?php
//include_once '';

class MineNormal{
	var $hangNum;
	var $lieNum;
	var $mineNum;
	var $mineArray;
	
	public function __construct(){
		$this->hangNum = 20;
		$this->lieNum = 20;
		$this->mineNum = 160;
		
		$this->generateMines();
	}
	
	private function generateMines(){
		$this->mineArray=array();
		for ($i = 1; $i <= $this->hangNum; $i++){
			$temp=array();
			for ($j = 1; $j <= $this->lieNum; $j++){
				$temp[$j] = 0;
			}
			$this->mineArray[$i] = $temp;
		}
		$this->setMines();
		$this->setSafes();
	}
	private function generateRandoms($mnum,$msun){
		$ranomdsArray=array();
		while(count($ranomdsArray)<$mnum){
			$a=rand(1,$msun);
			if(!in_array($a,$ranomdsArray)){
				$ranomdsArray[]=$a;
			}
		}
		return $ranomdsArray;
	}
	private function setMines(){
		$randoms =$this->generateRandoms($this->mineNum,$this->hangNum*$this->lieNum);
		foreach ($randoms as $random){
			$hang = ceil(($random+0.0)/($this->lieNum));
			$lie = $random%($this->lieNum);
			if($lie == 0){
				$lie = 4;
			}
			$this->mineArray[$hang][$lie] = -1;
		}
	}
	private function setSafes(){
		for ($i = 1; $i <= $this->hangNum; $i++){
			for ($j = 1; $j <= $this->lieNum; $j++){
				if($this->mineArray[$i][$j] != -1){
					$arroundMines=0;
					if($i-1>0 && $j-1>0 ){
						if($this->mineArray[$i-1][$j-1] == -1)
							$arroundMines++;
					}
					if($i-1>0 && $j>0){
						if($this->mineArray[$i-1][$j] == -1)
							$arroundMines++;
					}
					if($i-1>0 && $j+1<=$this->lieNum){
						if($this->mineArray[$i-1][$j+1] == -1)
							$arroundMines++;
					}
					if($i>0 && $j-1>0){
						if($this->mineArray[$i][$j-1] == -1)
							$arroundMines++;
					}
					if($i>0 && $j+1<=$this->lieNum){
						if($this->mineArray[$i][$j+1] == -1)
							$arroundMines++;
					}
					if($i+1<=$this->hangNum && $j-1>0){
						if($this->mineArray[$i+1][$j-1] == -1)
							$arroundMines++;
					}
					if($i+1<=$this->hangNum && $j>0){
						if($this->mineArray[$i+1][$j] == -1)
							$arroundMines++;
					}
					if($i+1<=$this->hangNum && $j+1<=$this->lieNum){
						if($this->mineArray[$i+1][$j+1] == -1)
							$arroundMines++;
					}
					
					$this->mineArray[$i][$j] = $arroundMines;
				}
			}
			
		}
	}
}
	
?>