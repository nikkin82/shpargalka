<?php $nav=new cms();
$nav->click("home",1);
$nav->click("html",2);
$nav->click("css",3);
$nav->click("php",4);
$nav->click("mysql",5);
$nav->click("javascript",6);
$nav->click("jquery",7);
?>
<div id="nav-wrapper">
		<ul>
			<li><a href="index.php?section=home&amount=<?php echo $nav->countall();?>" class='a'>HOME</a></li>
			<li><a href="index.php?section=html&amount=<?php echo $nav->countsections("html");?>" class='a'>HTML</a></li>
			<li><a href="index.php?section=css&amount=<?php echo $nav->countsections("css");?>"  class='a'>CSS</a></li>
			<li><a href="index.php?section=php&amount=<?php echo $nav->countsections("php");?>" class='a'>PHP</a></li>
			<li><a href="index.php?section=mysql&amount=<?php echo $nav->countsections("mysql");?>" class='a'>MYSQL</a></li>
			<li><a href="index.php?section=javascript&amount=<?php echo $nav->countsections("javascript");?>" class='a'>JAVASCRIPT</a></li>
            <li><a href="index.php?section=jquery&amount=<?php echo $nav->countsections("jquery");?>" class='a'>JQUERY</a></li>
		</ul>
	</div>
    <script>
    var a=document.getElementsByClassName("a"); 
	var li=document.getElementsByTagName("li");
	
	for(var x=0;x<li.length;x++){
	li[x].style.cssText="margin-top:8px;";
	}
	a[0].style.cssText="padding-left:8px;padding-right:3px;";
	
		console.log(li[1]);
    </script>
    <div id="form-wrapper">
    	<form method="get" action="search.php">
        	<input type="text" name="search" placeholder="საძიებო სიტყვა...">
            <input type="image" src="img/zoom.png">
        </form>
    </div>
    