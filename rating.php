<?php 
$cms=new cms();
$cms->rating();$cms->updaterating($cms->values);
if(!$cms->result=="move_to_results"){
 ?><div id="rating-box">
    	<h1>საიტის შეფასება</h1>
    	<form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>?section=<?php echo $cms->section; ?>&amp;result=move_to_results">
			<input type="radio" name="radio[]" value="positive"><mark>დადებითი</mark>    		
			<input type="radio" name="radio[]" value="negative"><MARK>უარყოფითი</MARK>
    		<br>
			<input type="radio" name="radio[]" value="average"><MARK>საშუალო</MARk>
    		<br>
			<input type="submit" value="ხმის მიცემა">
    	</form>
    </div>
    <?php }else{?>    
    <div id="results-box">
    <h1>შეფასების შედეგები</h1>
    <ul>    
		<li class="li">დადებითი ხმა  <?php echo $cms->output[$cms->Key[0]]; ?></li>
		<li class="li"></li>
		<li class="li"></li>
		<li class="li">უარყოფითი ხმა <?php echo $cms->output[$cms->Key[2]]; ?></li>
		<li class="li"></li>
		<li class="li"></li>
		<li class="li">საშუალო <?php echo $cms->output[$cms->Key[1]]; ?></li>
		<li class="li"></li>
		<li class="li"></li>
    </ul>		
    </div><?php } 	
	$digit1=$cms->output[$cms->Key[0]];	$digit2=$cms->output[$cms->Key[2]];	$digit3=$cms->output[$cms->Key[1]];	$sum=$digit1+$digit2+$digit3;	
	function divide($x){global $sum;return ceil(($x/$sum)*267);	}?>
    <script type="text/javascript">
	var radio=document.getElementsByTagName("input");
		radio[2].style.cssText="margin-left:15%;";radio[3].style.cssText="margin-left:10%;";radio[4].style.cssText="margin-left:34%;";
		</script>
		<script type="text/javascript">		
	var li=document.getElementsByClassName("li");
		li[2].style.cssText="width:<?php echo divide($digit1); ?>px;";li[5].style.cssText="width:<?php echo divide($digit2); ?>px;";
		li[8].style.cssText="width:<?php echo divide($digit3); ?>px;";
	</script>