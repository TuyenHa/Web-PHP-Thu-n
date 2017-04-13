
<div class="cart">
	<i class="fa fa-cart-plus fa-2x" aria-hidden="true"></i> <b>Giỏ Hàng Của Bạn</b>
	<p>Bạn có <span><?php 
		if(isset($_SESSION['cart'])){
			echo count($_SESSION['cart']);
		}else{
			echo 0;
		}
		?></span> sản phẩm trong giỏ hàng</p>
		<a href="index.php?name=cart" title="">Chi tiết giỏ hàng</a>
	</div>