<?php 
include ('../../config/connection.php');
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="delete from taikhoan where id_tai_khoan =$id";
	echo $sql;
	$query=mysql_query($sql);
	header('location:../index.php?content=users');
}
?>