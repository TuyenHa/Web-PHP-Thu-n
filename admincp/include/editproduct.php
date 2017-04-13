<?php
include('../config/connection.php');
if(isset($_GET['id'])) 
{
	$id=$_GET['id'];
	$sql="select * from sanpham where id_san_pham=$id";
	$query=mysql_query($sql);
	?>
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="{{asset('admincp/index')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li><a href="{{asset('admincp/products')}}">Sản phẩm</a></li>
			<li class="active">Sửa sản phẩm</li>
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
				<div class="panel-heading"><svg class="glyph stroked table"><use xlink:href="#stroked-table"/></svg>
					<use xlink:href="#stroked-email"></use></svg>Sửa sản phẩm</div>
					<div class="panel-body">
						<?php 
						if(isset($_POST['ok'])){
							$tensanpham=$_POST['tensanpham'];
							$danhmuc=$_POST['danhmuc'];
							$gia=$_POST['gia'];
							$soluong=$_POST['soluong'];
							$baohanh=$_POST['baohanh'];
							$khuyenmai=$_POST['khuyenmai'];
							$tinhtrang=$_POST['tinhtrang'];
							$mota=$_POST['mota'];
							$dacbiet=$_POST['radiodb'];
							$fileName =$_FILES['img']['name'];
							$fileTmptName=$_FILES['img']['tmp_name'];
							$file_ext=strtolower(end(explode('.',$_FILES['img']['name'])));
							date_default_timezone_set('Asia/Ho_Chi_Minh');
							$ngay_nhap = date("Y-m-d");
							if($file_ext){
								$expensions= array("jpeg","jpg","png");
								if(in_array($file_ext,$expensions) === false){
									echo '<div class="alert bg-danger" role="alert">
									<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Ảnh sản phẩm không hợp lệ <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
								</div>';
							}
							
							
							move_uploaded_file($fileTmptName,'../img/products/'.$fileName);
							$update ="";
							if($fileName!=null){
								$sqldep="select * from sanpham where id_san_pham ='$id'";
								$querydep=mysql_query($sqldep);
								while ($row=mysql_fetch_array($querydep)) {
									$imgp=$row['anh_san_pham'];
								}
								unlink("../img/products/".$imgp);
								$update="UPDATE sanpham SET ten_san_pham='$tensanpham',id_danh_muc='$danhmuc',gia='$gia',mo_ta='$mota',so_luong='$soluong',bao_hanh='$baohanh',khuyen_mai='$khuyenmai',ngay_nhap='$ngay_nhap',tinh_trang='$tinhtrang',dac_biet='$dacbiet',anh_san_pham='$fileName' WHERE id_san_pham='$id'";
							}
							else
							{
								$update="UPDATE sanpham SET ten_san_pham='$tensanpham',id_danh_muc='$danhmuc',gia='$gia',mo_ta='$mota',so_luong='$soluong',bao_hanh='$baohanh',khuyen_mai='$khuyenmai',ngay_nhap='$ngay_nhap',tinh_trang='$tinhtrang',dac_biet='$dacbiet' WHERE id_san_pham='$id'";
							}
							$queryupdate=mysql_query($update);
							if($queryupdate){
								echo '<div class="alert bg-success" role="alert">
								<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Sửa thành công <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
							</div>';		
							header('location:index.php?content=products');	
						}else{
							echo '<div class="alert bg-danger" role="alert">
							<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Sửa không thành công <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
						</div>';
					}
				}
			}

			?>
			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
				<fieldset>
					<?php 
					while ($row=mysql_fetch_array($query)) {
						?>
						<!-- Name input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="name">Tên sản phẩm</label>
							<div class="col-md-6">
								<input id="name" name="tensanpham" type="text" placeholder="Nhập tên sản phẩm" class="form-control" value="<?php echo $row['ten_san_pham']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="name">Danh Mục</label>
							<div class="col-md-6">
								<select name="danhmuc" class="form-control">
									<?php 
									$id_danh_muc=$row['id_danh_muc'];
									$sqlp="select * from danhmuc";
									$queryp=mysql_query($sqlp);
									while($rowp=mysql_fetch_array($queryp))
									{
										?>												
										<option value="<?php echo $rowp['id_danh_muc'] ?>"><?php echo $rowp['ten_danh_muc'] ?></option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="name">Giá</label>
							<div class="col-md-6">
								<input id="name" name="gia" type="text" placeholder="Nhập giá" class="form-control" value="<?php echo $row['gia']; ?>">
							</div>
						</div>
						<!-- Email input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="email">Bảo hành</label>
							<div class="col-md-6">
								<input id="email" name="baohanh" type="text" placeholder="Nhập bảo hành" class="form-control" value="<?php echo $row['bao_hanh']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="name">Tình trạng</label>
							<div class="col-md-6">
								<input id="name" name="tinhtrang" type="text" placeholder="Nhập tình trạng" class="form-control" value="<?php echo $row['tinh_trang']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="name">Số Lượng</label>
							<div class="col-md-6">
								<input id="number" name="soluong" type="number" placeholder="Nhập số lượng" class="form-control" value="<?php echo $row['so_luong']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="name">Khuyến mãi</label>
							<div class="col-md-6">
								<input id="name" name="khuyenmai" type="text" placeholder="Nhập khuyến mãi" class="form-control " value="<?php echo $row['khuyen_mai']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="name">Hình ảnh</label>
							<div class="col-md-6">
								<input  id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)" >
								<img id="avatar" class="thumbnail" width="300px" src="../img/products/<?php echo $row['anh_san_pham'] ?>">
								
							</div>
						</div>

						<!-- Message body -->
						<div class="form-group">
							<label class="col-md-3 control-label" for="message">Mô tả</label>
							<div class="col-md-9">
								<textarea class="form-control ckeditor" name="mota" placeholder="Nhập mô tả sản phẩm ...."  rows="5"><?php echo $row['mo_ta']; ?></textarea>
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
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="name">Đặc biệt</label>
							<div class="col-md-6">
								<input id="name" name="radiodb" type="radio" 
								<?php if($row['dac_biet']=="1"){ ?>checked <?php } ?>

								value="1"> Có 
								<input id="name" name="radiodb" type="radio" <?php if($row['dac_biet']=="0"){ ?>checked <?php } ?> value="0"> Không
							</div>
						</div>
						<?php
					}
					?>
					<!-- Form actions -->
					<div class="form-group">
						<div class="col-md-12 widget-right">
							<button type="submit" name="ok" class="btn btn-danger btn-md pull-right">Sửa sản phẩm</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div><!--/.col-->
</div><!--/.row-->
<?php
}
?>
