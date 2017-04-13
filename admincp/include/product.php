<?php 
require('../config/connection.php');
if(isset($_GET['page'])){
	$page=$_GET['page'];
}else{
	$page=1;
}
//san pham hiển thị tối đa trên 1 trang
$max_result=9;
//thuạt toan
$index_result=$page*$max_result-$max_result;

$sql="select * from sanpham ORDER BY id_san_pham DESC limit $index_result,$max_result";
$query=mysql_query($sql);
?>
<div class="row">
	<ol class="breadcrumb">
		<li><a href="{{asset('admincp/index')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li><a href="index.php?content=products">Sản phẩm</a></li>
	</ol>
</div><!--/.row-->

<div class="panel panel-default panel-table">
	<form method="post" >
		<div class="panel-heading">
			<div class="row">
				<div class="col col-xs-6">
					<h3 class="panel-title">Quản Lý Sản Phẩm</h3>
				</div>
				<div class="col col-xs-6 text-right">
					<button type="submit" class="btn btn-sm btn-danger btn-create"><a href="index.php?content=addproduct" style="color:#fff;text-decoration: none;" title="">Thêm Sản Phẩm</a></button>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-bordered  table-responsive table-hover">
				<thead>
					<tr>
						<th><em class="fa fa-cog"></em></th>
						<th>Sản phẩm</th>
						<th>Giá</th>
						<th>Hình ảnh</th>
						<th>Bảo Hành</th>
						<th>Khuyến Mãi</th>
						<th>Trạng thái</th>
						<th>Đặc biệt</th>
					</tr> 
				</thead>
				<tbody>
					<?php
					while ($row=mysql_fetch_array($query)) {
						?>
						<tr>
							<td align="center">
								<a href="index.php?content=editproduct&id=<?php echo $row[0]?>" title="Sửa danh mục"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
								<a href="include/deleteproduct.php?id=<?php echo  $row[0];?>"  onclick="return confirm('Bạn có chắc chắn muốn xóa?')" title="Xóa danh mục"><em class="fa fa-trash-o fa-2x"></em></a>
							</td>
							<td><?php echo $row['ten_san_pham'] ?></td>
							<td><?php echo $row['gia'] ?></td>
							<td><img width="100" height="50" src="../img/products/<?php echo $row['anh_san_pham'] ?>"></td>
							<td><?php echo $row['bao_hanh'] ?></td>
							<td><?php echo $row['khuyen_mai'] ?></td>
							<td><?php echo $row['tinh_trang'] ?></td>
							<td><?php echo $row['dac_biet'] ?></td>

						</tr>

						<?php
					}
					?>
				</tbody>
			</table>
		</div>
		<p style="color:red;font-size: 16px;font-weight: bold;">Chú ý : 1- là Có  0 là Không</p>
		<div class="panel-footer">
			<div class="row">
			<div class="col col-xs-4">
				
			</div>
				<div class="col col-xs-8">
					<?php 
					$truyVan="SELECT * from sanpham";
					$thucthi=mysql_query($truyVan);
					$total_row= mysql_num_rows($thucthi);
					$total_page=ceil($total_row/$max_result);
					$list_page='';
					$prea=$page-1;
					?>
					<ul class="pagination hidden-xs pull-right">
						<?php
						if($page>1)
						{
							$list_page.="<li><a href=".$_SERVER["PHP_SELF"]."?content=products&page=$prea>Previous</a></li>";
						}
						for ($i=1; $i <=$total_page ; $i++) { 
							if($page==$i){
								$list_page.="<li><a href=".$_SERVER["PHP_SELF"]."?content=products&page=$i><b>$i</b></a></li>";
							}else{
								$list_page .="<li><a href=".$_SERVER["PHP_SELF"]."?content=products&page=$i>".$i."</a></li>";
							}
						}
						$next=$page+1;
						if($page<$total_page)
						{
							$list_page.="<li><a href=".$_SERVER["PHP_SELF"]."?content=products&page=$next>Next</a></li>";

						}
						
						echo $list_page;
						?>
					</ul>
				</div>
				
			</div>
			</div
			?>
		</form>
	</div>
