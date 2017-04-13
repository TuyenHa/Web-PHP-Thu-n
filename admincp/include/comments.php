<?php 
require('../config/connection.php');
if(isset($_GET['page'])){
	$page=$_GET['page'];
}else{
	$page=1;
}
//san pham hiển thị tối đa trên 1 trang
$max_result=5;
//thuạt toan
$index_result=$page*$max_result-$max_result;

$sql="select * from binhluan ORDER BY id_binh_luan DESC limit $index_result,$max_result";
$query=mysql_query($sql);
?>
<div class="row">
	<ol class="breadcrumb">
		<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li><a href="index.php?content=comments">Bình Luận</a></li>
	</ol>
</div><!--/.row-->

<div class="panel panel-default panel-table">
	<form method="post" >
		<div class="panel-heading">
			<div class="row">
				<div class="col col-xs-6">
					<h3 class="panel-title">Quản Lý Bình Luận</h3>
				</div>
				<div class="col col-xs-6 text-right">
					
				</div>
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-bordered  table-responsive table-hover">
				<thead>
					<tr>
						<th><em class="fa fa-cog"></em></th>
						<th>Họ Tên</th>
						<th>ID Sản Phẩm</th>
						<th>Email</th>
						<th>Nội Dung </th>
						<th>Ngày Binh Luận</th>
					</tr> 
				</thead>
				<tbody>
					<?php

					while ($row=mysql_fetch_array($query)) {
						?>
							<tr>
								<td align="center">
									<!-- <a href="index.php?content=editcomments&id=<?php echo $row['id_binh_luan']?>" title="Sửa danh mục"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a> -->
									 <a href="include/deletecomments.php?id=<?php echo  $row[0];?>"  onclick="return confirm('Bạn có chắc chắn muốn xóa?')" title="Xóa danh mục"><em class="fa fa-trash-o fa-2x"></em></a>
								</td>
								<td><?php echo $row['ho_ten'] ?></td>
								<td><?php echo $row['id_san_pham'] ?></td>
								<td><?php echo $row['email'] ?></td>
								<td><?php echo $row['noi_dung'] ?></td>
								<td><?php if(isset($row['ngay_binh_luan'])){ $oriDate=$row['ngay_binh_luan']; $newDate=date('d-m-Y',strtotime($oriDate)); echo $newDate;}else{ echo "";} ?></td>
							</tr>

						<?php
	
					}
					?>
				</tbody>
			</table>
		</div>
		<div class="panel-footer">
			<div class="row">
				<div class="col col-xs-4">

				</div>
				<div class="col col-xs-8">
					<?php 
					$truyVan="SELECT * from binhluan";
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
							$list_page.="<li><a href=".$_SERVER["PHP_SELF"]."?content=comments&page=$prea>Previous</a></li>";
						}
						for ($i=1; $i <=$total_page ; $i++) { 
							if($page==$i){
								$list_page.="<li><a href=".$_SERVER["PHP_SELF"]."?content=comments&page=$i><b>$i</b></a></li>";
							}else{
								$list_page .="<li><a href=".$_SERVER["PHP_SELF"]."?content=comments&page=$i>".$i."</a></li>";
							}
						}
						$next=$page+1;
						if($page<$total_page)
						{
							$list_page.="<li><a href=".$_SERVER["PHP_SELF"]."?content=comments&page=$next>Next</a></li>";

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
