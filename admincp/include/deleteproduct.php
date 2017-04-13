<?php 
include ('../../config/connection.php');
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sqldep="select *from sanpham where id_san_pham ='$id'";
	$querydep=mysql_query($sqldep);
	while ($row=mysql_fetch_array($querydep)) {
		$imgp=$row['anh_san_pham'];
	}
	unlink("../../img/products/".$imgp);
	$sql="delete from sanpham where id_san_pham =$id";
	echo $sql;
	$query=mysql_query($sql);
		header('location:../index.php?content=products');

}
?>