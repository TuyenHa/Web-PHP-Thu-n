<?php 
include('config/connection.php');
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="select * from binhluan where id_san_pham='$id'";
	$query=mysql_query($sql);
	$num=mysql_num_rows($query);
}
?>
<div class="comment">
	<h2 style="color: #01A9DB;
	font-size: 25px;
	border-bottom:1px solid blue;">Bình luận <i class="fa fa-commenting-o" aria-hidden="true"></i></h2> 
	<?php 
	if($num > 0 ){
		while($row=mysql_fetch_array($query))
		{

			?>

			<div style="background-color: #F2F2F2" class="alert  alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<p><strong class="">Họ Tên :</strong><?php echo $row['ho_ten'] ?></p>
				<p><strong>Nội Dung :</strong><?php echo $row['noi_dung'] ?></p>
			</div>
			<?php
		}
		
	}else{
		?>
		<div class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Chú ý !</strong>Không có bình luận nào.Hãy viết đôi lời cảm nghĩ của mình về sản phẩm này ...
		</div>
		<?php
	}
	?>

	<?php 
	if(isset($_POST['ok'])){
		$hoten=$_POST['txthoten'];
		$id_san_pham=$id;
		$noidung=$_POST['txtnoidung'];
		$email=$_POST['email'];
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$ngaybinhluan = date("Y-m-d");
		$sqlcomment="INSERT INTO binhluan(ho_ten,id_san_pham,email,noi_dung,ngay_binh_luan) VALUES('$hoten','$id_san_pham','$email','$noidung','$ngaybinhluan')";
		$querycomment=mysql_query($sqlcomment);
		if($querycomment){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Gửi bình luận thành công !
			</div>
			
			<?php
		}else{
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Gửi bình luận không thành công !
			</div>
			<?php
		}
	}
	?>
	<h2><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
		Viết bình luận</span></h2>
		<form method="post" action="">
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputEmail1">Họ tên</label>
					<input type="text" required="" class="form-control" id="hoten" name="txthoten"  placeholder="Vui lòng nhập hộ tên...">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Email</label>
					<input type="email" required="" class="form-control" id="email" name="email"  placeholder="Vui lòng nhập hộ tên...">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label for="exampleInputPassword1">Nội Dung</label>
					<textarea class="form-control ckeditor" name="txtnoidung" placeholder="Nhập nội dung bình luận...."></textarea>
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
				</div>
				<input type="submit" name="ok" class="btn btn-warning pull-right" value="Gửi bình luận">
			</div>
		</form>
	</div>
</br>