
<div class="register">
	<h2 ><i class="fa fa-laptop" aria-hidden="true"></i>
		Đăng kí tài khoản</h2>
		<?php 
		include('config/connection.php');
		if(isset($_POST['ok'])){
			$taikhoan=$_POST['taikhoan'];
			$email=$_POST['email'];
			$matkhau=md5($_POST['matkhau']);
			$rematkhau=md5($_POST['nhaplaimatkhau']);
			$gioitinh=$_POST['gioitinh'];
			$ngaysinh=$_POST['ngaysinh'];
			$quequan=$_POST['quequan'];
			$diachi=$_POST['diachi'];
			$sdt=$_POST['sdt'];
			$quantri='2';
			$truyVan="select * from taikhoan where tai_khoan='$taikhoan' or email='$email'";
			$result=mysql_query($truyVan);

			if($row=mysql_num_rows($result)>0){
				echo '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<center>Tài khoản hoặc email đã tồn tại</center>
			</div>';
		}else{
			if($matkhau==$rematkhau){
				$sql="INSERT INTO taikhoan (tai_khoan,mat_khau,email,gioi_tinh,ngay_sinh,que_quan,dia_chi,sdt,phan_quyen) VALUES ('$taikhoan','$matkhau','$email','$gioitinh','$ngaysinh','$quequan','$diachi','$sdt','$quantri')";
				$query=mysql_query($sql);
				if($query){
					echo '<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<center>Đăng kí thành công </center>
			</div>';
			}else{
				echo "lỗi";
			}
		}else{
			echo '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<center>Mật khẩu không khớp nhau</center>
			</div>';
	}

}
}
?>
<form action="" method="post">
	<table class="table-bordered table table-hover table-responsive">
		<tbody>
			<tr>
				<td>Tài khoản</td><td><input type="text" class="form-control" name="taikhoan" required></td>
			</tr>
			<tr>
				<td>Mật khẩu</td><td><input type="password" class="form-control" name="matkhau" required></td>
			</tr>
			<tr>
				<td>Nhập lại mật khẩu</td><td><input type="password" class="form-control"  name="nhaplaimatkhau" required></td>
			</tr>
			<tr>
				<td>Email</td><td><input type="email" class="form-control" name="email"  required></td>
			</tr>
			<tr>
				<td>Giới tính</td><td><select required name="gioitinh" class="form-control">
				<option value="Nam">Nam</option>
				<option value="Nữ">Nữ</option>
			</select></td>
		</tr>
		<tr>
			<td>Ngày sinh</td><td><input type="date" class="form-control" name="ngaysinh" required ></td>
		</tr>
		<tr>
			<td>Quê quán</td><td><input type="text" class="form-control" name="quequan" required ></td>
		</tr>
		<tr>
			<td>Địa chỉ</td><td><input type="text" class="form-control" name="diachi" required ></td>
		</tr>
		<tr>
			<td>Số điện thoại</td><td><input type="text" class="form-control" name="sdt" required ></td>
		</tr>
		<tr>
			<td></td><td><input type="submit" class="btn btn-primary btn-md" name="ok" value="Đăng Kí"></td>
		</tr>
	</tbody>
</table>
</form>
</div>