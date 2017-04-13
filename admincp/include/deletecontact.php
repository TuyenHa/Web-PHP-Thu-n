<?php 
include ('../../config/connection.php');
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="delete from lienhe where id_lien_he =$id";
	echo $sql;
	$query=mysql_query($sql);
		header('location:../index.php?content=contacts');

}
?>