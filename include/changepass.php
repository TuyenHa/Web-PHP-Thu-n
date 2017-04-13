<?php 
include('config/connection.php');
if(isset($_SESSION['taikhoan']))
{
	$user=$_SESSION['taikhoan'];
	$sql="select * from taikhoan where tai_khoan='$user'";
	$query=mysql_query($sql);
}

?>
<div class="changpass">
	<h2 class="changpassh2"><i class="fa fa-laptop" aria-hidden="true"></i>
		Đổi mật khẩu</h2>
		<?php 
		if(isset($_POST['changepass'])){
			$taikhoan=$_SESSION['taikhoan'];
			$matkhau=md5($_POST['matkhau']);
			$matkhaumoi=md5($_POST['matkhaumoi']);
			$rematkhaumoi=md5($_POST['rematkhaumoi']);
			$sqlpass="select * from taikhoan where tai_khoan='$user'";
			$querypass=mysql_query($sqlpass);
			$matkhaucu='';
			while ($rowpass = mysql_fetch_array($querypass)) {
				$matkhaucu=$rowpass['mat_khau'];
			}
			if($matkhau==$matkhaucu){
				if($matkhaumoi==$rematkhaumoi){
					$sqlupdate="UPDATE taikhoan SET mat_khau='$matkhaumoi' WHERE tai_khoan='$user'";
					$queryupdate=mysql_query($sqlupdate);
					if($queryupdate){
						echo '<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<center>Đổi mật khẩu thành công !</center>
					</div>';
				}else{
					echo '<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<center>Đổi mật khẩu không thành công !</center>
				</div>';
			}
		}else{
			echo '<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<center>Mật khẩu mới và nhập lại mật khẩu không khớp nhau.</center>
		</div>';
	}
}else{
	echo '<div class="alert alert-danger alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<center>Mật khẩu cũ không chính xác.</center>
</div>';
}
}
?>
<form action="" method="post">
	<table class="table-responsive table table-hover table-bordered">
		<?php 
		while ($row=mysql_fetch_array($query)) {
			?>
			<tbody>
				<tr>
					<td>Tài khoản</td><td><input type="text" name="taikhoan" class="form-control" value="<?php echo $row['tai_khoan']; ?>" readonly=""></td>
				</tr>
				<tr>
					<td>Mật khẩu cũ</td><td><input type="password" name="matkhau" class="form-control" value="">
					<p style="color:red;">Chú ý :Nhập đúng mật khẩu cũ.Nếu không nhớ liên hệ Admin để nhận.</p>
				</td>
			</tr>
			<tr>
				<td>Mật khẩu mới</td><td><input type="password" name="matkhaumoi" class="form-control" value=""></td>
			</tr>
			<tr>
				<td>Nhập lại mật khẩu mới</td><td><input type="password" name="rematkhaumoi" class="form-control" value=""></td>
			</tr>
			<tr><td></td><td><input type="submit" name="changepass" class="btn btn-success btn-md" value="Đổi mật khẩu"></td></tr>
		</tbody>
		<?php
	}
	?>
</table>
</form>
</div>