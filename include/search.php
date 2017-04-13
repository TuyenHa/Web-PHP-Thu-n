<?php 
include('config/connection.php');
if(isset($_POST['timkiem'])){
	$timkiem=$_POST['timkiem'];
}else{
	$timkiem='';
}
if(isset($_GET['page'])){
	$page=$_GET['page'];
}else{
	$page=1;
}
//san pham hiển thị tối đa trên 1 trang
$max_result=9;
//thuạt toan
$index_result=$page*$max_result-$max_result;

$newTimKiem = str_replace(' ', '%', $timkiem);
$sql="SELECT * FROM sanpham Where ten_san_pham like '%$newTimKiem%' limit $index_result,$max_result";
$query=mysql_query($sql);
$num=mysql_num_rows($query);
if($num > 0 ){
	?>
	<div class="content">
		<div class="box-title">
			<h2>SP Tìm Kiếm</h2>
			<?php 
			while ($row=mysql_fetch_array($query)) {
				?>
				<div class="box-product">
					<p><a href="index.php?content=details&id=<?php echo $row['id_san_pham']?>" title=""><?php echo $row['ten_san_pham']; ?></a></p>
					<a href="index.php?content=details&id=<?php echo $row['id_san_pham']?>" title=""><img src="img/products/<?php echo $row['anh_san_pham'] ?>" title="<?php echo $row['ten_san_pham']; ?>" width="200px" height="180px"></a>
					<p>Giá :<?php echo $row['gia'] ?> VNĐ</p>
					<p><span>Bảo hành : <?php echo $row['bao_hanh']?></span></p>
					<div class="btn_purchase">
						<i class="fa fa-cart-plus" aria-hidden="true"></i><a href="include/addcart.php?id=<?php echo $row['id_san_pham']?>" title="Mua Hàng">Mua Hàng</a>
					</div>
				</div>
				<?php
			}
			?>
			<nav aria-label="...">
				<?php 
				$truyVan="SELECT * from sanpham Where ten_san_pham like '%$newTimKiem%'";
				$thucthi=mysql_query($truyVan);
				$total_row= mysql_num_rows($thucthi);
				$total_page=ceil($total_row/$max_result);
				$list_page='';
				$prea=$page-1;
				?>
				<ul class="pager">
					<?php
					if($page>1)
					{
						$list_page.="<li><a href=".$_SERVER["PHP_SELF"]."?content=search&page=$prea>Previous</a></li>";
					}
					for ($i=1; $i <=$total_page ; $i++) { 
						if($page==$i){
							$list_page.="<li><a href=".$_SERVER["PHP_SELF"]."?content=search&page=$i><b>$i</b></a></li>";
						}else{
							$list_page .="<li><a href=".$_SERVER["PHP_SELF"]."?content=search&page=$i>".$i."</a></li>";
						}
					}
					$next=$page+1;
					if($page<$total_page)
					{
						$list_page.="<li><a href=".$_SERVER["PHP_SELF"]."?content=search&page=$next>Next</a></li>";

					}

					echo $list_page;
					?>
				</ul>
			</nav>
		</div>
	</div>
	<?php
}else{
	echo '
	<div class="content">
		<div class="box-title">
			<h2>SP Tìm Kiếm</h2>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Không có sản phẩm nào được tìm thấy;
			</div>
		</div></div>';
	}
	?>