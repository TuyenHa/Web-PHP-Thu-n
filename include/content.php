					<?php 
					require('config/connection.php');
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
//san pham hiển thị tối đa trên 1 trang
					$max_result=9;
//thuạt toan
					$index_result=$page*$max_result-$max_result;

					$sql="select * from sanpham ORDER BY id_san_pham DESC  limit $index_result,$max_result";
					$query=mysql_query($sql);
					?>
					<div id="result">
						<div class="content">
							<div class="box-title">
								<h2>Sản Phẩm Mới</h2>
								<?php
								while ($row=mysql_fetch_array($query)) {
									?>
									<div class="box-product">
										<p><a href="index.php?content=details&id=<?php echo $row['id_san_pham']?>" title=""><?php echo $row['ten_san_pham'] ?></a></p>
										<a href="" title=""><img src="img/products/<?php echo $row['anh_san_pham'] ?>" title="" width="200px" height="180px"></a>
										<p>Giá :<?php echo $row['gia'] ?> VNĐ</p>
										<p><span>Bảo hành <?php echo $row['bao_hanh'] ?></span></p>
										<div class="btn_purchase">
											<i class="fa fa-cart-plus" aria-hidden="true"></i><a href="include/addcart.php?id=<?php echo $row['id_san_pham']?>" title="Mua Hàng">Mua Hàng</a>
										</div>
									</div>
									<?php
								}
								?>
							</div>
							<nav aria-label="...">
								<?php 
								$truyVan="SELECT * from sanpham";
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
										$list_page.="<li><a href=".$_SERVER["PHP_SELF"]."?page=$prea>Previous</a></li>";
									}
									for ($i=1; $i <=$total_page ; $i++) { 
										if($page==$i){
											$list_page.="<li><a href=".$_SERVER["PHP_SELF"]."?page=$i><b>$i</b></a></li>";
										}else{
											$list_page .="<li><a href=".$_SERVER["PHP_SELF"]."?page=$i>".$i."</a></li>";
										}
									}
									$next=$page+1;
									if($page<$total_page)
									{
										$list_page.="<li><a href=".$_SERVER["PHP_SELF"]."?page=$next>Next</a></li>";

									}

									echo $list_page;
									?>
								</ul>
							</nav>
						</div>
					</div>
