<div class="row">
	<ol class="breadcrumb">
		<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li><a href="index.php?content=categories">Danh mục</a></li>
		<li class="active">Thêm danh mục</li>
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
					if(isset($_POST['ok']))
					{
						$nameCate=$_POST['name'];
						$truyVan="select ten_danh_muc from danhmuc where ten_danh_muc='$nameCate'";
						$result=mysql_query($truyVan);
						$row=mysql_num_rows($result);
						if($row > 0){
							echo '<div class="alert bg-danger" role="alert">
							<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Danh Mục đã tồn tại <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
						</div>';
					}else{
						$sql="Insert into danhmuc(ten_danh_muc) values('$nameCate')";
						$query=mysql_query($sql);
						if($query){
							echo '<div class="alert bg-success" role="alert">
							<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Thêm thành công <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
						</div>';
					}else{
						echo '<div class="alert bg-danger" role="alert">
							<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Thêm không thành công <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
						</div>';
					}
				}
			}
			?>
			<form class="form-horizontal" method="post">
				<fieldset>
					<!-- Name input-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="name">Tên danh mục</label>
						<div class="col-md-6">
							<input id="name" name="name" minlength="3" type="text" placeholder="Nhập tên danh mục" required="" class="form-control">
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