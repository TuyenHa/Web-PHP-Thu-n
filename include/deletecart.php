<?php 
session_start();
$id_san_pham=$_GET['id'];
if($id_san_pham==0){
	unset($_SESSION['cart']);
}else{
	unset($_SESSION['cart'][$id_san_pham]);
}
if(count($_SESSION['cart'])==0){
	unset($_SESSION['cart']);
}
header('location:../index.php?content=carts');
?>

