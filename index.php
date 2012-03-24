<!Doctype html>
<html xmlns=http://www.w3.org/1999/xhtml>
<head>
	<meta http-equiv=Content-Type content="text/html;charset=utf-8">
	<meta http-equiv=X-UA-Compatible content=IE=EmulateIE7>
	<title>MineSwepper </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="JS/jquery.min.js"></script>
</head>
<body>
	<div id="container">
    <table>
     <tr>
     	<td class="mineHeaderCell">
			
        	<img id="mineH" src="" alt="" /><img id="mineT" src="" alt="" /><img id="mineN"  src="" alt="" />
        </td>
        <td class="mineHeaderCell">
            <a href="javascript:newGame();"><img id="statusFace" src="" alt="" /></a>
        </td>
        <td class="mineHeaderCell">
            <img id="timeH" src="" alt="" /><img id="timeT" src="" alt="" /><img id="timeN"  src="" alt="" />
        </td>
     </tr>
     <tr>
        <td style="margin:0xp; border:0px 0px 1px 0px; padding:0px; font-size:3px; border-bottom: solid 2px #999999;" colspan="3">
	 	   <?php
	 		include_once "Controller/MineSweeper.php";
			$MineSweeper = new MineSweeper;
			$hangNum = $MineSweeper->mines->hangNum;
			$lieNum = $MineSweeper->mines->lieNum;
			$mineNum = $MineSweeper->mines->mineNum;
			echo "<input type='hidden' id='mineNum' value=".$mineNum."/>";
			for($i=1;$i<$hangNum;$i++){
				for($j=1;$j<$lieNum;$j++){
					echo "<input type='image' src='Images/Cells/cell.gif' id=".$i."_".$j."/>";
				}
				echo "<br/>";
			}
			
			?>
		
		</td>
     </tr>
    </table>
	</div>
	
	
	
	
   <script type="text/javascript">
   
		var costTime=0;
		var mineNum=$('#mineNum').attr('value');
   
		ImageInfo = {	                            			Cell:{Cell1:"Images/Cells/1.gif",Cell2:"Images/Cells/2.gif",Cell3:"Images/Cells/3.gif",Cell4:"Images/Cells/4.gif",Cell5:"Images/Cells/5.gif",Cell6:"Images/Cells/6.gif",Cell7:"Images/Cells/7.gif",Cell8:"Images/Cells/8.gif",Cell:"Images/Cells/cell.gif",CellAsk:"Images/Cells/ask.gif",CellEmpty:"Images/Cells/empty.gif",CellFlag:"Images/Cells/flag.gif",CellMine:"Images/Cells/mine.gif",CellMineNo:"Images/Cells/mine_no.gif",CellMineYes:"Images/Cells/mine_yes.gif",Path:"Images/Cells/",Extend:".gif"},
                            			Digit:{Digit0:"Images/Digits/0.gif",Digit1:"Images/Digits/1.gif",Digit2:"Images/Digits/2.gif",Digit3:"Images/Digits/3.gif",Digit4:"Images/Digits/4.gif",Digit5:"Images/Digits/5.gif",Digit6:"Images/Digits/6.gif",Digit7:"Images/Digits/7.gif",Digit8:"Images/Digits/8.gif",Digit9:"Images/Digits/9.gif",DigitMin:"Images/Digits/min.gif",DigitNull:"Images/Digits/null.gif"},
                            			Face:{FaceLose:"Images/Faces/lose.gif",FaceNormal:"Images/Faces/normal.gif",FaceWin:"Images/Faces/win.gif"}
 };
		 
 		CssInfo = {
     SavedCell:{SavedCell:"savedCell", SavedCellFlag:"savedCellFlag", SavedCellAsk:"savedCellAsk", SavedCellEmpty:"savedCellEmpty", SavedCellMineYes:"savedCellMineYes", SavedCellMineNo:"savedCellMineNo", SavedCellMine:"savedCellMine", SavedCell1:"savedCell1", SavedCell2: "savedCell2", SavedCell3:"savedCell3", SavedCell4:"savedCell4", SavedCell5:"savedCell5", SavedCell6:"savedCell6", SavedCell7:"savedCell7", SavedCell8: "savedCell8"},
     SavedGame:{SavedGame:"savedGame", SavedGameMouseOver:"savedGameMouseOver"}
 };
   
   
	$(document).ready(function(){
		start();
	 });
	 
	 	function start(){
	 		setInterval(timeLapseHandler,1000);
			setMineNumHandler(mineNum);
			faceHandler(ImageInfo.Face["FaceNormal"]);
		 }
	  
		 function timeLapseHandler(){
	         this.costTime++;
	         this.costTimeHandler(this.costTime);
		 	
		 }
	     function costTimeHandler(costTime){
	         var h=t=n=0;
	         var temp = costTime.toString();
	         var length = temp.length; 
	         if(length>=3)
	             h = temp.charAt(length-3);
	         if(length>=2)
	             t = temp.charAt(length-2);
	         if(length>=1)
	             n = temp.charAt(length-1);
			
	         $("#timeH").attr("src",ImageInfo.Digit["Digit"+h]);
	       	 $("#timeT").attr("src",ImageInfo.Digit["Digit"+t]);
	         $("#timeN").attr("src",ImageInfo.Digit["Digit"+n]);
	     }
		 function setMineNumHandler(mineNum){
	         var h=t=n=0;
	         var temp = mineNum.toString();
	         var length = temp.length; 
	         if(length>=3)
	             h = temp.charAt(length-3);
	         if(length>=2)
	             t = temp.charAt(length-2);
	         if(length>=1)
	             n = temp.charAt(length-1);
			
	         $("#mineH").attr("src",ImageInfo.Digit["Digit"+h]);
	       	 $("#mineT").attr("src",ImageInfo.Digit["Digit"+t]);
	         $("#mineN").attr("src",ImageInfo.Digit["Digit"+n]);
		 	
		 }
	     function faceHandler(faceImage){
			 $("#statusFace").attr("src",faceImage);
	        
	     }
		 


   </script>
	
</body>
</html>