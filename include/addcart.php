<?php 
session_start();
$id_san_pham=$_GET['id'];
if(isset($_SESSION['cart'][$id_san_pham])){
$_SESSION['cart'][$id_san_pham]=$_SESSION['cart'][$id_san_pham]+1;
}else{
$_SESSION['cart'][$id_san_pham]=1;
}
header('location:../index.php?content=carts');
 ?>