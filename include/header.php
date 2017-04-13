<?php
session_start(); 
include ('config/connection.php');
$sql="select * from danhmuc";
$query=mysql_query($sql);
?>
<div id="header">
	<div id="header">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<a href="index.php" title=""><img src="img/logo/logo.png" class="img-responsive" alt=""></a>
				</div><!-- /end logo -->
				<div class="col-md-6">
					<form method="post" action="index.php?content=search">
						<div class="search">
							<div class="input-group">
								<span class="input-group-addon" id="sizing-addon1"><i class="fa fa-bullhorn" aria-hidden="true"></i>
								</span>

								<input type="text" class="form-control" name="timkiem" required="" placeholder="Tìm kiếm theo sản phẩm ...">
								<span class="input-group-btn">
									<button type="submit" name="submit" id="btn-search" class="btn btn-danger"><i class="fa fa-search" aria-hidden="true"></i>
									</button>
								</span>
							</div><!-- /input-group -->
						</div>
					</form>

				</div><!-- /end search -->
				<div class="col-md-3">
					<div class="cart-suicide">
						<div class="cart">
							<i class="fa fa-cart-plus fa-1x" aria-hidden="true"></i><span class="badge" style="color: #fff;background: red">
							<?php 
							if(isset($_SESSION['cart'])){
								echo count($_SESSION['cart']);
							}else{
								echo 0;
							}
							?>
						</span><a href="index.php?content=cartinfo" title="Giỏ Hàng">Giỏ Hàng</a>
					</div>
					<div class="suicide">
						<div class="info-phone">
							<i class="fa fa-phone fa-2x" aria-hidden="true"></i><span>Tư vấn free</span>
							<p>1800 6969</p>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /row -->
	</div>
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="" class="navbar-brand">DANH MỤC SẢN PHẨM</a>
			</div>
			<div class="navbar-collapse collapse" id="menu">
				<ul class="nav navbar-nav" >
					<li><a href="">Trang chủ</a></li>
					<li><a href="">Giới thiệu</a></li>
					<li><a href="index.php?content=contacts">Liên hệ</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php 
					if(isset($_SESSION['taikhoan']))
					{
						$tk=$_SESSION["taikhoan"];
						$sql1="SELECT * FROM taikhoan Where tai_khoan='$tk' && phan_quyen='1'";
						$query1=mysql_query($sql1);
						$num1=mysql_num_rows($query1);
						?>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">Xin Chào : <?php echo $_SESSION['taikhoan']; ?>
								<span class="caret"></span></a>
								<ul class="dropdown-menu">

									<li><a href="index.php?content=accountinfo">Thông tin</a></li>
									<?php 
									if($num1>0){
										?>									<li><a href="admincp/index.php">Trang quản trị</a></li>
										<?php
									}
									?>
									<li><a href="index.php?content=changepass">Đổi mật khẩu</a></li>
									<div class="divider"></div>
									<li><a href="include/logout.php">Thoát</a></li>
								</ul>
							</li>
							<?php
						}else{
							?>
							<li><a href="index.php?content=login" title=""><span class="glyphicon glyphicon-user"></span> Đăng Nhập</a></li>
							<li><a href="index.php?content=registers" title=""><span class="glyphicon glyphicon-log-in"></span> Đăng Kí</a></li>
							<?php
						}
						?>				
					</ul>
				</div>

			</nav><!-- /nav -->

		</div>
	</div>
</div>
<div id="list-category">
	<div id="list-category">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-xs-12 col-sm-4">
					<div class="list-group">
						<?php 
						while($row=mysql_fetch_array($query)){
							?>
							<a href="index.php?content=categories&id=<?php echo $row['id_danh_muc'] ?>" title="" class="list-group-item"><?php echo $row['ten_danh_muc'];?></a>
							<?php
						}
						?>

					</div>
				</div><!-- /col-md-3 -->
				<div class="col-md-6 col-sm-5 hidden-sm visible-lg visible-md">
					<div class="slide">
						<!-- Start WOWSlider.com BODY section -->
						<div id="wowslider-container1">
							<div class="ws_images"><ul>
								<li><img src="img/slide/21.jpg" alt="1" title="1" id="wows1_0"/></li>
								<li><img src="img/slide/22.jpg" alt="2" title="2" id="wows1_1"/></li>
								<li><img src="img/slide/23.jpg" alt="3" title="3" id="wows1_2"/></li>
								<li><img src="img/slide/24.jpg" alt="4" title="4" id="wows1_3"/></li>
								<li><img src="img/slide/25.jpg" alt="5" title="5" id="wows1_4"/></li>
								<li><a href="http://wowslider.com/vi"><img src="img/slide/22.jpg" alt="bootstrap slider" title="6" id="wows1_5"/></a></li>
								<li><img src="img/slide/21.jpg" alt="7" title="7" id="wows1_6"/></li>
							</ul></div>
							<div class="ws_bullets"><div>
								
							</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com/vi">css slider</a> by WOWSlider.com v8.7</div>
							<div class="ws_shadow"></div>
						</div>	
						<!-- End WOWSlider.com BODY section -->
					</div>
				</div>
				<div class="col-md-3 col-sm-3 visible-lg visible-md">
					<div class="helper">
						<h2>Hỗ Trợ Trực Tuyến</h2>
						<ul>
							<li class="list-group-item"><div class="avatar-hotrokt">
								<img src="img/icon/images.jpg" class="img-responsive img-rounded" alt="">
							</div>
							<div class="info-hotrokt">
								<p>Hỗ Trợ Kĩ Thuật</p>
								<p class="phone">Call: 19009119</p>
								<p><img class="img-responsive" src="img/icon/skype-icon.png" alt=""></p>
							</div>
						</li>
						<li class="list-group-item"><div class="avatar-hotrokt">
							<img src="img/icon/images.jpg" class="img-responsive img-rounded" alt="">
						</div>
						<div class="info-hotrokt">
							<p>Hỗ Trợ Bán Hàng</p>
							<p class="phone">Call: 19009119</p>
							<p><img class="img-responsive" src="img/icon/skype-icon.png" alt=""></p>
						</div>
					</li>
					<li class="list-group-item"><div class="avatar-hotrokt">
						<img src="img/icon/images.jpg" class="img-responsive img-rounded" alt="">
					</div>
					<div class="info-hotrokt">
						<p>Hỗ Trợ Chuyển Hàng</p>
						<p class="phone">Call: 19009119</p>
						<p><img class="img-responsive" src="img/icon/skype-icon.png" alt=""></p>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
</div>
<?