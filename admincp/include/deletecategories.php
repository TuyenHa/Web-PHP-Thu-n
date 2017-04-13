<?php 
include ('../../config/connection.php');
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="delete from danhmuc where id_danh_muc =$id";
	echo $sql;
	$query=mysql_query($sql);
	header('location:../index.php?content=categories');
}
?>