<?php 
include('../config/connection.php');
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql1="select * from taikhoan where id_tai_khoan=$id";
	$query1=mysql_query($sql1);

}
?>
<div class="row">
	<ol class="breadcrumb">
		<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li><a href="index.php?content=users">Tài Khoản</a></li>
		<li class="active">Sửa tài khoản</li>
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
				<use xlink:href="#stroked-email"></use></svg>Sửa tài khoản</div>
				<div class="panel-body">
					<?php 
					include('../config/connection.php');
					if(isset($_POST['edituser'])){
						$taikhoan=$_POST['name'];
						$email=$_POST['email'];
						$matkhau=md5($_POST['password']);
						$gioitinh=$_POST['radio'];
						$ngaysinh=$_POST['ngaysinh'];
						$quequan=$_POST['quequan'];
						$diachi=$_POST['diachi'];
						$sdt=$_POST['sdt'];
						$quantri=$_POST['radioadmin'];
						$truyVan="select tai_khoan from taikhoan where tai_khoan='$taikhoan'";
						$result=mysql_query($truyVan);
						$num=mysql_num_rows($result);
						if($num > 0){
								echo '<div class="alert bg-danger" role="alert">
							<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Tên tài khoản đã tồn tại <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
						</div>';
						}else{
							$sql="UPDATE taikhoan SET tai_khoan='$taikhoan',mat_khau='$matkhau',email='$email',gioi_tinh='$gioitinh',ngay_sinh='$ngaysinh',que_quan='$quequan',dia_chi='$diachi',sdt='$sdt',phan_quyen='$quantri' where id_tai_khoan=$id";
							$query=mysql_query($sql);
							if($query){
								echo '<div class="alert bg-success" role="alert">
								<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Sửa Thành Công <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
							</div>';
						}else{
							echo '<div class="alert bg-danger" role="alert">
							<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Sửa không thành công <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
						</div>';
					}
				}
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<fieldset>
					<?php 
					while ($row=mysql_fetch_array($query1)) {
						?>
						<!-- Name input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="name">Tên tài khoản</label>
							<div class="col-md-6">
								<input id="name" name="name" type="text" minlength="3" placeholder="Nhập tên tài khoản" required="" class="form-control" value="<?php echo $row['tai_khoan'] ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="name">Email</label>
							<div class="col-md-6">
								<input id="name" name="email" type="email" placeholder="Nhập tên email" required="" class="form-control" value="<?php echo $row['email'] ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="name">Mật khẩu</label>
							<div class="col-md-6">
								<input id="name" name="password" type="password" placeholder="Nhập lại mật khẩu hoặc mật khẩu cũ" required="" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="name">Giới tính</label>
							<div class="col-md-6">
								<input id="name" name="radio" type="radio" value="Nam" required="" <?php if($row['gioi_tinh']=="Nam"){ ?>checked<?php } ?> > Nam <input id="name" name="radio" type="radio" value="Nữ" required="" <?php if($row['gioi_tinh']=="Nữ"){ ?>checked<?php } ?>> Nữ 
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="name">Ngày sinh</label>
							<div class="col-md-6">
								<input id="name" name="ngaysinh" type="input" placeholder="Nhập ngày sinh" required="" class="form-control" value="<?php echo $row['ngay_sinh'] ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="name">Quê quán</label>
							<div class="col-md-6">
								<input id="name" name="quequan" type="text" placeholder="Nhập  quê quán" required="" class="form-control" value="<?php echo $row['que_quan'] ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="name">Địa chỉ</label>
							<div class="col-md-6">
								<input id="name" name="diachi" type="text" placeholder="Nhập địa chỉ" required="" class="form-control" value="<?php echo $row['dia_chi'] ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="name">Số điện thoại</label>
							<div class="col-md-6">
								<input id="name" name="sdt" type="number" maxlength="11" placeholder="Nhập số điện thoại" required="" class="form-control" value="<?php echo $row['sdt'] ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="name">Quản trị viên</label>
							<div class="col-md-6">
								<input type="radio" name="radioadmin" value="1" <?php if($row['phan_quyen']=="1"){ ?>checked<?php } ?>>Admin
								<input type="radio" name="radioadmin" value="2" <?php if($row['phan_quyen']=="2"){ ?>checked<?php } ?>>Thành Viên
							</div>
						</div>
						<!-- Form actions -->
						<div class="form-group">
							<div class="col-md-9 widget-right">
								<button type="submit" name="edituser" class="btn btn-danger btn-md pull-right">Sửa thành viên</button>
							</div>
						</div>
						<?php
					}
					?>
				</fieldset>
			</form>
		</div>
	</div>
</div><!--/.col-->
		</div><!--/.row-->