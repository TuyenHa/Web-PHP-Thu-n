<?php 
include ('../../config/connection.php');
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="delete from binhluan where id_binh_luan =$id";
	echo $sql;
	$query=mysql_query($sql);
	header('location:../index.php?content=comments');
}
?>