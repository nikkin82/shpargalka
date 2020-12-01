<?php  
include("connect.php");
 class cms{	
public $start;public $section;public $comments;public $num;public $links;public $id;public $pages;	public $per_page;public $Default;public $page;public $select;public $amount;public $select_comment;	public $disp_comment;public $output;public $Key;public $table;public $str;public $select_all;public $search;	public $user; public $date; public $comment; public $default_img="default.jpg"; public $image;
public $username;public $Date;public $data_id;public $insert;public $replace;public $radio;public $values;public $result; public $items;
public $size;public $keys;public $update;public $meta;public $color;public $sum;public $server;public $full_url;
public function __construct(){
	if(isset($_GET["search"])){	$this->search=$_GET["search"];}	
	if(isset($_GET["section"])){$this->section = $_GET["section"];}
	if(isset($_GET["pages"])){$this->pages = $_GET["pages"];}else{$this->pages=1;}
	if(isset($_GET["key"])){$this->Key=$_GET["key"];}else{$this->Key=14;}
	if(isset($_GET["amount"])){$this->amount=$_GET["amount"];}
		if(isset($_GET["id"])){$this->id=$_GET["id"];}	$this->select_all=mysql_query("SELECT * FROM tutors");	
		if(isset($_GET["result"])){$this->result=$_GET["result"];}
		if(isset($_SERVER["SERVER_NAME"])){
			$this->server=gethostbyname($_SERVER['SERVER_NAME']);}
			$this->full_url="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
			}
			
			
public function click($x,$n){
	if($this->section==$x){
	?><style>#nav-wrapper ul li:nth-child(<?=$n;?>){
display:inline-block;border-radius:0px 0px 0px 0px;box-shadow:0px 5px 0px 1px  darkgreen, 0px -6px 0px 1px  darkgreen;background: darkgreen;}
#nav-wrapper ul li:nth-child(<?=$n;?>)>a{color:white;font-weight:300;}</style><?php 
}
}		

public function insertcomments(){
	require"censored.php";$this->replace="@";
if(isset($_POST["comment"])){$this->comment=str_replace($censored,$this->replace,$_POST["comment"]);
}
if(isset($_POST["username"])){
	$this->username=str_replace($censored,$this->replace,$_POST["username"]);
	}	
if(isset($_POST["data_id"])){
	$this->data_id=$_POST["data_id"];}
	if(isset($_POST["date"])){
		$this->Date=$_POST["date"];
		}
if($this->username && $this->comment && $this->data_id && $this->Date){	
mysql_query("INSERT INTO comments (data_id,user,comment,date)
VALUES('$this->data_id','$this->username','$this->comment','$this->Date')");
}
}	

public function count_comment(){
	$this->id=$this->output['id'];
$this->select_comment=mysql_query("SELECT * FROM comments WHERE data_id='".$this->id."'");
$this->num=mysql_num_rows(
$this->select_comment);
return $this->num;	
}		
		
public function sort_coments($order){
	$this->select_comment=mysql_query("SELECT * FROM comments WHERE data_id='".$this->id."' ORDER BY comment_id $order");
	return $this->select_comment;
	}
	
 public function countsections($x){
	 $this->select=mysql_query("SELECT * FROM tutors WHERE menu='".$x."'");
 $this->num=mysql_num_rows($this->select);echo $this->num;
 }	
 													
public function countall(){$this->num=mysql_num_rows($this->select_all);return $this->num;
}	
									
public function pagination(){
	$this->start =($this->Key*$this->pages) - $this->Key;
	$this->page=ceil($this->amount/$this->Key)+1;
	}	
			
public function find_data(){
	if($this->search){
		$this->select=mysql_query("SELECT * FROM tutors WHERE title LIKE '%$this->search%'");
$this->num=mysql_num_rows($this->select);}
}	
		
public function showdata($section){	
$this->pagination();if($this->search){
	echo $this->find_data();
	}else{
if($section=="home"){
	$this->select=mysql_query("SELECT * FROM tutors ORDER BY id DESC LIMIT ".$this->start.",".$this->Key."");
}else{$this->select=mysql_query("SELECT * FROM tutors WHERE menu='".$this->section."'ORDER BY id DESC LIMIT ".$this->start.",".$this->Key."");}	
}$this->output=mysql_fetch_array($this->select);do{?>
		<div class="inner-div">
		<div class="header-box"><h1><?php echo $this->output['title'];?></h1>
        <span class="section-span">კატეგორია/<?php echo $this->output['menu'];?></span></div>
		<p><a href="pages/index.php?id=<?php echo $this->output['id']; ?>" style="background:url(img/<?php echo $this->output['photo'];?>);
 			background-position:center;background-size:200px 200px;"></a>
			<span class="statistics">კომენტარები:<?php echo $this->count_comment();?> | ნანახია 
			<?php echo $this->output['visit_count'];?> - ჯერ | 
            თარიღი: <?php echo $this->output['date'];?></span>
			<?php echo strip_tags($this->output['body_text']);?>
 		</p><div class="plugins"> 
 			<div class="plugins-box">
 				 <a href="">F</a>
				 <a href="">T</a>
				 <a href=""> G</a>
				 <a href="">I</a>
				 <a href="">U</a>
         		 
	 	   </div>     <div class="redirect"><a href="pages/index.php?id=<?php echo $this->output['id']; ?>"> წაიკითხეთ სრულად...</a></div>
 		</div>
	 </div>
		<?php }while($this->output=mysql_fetch_array($this->select));
	$links=["home","html","css","php","mysql","javascript"];	
														//	PAGINATION
	if($this->amount>$this->Key){?>
	<div id="pagination">		 
	<ul id="pages">    
	<?php for($x=1; $x<$this->page; $x++){?>
		<li><a href="?section=<?php echo $this->section; ?>&pages=<?php echo $x;?>&key=<?php echo $this->Key; ?>&amount=<?php 
		echo $this->amount;?>">
		<?php echo $x; ?></a></li>
		<?php }	?>
	</ul>		
	</div>
	<?php }else{echo " ";}
	}	
	
	
public function rating(){
	if(isset($_POST["radio"])){
		$this->radio=$_POST["radio"];
		foreach($this->radio as $this->values);
		}
$this->select=mysql_query("SELECT * FROM rating");
$this->output=mysql_fetch_array($this->select);
$this->num=mysql_num_rows($this->select);
$this->Key=["positive","average","negative"];
}		
public function updaterating($keys){
	$this->rating();if($this->values==$keys){
		@$this->update=$this->output[$keys]+1;
mysql_query("UPDATE rating SET $keys=$this->update");$this->select=mysql_query("SELECT * FROM rating");
$this->output=mysql_fetch_array($this->select);
}
}
public function data_rating(){
	if(isset($_POST["radio"])){
		$this->radio=$_POST["radio"];
foreach($this->radio as $this->values);	
}
if(isset($_POST["data_id"])){
	$this->data_id=$_POST["data_id"];
	}	 
if($this->data_id && $this->values){
	mysql_query("INSERT INTO data_rating(data_id,value) VALUES('$this->data_id','$this->values')");
	$this->select=mysql_query("SELECT * FROM data_rating WHERE data_id='$this->data_id'");
	$this->output=mysql_fetch_array($this->select);}
	}
	
public function select_values($class,$value){
	return mysql_query("SELECT * FROM data_rating WHERE data_id='$class' AND value='$value'");
	
	}}

		

	
?>