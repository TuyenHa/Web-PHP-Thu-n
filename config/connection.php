<?php
$conn=mysql_connect("localhost","root","") or die("Không thể kết nối").mysql_error();
mysql_select_db("quanlybalo",$conn) or die("Không thể kết nối").mysql_error();
mysql_query("SET NAMES 'utf8'");
?>