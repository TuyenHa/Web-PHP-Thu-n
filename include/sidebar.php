<div class="silebar">
	<h3> 
		<i class="fa fa-star-o fa-4x" aria-hidden="true"><img src="img/icon/gif-new.gif" alt=""></i>CAM KẾT VÀNG </h3>
		<ul>
			<li>
				<i class="fa fa-star fa-2x fa-spin" aria-hidden="true"></i>
				<span>Sản Phẩm Chính Hãng<span class="label label-danger" style="color: #fff;">Hot</span>
			</span>
		</li>
		<li><i class="fa fa-star fa-2x fa-spin" aria-hidden="true"></i><span>Bảo Hành Chính Hãng</span></li>
		<li><i class="fa fa-star fa-2x fa-spin" aria-hidden="true"></i><span>Tư Vấn Tin Cậy</span></li>
		<li><i class="fa fa-star fa-2x fa-spin" aria-hidden="true"></i><span>Giá Cả Cạnh Tranh</span></li>
		<li><i class="fa fa-star fa-2x fa-spin" aria-hidden="true"></i><span>Mua Sắm Dễ Dàng</span></li>
		<li><i class="fa fa-star fa-2x fa-spin" aria-hidden="true"></i><span>Phục Vụ Chu Đáo</span></li>
		<li><i class="fa fa-star fa-2x fa-spin" aria-hidden="true"></i><span>Dịch Vụ Hoàn Hảo</span></li>
	</ul>
	<?php 
	include('config/connection.php');
	
	$sql="select * from sanpham where dac_biet='1' ORDER BY RAND() LIMIT 1,5";
	$query=mysql_query($sql);

	?>
	<div class="product-hot">
		<h2><i class="fa fa-rocket fa-3x" aria-hidden="true"></i>
			Sản Phẩm Nổi Bật <img src="img/icon/ta2032.gif" alt=""></h2>
			<ul>
				<?php 
				while ($row=mysql_fetch_array($query)) {	
					?>
					<li><div class="img-product"><a href="index.php?content=details&id=<?php echo $row['id_san_pham']?>" title=""><img class="img-thumbnail img-responsive" src="img/products/<?php echo $row['anh_san_pham'] ?>" alt="" ></a></div><div class="info-product"><a href="index.php?content=details&id=<?php echo $row['id_san_pham']?>" title="<?php echo $row['ten_san_pham']?>"><?php echo $row['ten_san_pham'] ?></a></div><div class="bh-product"><a href="index.php?content=details&id=<?php echo $row['id_san_pham']?>" title=""><img src="img/icon/chingang.gif" alt="<?php echo $row['ten_san_pham']?>">Bảo hành <?php echo $row['bao_hanh'] ?></a></div></li>
					<?php
				}
				?>
			</ul>
		</div>
	</div> <!-- /silebar -->
</div>
