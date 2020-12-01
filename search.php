
<?php
include("connect.php");
include("classes.php");

$search=new cms();
if(isset($_GET["search"])){
	$search->search=$_GET["search"];
	}
echo $search->find_data();
$search->output=mysql_fetch_array($search->select);

 ?><!--<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">-->
 <!doctype html>
 <html lang="ka">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="tutorials, vocabulary, web tutorials, html, css, php, mysql, java script">
<meta name="description" content="this site is about web site tutorials created on 28.11.2020">
<title>responsive</title>
<link rel="stylesheet" href="style.css?<?php echo time(); ?>" type="text/css">

</head>

<body>
<div id="main-wrapper">	
	<div id="div1">
		<?php include"banner.php"; ?>
	</div>
<div id="div2">
	<?php include"navigation.php";?>
</div>

<div id="div3">
	<?php include("sidebar.php");	
		  include("rating.php");	
	?>   
    
</div>


<div id="div4">

	
     <?php 
	 //echo $search->showdata("home");
	 if($search->num>0){	 
	 do{
	echo $search->showdata($search->section);
	}while($search->output=mysql_fetch_array($search->select));
	 
	 }
	 ?>
     
     
     
     
</div>


<div id="div5">
<ul>
			<li><a href="?section=home" class='a'>HOME</a></li>
			<li><a href="?section=html" class='a'>HTML</a></li>
			<li><a href="?section=css"  class='a'>CSS</a></li>
			<li><a href="?section=php" class='a'>PHP</a></li>
			<li><a href="?section=mysql" class='a'>MYSQL</a></li>
			<li><a href="?section=javascript" class='a'>JAVASCRIPT</a></li>
		</ul>
        <p>Copyright © 2019 iosart labs llc, All Rights Reserved</p>
</div>



</div>
</body>
</html>