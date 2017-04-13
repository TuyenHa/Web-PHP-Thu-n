<?php
include('config/connection.php');
if(isset($_POST['ok'])){
	$user=$_POST['txttaikhoan'];
	$pass=md5($_POST['txtmatkhau']);
	$sql= "select * from taikhoan where tai_khoan='$user' && mat_khau='$pass'";
	$result=mysql_query($sql);
	if(!(mysql_num_rows($result))==null){
		$_SESSION["taikhoan"]=$_POST['txttaikhoan'];
		?>
		<script language="javascript">
			window.alert("Đăng nhập thành công");
			window.location="index.php"
		</script>
		<?php

	}else{
		?>
		<script language="javascript">
			window.alert("Đăng nhập không thành công");
		</script>
		<?php
	}
}
?>
<div class="col-md-12">
	<div class="login">
		<h2 ><i class="fa fa-laptop" aria-hidden="true"></i>
			Đăng nhập tài khoản</h2>
			<form action="" method="post">
				<table class="table-bordered table table-hover table-responsive">
					<tbody>
						<tr>
							<td>Tài Khoản</td><td><input type="text" class="form-control" name="txttaikhoan"></td>
						</tr>
						<tr>
							<td>Mật Khẩu</td><td><input type="password" class="form-control" name="txtmatkhau"></td>
						</tr>
						<tr>
							<td></td><td><input type="submit"  class="btn btn-success btn-md" name="ok" value="Đăng Nhập"></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>