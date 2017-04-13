<?php
if (isset($_POST['sl'])) {
	# code...
	foreach ($_POST['sl'] as $id_san_pham => $sl) {
		# code...
		if($sl<=0){
			unset($_SESSION['cart'][$id_san_pham]);
			if(count($_SESSION['cart'])==0){
				unset($_SESSION['cart']);
			}
		}else{
			$_SESSION['cart'][$id_san_pham]=$sl;
		}
	}
}
if(isset($_SESSION['cart'])){
	$arrId=array();
	foreach ($_SESSION['cart'] as $id_san_pham => $sl) {
		# code...
		$arrId[]=$id_san_pham;

	}
	$strId=implode($arrId,',');
	$sql="SELECT * from sanpham where id_san_pham IN ($strId)";
	$query=mysql_query($sql);
	$totallPricesAll=0;
	?>
	<div class="col-md-12">
	<h2 style="color: red;font-size: 25px;border-bottom: 1px solid blue;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
			Giỏ Hàng Của Bạn</h2>
		<form  method="post" id="cart">
			<table class="table table-bordered table-responsive">
				<?php 
				while($row = mysql_fetch_array($query))
				{
					$totallPrices=$_SESSION['cart'][$row['id_san_pham']] * $row['gia'];
					?>
					<tbody>
						<tr>
							<td rowspan="5"><img src="img/products/<?php echo $row['anh_san_pham'];?>" width="180" height="200"></td>
						</tr>
						<tr >
							<td>Tên Sản Phẩm:</td><td><span><?php echo $row['ten_san_pham']; ?></span></td>
						</tr>
						<tr>
							<td>Giá:</td><td><span><?php echo $row['gia']; ?></span></td>
						</tr>
						<tr>
							<td>Số lượng:</td><td><input type="number" name="sl[<?php echo $row['id_san_pham']; ?>]" value="<?php echo $_SESSION['cart'][$row['id_san_pham']] ?>" placeholder=""><a href="include/deletecart.php?id=<?php echo $row['id_san_pham'];?>"> Xóa</a></td>
						</tr>
						<tr>
							<td>Tổng Tiền:</td><td><span><?php echo $totallPrices;?> VNĐ</span></td>
						</tr>
					</tbody>
					<?php

					$totallPricesAll+=$totallPrices;
				}
				?>
			</table>

			<p><span>Tổng giá trị giỏ hàng là : <?php echo $totallPricesAll;?>  VNĐ</span></p>
			<p><button type="submit" class="btn btn-danger ">CẬP NHẬT GIỎ HÀNG</button></p>
			<span><a href="include/deletecart.php" title="Xóa tất cả sản phẩm">Xóa tất cả sản phẩm</a></span>
				&diams;<span><a href="index.php?content=paycart" title="Dừng mua và Thanh toán">Dừng mua và Thanh toán</a></span></p>
			</form>
		</div>
		<?php
	}else{
		?>
		<div class="col-md-12">
		<h2 style="color: red;font-size: 25px;border-bottom: 1px solid blue;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
			Giỏ Hàng Của Bạn</h2>
			<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  Không có sản phẩm nào trong giỏ hàng.Xin vui lòng cập nhật thêm !
</div>
		</div>
		<?php
	}
	?>