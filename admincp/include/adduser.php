
<div class="row">
	<ol class="breadcrumb">
		<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li><a href="index.php?content=users">Tài Khoản</a></li>
		<li class="active">Thêm tài khoản</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<!-- <h1 class="page-header">Quản Lý Sản Phẩm</h1> -->
	</div>
</div><!--/.row-->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>
				<use xlink:href="#stroked-table"/></svg>
				<use xlink:href="#stroked-email"></use></svg>Thêm tài khoản</div>
				<div class="panel-body">
					<?php 
					include('../config/connection.php');
					if(isset($_POST['adduser'])){
						$taikhoan=$_POST['name'];
						$email=$_POST['email'];
						$matkhau=md5($_POST['password']);
						$rematkhau=md5($_POST['repassword']);
						$gioitinh=$_POST['radio'];
						$ngaysinh=$_POST['ngaysinh'];
						$quequan=$_POST['quequan'];
						$diachi=$_POST['diachi'];
						$sdt=$_POST['sdt'];
						$quantri=$_POST['radioadmin'];
						$truyVan="select * from taikhoan where tai_khoan='$taikhoan' or email='$email'";
						$result=mysql_query($truyVan);

						if($row=mysql_num_rows($result)>0){
							echo '<div class="alert bg-danger" role="alert">
							<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Tên tài khoản hoặc email đã tồn tại <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
						</div>';
					}else{
						if($matkhau==$rematkhau){
							$sql="INSERT INTO taikhoan (tai_khoan,mat_khau,email,gioi_tinh,ngay_sinh,que_quan,dia_chi,sdt,phan_quyen) VALUES ('$taikhoan','$matkhau','$email','$gioitinh','$ngaysinh','$quequan','$diachi','$sdt','$quantri')";
							$query=mysql_query($sql);
							if($query){
								echo '<div class="alert bg-success" role="alert">
								<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Thêm Thành Công <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
							</div>';
						}else{
							echo "lỗi";
						}
					}else{
						echo '<div class="alert bg-danger" role="alert">
						<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Mật khẩu không khớp nhau <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
					</div>';
				}

			}
		}
		?>
		<form class="form-horizontal" action="" method="post">
			<fieldset>
				<!-- Name input-->
				<div class="form-group">
					<label class="col-md-3 control-label" for="name">Tên tài khoản</label>
					<div class="col-md-6">
						<input id="name" name="name" type="text" minlength="3" placeholder="Nhập tên tài khoản" required="" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label" for="name">Email</label>
					<div class="col-md-6">
						<input id="name" name="email" type="email" placeholder="Nhập tên email" required="" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label" for="name">Mật khẩu</label>
					<div class="col-md-6">
						<input id="name" name="password" type="password" placeholder="Nhập mật khẩu" required="" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label" for="name">Nhập lại mật khẩu</label>
					<div class="col-md-6">
						<input id="name" name="repassword" type="password" placeholder="Nhập lại mật khẩu" required="" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label" for="name">Giới tính</label>
					<div class="col-md-6">
						<input id="name" name="radio" type="radio" value="Nam" required=""> Nam <input id="name" name="radio" type="radio" value="Nữ" required=""> Nữ 
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label" for="name">Ngày sinh</label>
					<div class="col-md-6">
						<input id="name" name="ngaysinh" type="date" placeholder="Nhập ngày sinh" required="" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label" for="name">Quê quán</label>
					<div class="col-md-6">
						<input id="name" name="quequan" type="text" placeholder="Nhập  quê quán" required="" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label" for="name">Địa chỉ</label>
					<div class="col-md-6">
						<input id="name" name="diachi" type="text" placeholder="Nhập địa chỉ" required="" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label" for="name">Số điện thoại</label>
					<div class="col-md-6">
						<input id="name" name="sdt" type="number" maxlength="11" placeholder="Nhập số điện thoại" required="" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label" for="name">Quản trị viên</label>
					<div class="col-md-6">
						<input type="radio" name="radioadmin" value="1">Admin
						<input type="radio" name="radioadmin" value="2">Thành Viên
					</div>
				</div>
				<!-- Form actions -->
				<div class="form-group">
					<div class="col-md-9 widget-right">
						<button type="submit" name="adduser" class="btn btn-danger btn-md pull-right">Thêm thành viên</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>
</div><!--/.col-->
		</div><!--/.row-->