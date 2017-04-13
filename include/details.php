<?php 
include('config/connection.php');
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="select * from sanpham where id_San_pham='$id'";
	$query=mysql_query($sql);
}
?>
<div id="result">
	<div class="viewproduct">
		<h2 class="titleh2"><i class="fa fa-laptop" aria-hidden="true"></i>
			Thông tin sản phẩm</h2>
			<div class="row">
				<?php 
				while ($row=mysql_fetch_array($query)) {

					?>
					<div class="col-md-4">
						<img class="img-rounded img-responsive" src="img/products/<?php echo $row['anh_san_pham']; ?>"  data-zoom-image="img/product/1.jpg" id="zoom_01" width="240" height="200" alt="">
					</div>
					<div class="col-md-8">
						<h3 class="title"><?php echo $row['ten_san_pham']; ?></h3>
						<p class="start"><i class="fa fa-star-half-o" aria-hidden="true"></i>
							<i class="fa fa-star-half-o" aria-hidden="true"></i>
							<i class="fa fa-star-half-o" aria-hidden="true"></i>
							<i class="fa fa-star-half-o" aria-hidden="true"></i>
						</p>
						<p class="pricess">Giá : <?php echo $row['gia']; ?> VND</p>
						<a href="include/addcart.php?id=<?php echo $row['id_san_pham']?>" title=""><button type="button" class="btn btn-info btn-buy"><i class="fa fa-cart-plus" aria-hidden="true"></i>
							Mua Hàng</button></a>
							<div class="khuyenmai_muahang">
								<h2><i class="fa fa-angellist" aria-hidden="true"></i>
									Thông tin sản phẩm</h2>
									<p class="bg-info"><?php echo $row['mo_ta']; ?>
									</p>
								</div>
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Khuyến Mãi</a></li>
									
								</ul>

								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="home"><?php echo $row['khuyen_mai']; ?></div>
									<div role="tabpanel" class="tab-pane" id="profile">...</div>
									<div role="tabpanel" class="tab-pane" id="messages">...</div>
									<div role="tabpanel" class="tab-pane" id="settings">...</div>
								</div>
								<div>



								</div>
							</div>
						</div>
						<?php
					} 

					?>
				</div>
			</div>
			<div class="col-md-12">
				<?php include('include/comment.php'); ?>
			</div>