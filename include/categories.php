
<?php 
include('config/connection.php');
if(isset($_GET['id'])){
	if(isset($_GET['page'])){
		$page=$_GET['page'];
	}else{
		$page=1;
	}
//san pham hiển thị tối đa trên 1 trang
	$max_result=6;
//thuạt toan
	$index_result=$page*$max_result-$max_result;
	$id=$_GET['id'];
	$sql="select * from sanpham where id_danh_muc='$id' limit $index_result,$max_result";
	$query=mysql_query($sql);
	$num=mysql_num_rows($query);
}
?>
<div class="content">
	<div class="box-title">
		<h2>Danh mục</h2>
		<?php 
		if($num>0){

			while ($row=mysql_fetch_array($query)) {
				?>
				<div class="box-product">
					<p><a href="index.php?content=details&id=<?php echo $row['id_san_pham']?>" title="<?php echo $row['ten_san_pham']; ?>"><?php echo $row['ten_san_pham']; ?></a></p>
					<a href="index.php?content=details&id=<?php echo $row['id_san_pham']?>" title=""><img src="img/products/<?php echo $row['anh_san_pham'] ?>" title="<?php echo $row['ten_san_pham']; ?>" width="200px" height="180px"></a>
					<p>Giá :<?php echo $row['gia'] ?> VNĐ</p>
					<p><span>Bảo hanh :<?php echo $row['bao_hanh'] ?></span></p>
					<div class="btn_purchase">
						<i class="fa fa-cart-plus" aria-hidden="true"></i><a href="" title="Mua Hàng">Mua Hàng</a>
					</div>
				</div>

				<?php
			}
		}else{
			?>
			<div class="alert alert-success" role="alert">Không có sản phẩm nào trong danh mục này.Bạn hãy thêm sản phẩm vào danh mục này</div>
			<?php
		}
		?>
	</div>
	<nav aria-label="...">
								<?php 
								$truyVan="select * from sanpham where id_danh_muc='$id'";
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
										$list_page.="<li><a href=".$_SERVER["PHP_SELF"]."?content=categories&id=$id&page=$prea>Previous</a></li>";
									}
									for ($i=1; $i <=$total_page ; $i++) { 
										if($page==$i){
											$list_page.="<li><a href=".$_SERVER["PHP_SELF"]."?content=categories&id=$id&page=$i><b>$i</b></a></li>";
										}else{
											$list_page .="<li><a href=".$_SERVER["PHP_SELF"]."?content=categories&id=$id&page=$i>".$i."</a></li>";
										}
									}
									$next=$page+1;
									if($page<$total_page)
									{
										$list_page.="<li><a href=".$_SERVER["PHP_SELF"]."?content=categories&id=$id&page=$next>Next</a></li>";

									}

									echo $list_page;
									?>
								</ul>
							</nav>
</div><!-- /content -->

