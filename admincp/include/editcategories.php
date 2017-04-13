<?php
include('../config/connection.php');
if(isset($_GET['id'])) 
{
	$id=$_GET['id'];
	$sql="select * from danhmuc where id_danh_muc=$id";
	$query=mysql_query($sql);

	?>
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li><a href="index.php?content=categories">Danh mục</a></li>
			<li class="active">Sửa danh mục</li>
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
					<use xlink:href="#stroked-email"></use></svg>Sửa danh mục</div>
					<div class="panel-body">
						<?php 
						if(isset($_POST['editcategories'])){
							$nameCate=$_POST['name'];
							$truyVan="select ten_danh_muc from danhmuc where ten_danh_muc='$nameCate'";
							$result=mysql_query($truyVan);
							$row=mysql_num_rows($result);
							if($row > 0){
								echo '<div class="alert bg-danger" role="alert">
								<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Danh Mục đã tồn tại <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
							</div>';
						}else{
							$sql1="UPDATE danhmuc SET ten_danh_muc='$nameCate' WHERE id_danh_muc='$id'";
						$query1=mysql_query($sql1);
						header('location:index.php?content=categories');
						}
					}

					?>
					<form class="form-horizontal" action="" method="post">
						<fieldset>
							<?php
							while ($row=mysql_fetch_array($query)) {
								?>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Tên sản phẩm</label>
									<div class="col-md-6">
										<input id="name" name="name" type="text" placeholder="Nhập tên sản phẩm" class="form-control" value="<?php echo $row['ten_danh_muc']; ?>">
									</div>
								</div>
								<?php
							}

							?>
							<!-- Form actions -->
							<div class="form-group">
								<div class="col-md-12 widget-right">
									<button  type="submit" name="editcategories" class="btn btn-danger btn-md pull-right">Sửa sản phẩm</button>
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
