<div class="row">
	<ol class="breadcrumb">
		<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li><a href="index.php?content=products">Sản phẩm</a></li>
		<li class="active">Thêm sản phẩm</li>
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
				<use xlink:href="#stroked-email"></use></svg>Thêm Danh Mục</div>
				<div class="panel-body">
					<?php 
					include ('../config/connection.php');
					$sql="select * from danhmuc";
					$query=mysql_query($sql);
					if(isset($_POST['ok']))
					{
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
						$expensions= array("jpeg","jpg","png");

						if(in_array($file_ext,$expensions) === false){
							echo '<div class="alert bg-danger" role="alert">
							<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Ảnh sản phẩm không hợp lệ <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
						</div>';
					}else{
						$truyVan="SELECT * FROM sanpham WHERE ten_san_pham='$tensanpham'";
						$result=mysql_query($truyVan);
						if(mysql_num_rows($result) > 0 ){
							echo '<div class="alert bg-danger" role="alert">
							<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Tên sản phẩm đã tồn tại <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
						</div>';
					}else{
						move_uploaded_file($fileTmptName,'../img/products/'.$fileName);
						$sqlp="INSERT INTO sanpham(ten_san_pham,id_danh_muc,gia,mo_ta,so_luong,bao_hanh,khuyen_mai,ngay_nhap,tinh_trang,dac_biet,anh_san_pham) VALUES('$tensanpham','$danhmuc','$gia','$mota','$soluong','$baohanh','$khuyenmai','$ngay_nhap','$tinhtrang','$dacbiet','$fileName')";
						$queryp=mysql_query($sqlp);
						if($queryp){
							echo '<div class="alert bg-success" role="alert">
							<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Thêm thành công <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
						</div>';
					}else{
						echo '<div class="alert bg-danger" role="alert">
						<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Thêm không thành công <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
					</div>';
					unlink("../img/products/".$fileName);
				}
			}
		}
	}

	?>
	<form class="form-horizontal" method="post" enctype="multipart/form-data">
		<fieldset>
			<!-- Name input-->
			<div class="form-group">
				<label class="col-md-3 control-label" for="name">Tên sản phẩm</label>
				<div class="col-md-6">
					<input id="name" name="tensanpham" minlength="3" type="text" placeholder="Nhập tên sản phâm" required="" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="name">Tên danh mục</label>
				<div class="col-md-6">
					<select name="danhmuc" class="form-control">
						<?php
						while ($row=mysql_fetch_array($query)) {

							?> 
							<option value="<?php echo $row['id_danh_muc'] ?>"><?php echo $row['ten_danh_muc'] ?></option>
							<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="name">Giá</label>
				<div class="col-md-6">
					<input id="name" name="gia" type="number" placeholder="Nhập giá sản phẩm" required="" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="name">Số lượng</label>
				<div class="col-md-6">
					<input id="name" name="soluong" type="number" placeholder="Nhập tên danh mục" required="" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="name">Bảo hành</label>
				<div class="col-md-6">
					<input id="name" name="baohanh" type="text" placeholder="Nhập bảo hành" required="" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="name">Khuyến mãi</label>
				<div class="col-md-6">
					<input id="name" name="khuyenmai" type="text" placeholder="Nhập khuyến mãi" required="" class="form-control">
				</div>
			</div>
			<div class="form-group" >
				<label class="col-md-3 control-label" for="name">Ảnh sản phẩm</label>
				<div class="col-md-6">
					<input required id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
					<img id="avatar" class="thumbnail" width="300px" src="../img/logo/default.jpg">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="name">Tình trạng</label>
				<div class="col-md-6">
					<input id="name" name="tinhtrang" type="text" placeholder="Nhập tình trạng" required="" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="name">Mô tả</label>
				<div class="col-md-6">
					<textarea class="form-control ckeditor" name="mota" placeholder="Nhập mô tả sản phẩm ...."  rows="5"></textarea>
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
					<input id="name" name="radiodb" type="radio"  required value="1">Có
					<input id="name" name="radiodb" type="radio"  required  value="0">Không
				</div>
			</div>

			<!-- Form actions -->
			<div class="form-group">
				<div class="col-md-9 widget-right">
					<button type="submit" name="ok" class="btn btn-danger btn-md pull-right">Thêm danh mục</button>
				</div>
			</div>
		</fieldset>
	</form>
</div>
</div>
</div><!--/.col-->
		</div><!--/.row-->