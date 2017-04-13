<?php
session_start();
if($_SESSION["taikhoan"]){
	session_destroy();
	?>
	<script language="javascript">
		window.alert("Đăng Xuất Thành Công");
		window.location="../index.php";
	</script>
	<?php
}
else
{
	header("location:../index.php");
}
?>