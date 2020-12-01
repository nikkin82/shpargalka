<?php 
$sidebar=new cms();
$sidebar->table="tutors";
$sidebar->select=mysql_query("SELECT * FROM $sidebar->table ORDER BY id DESC LIMIT 0,15");
$sidebar->output=mysql_fetch_array($sidebar->select);

 ?><div id="section-box">
		<h1>პოპულარული</h1>
		<ol><?php do{ ?>
			<li>
            <a href="pages/index.php?id=<?php echo $sidebar->output["id"];?>" class="title">
			<?php echo $sidebar->output["title"]; ?></a>
            <a href="index.php?section=<?php echo $sidebar->output['menu']; ?>" class="menu"><?php echo $sidebar->output["menu"]; ?></a>
            </li>
			<?php }while($sidebar->output=mysql_fetch_array($sidebar->select)); ?>
		</ol>
	</div>
    <script>
    var h1=document.getElementsByClassName("title");
	
	function Hover()
	{
	var menu=document.getElementsByClassName("menu");
	for(var x=0;x<menu.length;x++){
	menu[x].style.display="inline";	
	console.log(menu.length);
	};
	}
	
	h1.forEach==output;
	
	function output(value,index,array){
	
	console.log(index);
	
	}
	
    </script>