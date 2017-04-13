
<div class="col-md-12">
	<div class="login">
		<h2 ><i class="fa fa-laptop" aria-hidden="true"></i>
			Liên Hệ</h2>
			<?php 
			include('config/connection.php');
			if(isset($_POST['ok'])){
				$hoten=$_POST['hoten'];
				$sdt=$_POST['sdt'];
				$diachi=$_POST['diachi'];
				$noidung=$_POST['noidung'];
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				$ngaylienhe = date("Y-m-d");
				$sql="INSERT INTO lienhe(ho_ten,sdt,dia_chi,noi_dung,ngay_gui) VALUES('$hoten','$sdt','$diachi','$noidung','$ngaylienhe')";
				$query=mysql_query($sql);
				if($query){
					echo '<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					Gửi liên hệ thành công ! Ban quản trị sẽ liên lạc với bạn sớm nhất .
				</div>';
			}else{
				echo '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Gửi liên hệ không thành công !
			</div>';
		}
	}
	?>
	<form action="" method="post">
		<table class="table-bordered table table-hover table-responsive">
			<tbody>
				<tr>
				<td>Họ Tên</td><td><input type="text" required="" minlength="3" class="form-control" name="hoten"></td>
				</tr>
				<tr>
					<td>Số Điện Thoại</td><td><input type="number" required="" maxlength="11" class="form-control" name="sdt"></td>
				</tr>
				<tr>
					<td>Địa Chỉ</td><td><input type="text" required=" " class="form-control" name="diachi"></td>
				</tr>
				<tr>
					<td>Nội Dung</td><td><textarea name="noidung" required="" maxlength="50" class="ckeditor form-control"></textarea>
					<script type="text/javascript">
						var baseURL="http://localhost/webbalo"
						var editor = CKEDITOR.replace('description',{
							language:'vi',
							filebrowserImageBrowseUrl: baseURL+'/ckfinder/ckfinder.html?Type=Images',
							filebrowserFlashBrowseUrl: baseURL+'/ckfinder/ckfinder.html?Type=Flash',
							filebrowserImageUploadUrl: baseURL+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
							filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
						});
					</script>
				</td>
			</tr>
			<tr>
				<td></td><td><input type="submit"  class="btn btn-danger btn-md" name="ok" value="Gửi liên hệ"></td>
			</tr>
		</tbody>
	</table>
</form>
</div>
</div>