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

$sql="select * from taikhoan ORDER BY id_tai_khoan DESC limit $index_result,$max_result";
$query=mysql_query($sql);
?>
<div class="row">
	<ol class="breadcrumb">
		<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li><a href="index.php?content=users">Tài Khoản</a></li>
	</ol>
</div><!--/.row-->

<div class="panel panel-default panel-table">
	<form method="post" >
		<div class="panel-heading">
			<div class="row">
				<div class="col col-xs-6">
					<h3 class="panel-title">Quản Lý Tài Khoản</h3>
				</div>
				<div class="col col-xs-6 text-right">
					<button type="submit" class="btn btn-sm btn-danger btn-create"><a href="index.php?content=adduser" style="color:#fff;text-decoration: none;" title="">Thêm tài khoản</a></button>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-bordered  table-responsive table-hover">
				<thead>
					<tr>
						<th><em class="fa fa-cog"></em></th>
						<th>Tài khoản</th>
						<th>Email</th>
						<th>Giới tính</th>
						<th>Ngày sinh</th>
						<th>Quê quán</th>
						<th>Địa chỉ</th>
						<th>Sdt</th>
						<th>Quyền</th>
					</tr> 
				</thead>
				<tbody>
					<?php
					while ($row=mysql_fetch_array($query)) {
						?>
							<tr>
								<td align="center">
									<a href="index.php?content=edituser&id=<?php echo $row[0]?>" title="Sửa danh mục"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
									 <a href="include/deleteuser.php?id=<?php echo  $row[0];?>"  onclick="return confirm('Bạn có chắc chắn muốn xóa?')" title="Xóa danh mục"><em class="fa fa-trash-o fa-2x"></em></a>
								</td>
								<td><?php echo $row['tai_khoan'] ?></td>
								<td><?php echo $row['email'] ?></td>
								<td><?php echo $row['gioi_tinh'] ?></td>
								<td><?php if(isset($row['ngay_sinh'])){ $oriDate=$row['ngay_sinh']; $newDate=date('d-m-Y H:i',strtotime($oriDate)); echo $newDate;}else{ echo "";} ?></td>
								<td><?php echo $row['que_quan'] ?></td>
								<td><?php echo $row['dia_chi'] ?></td>
								<td><?php echo $row['sdt'] ?></td>
								<td><?php echo $row['phan_quyen'] ?></td>
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
					$truyVan="SELECT * from taikhoan";
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
							$list_page.="<li><a href=".$_SERVER["PHP_SELF"]."?content=users&page=$prea>Previous</a></li>";
						}
						for ($i=1; $i <=$total_page ; $i++) { 
							if($page==$i){
								$list_page.="<li><a href=".$_SERVER["PHP_SELF"]."?content=users&page=$i><b>$i</b></a></li>";
							}else{
								$list_page .="<li><a href=".$_SERVER["PHP_SELF"]."?content=users&page=$i>".$i."</a></li>";
							}
						}
						$next=$page+1;
						if($page<$total_page)
						{
							$list_page.="<li><a href=".$_SERVER["PHP_SELF"]."?content=users&page=$next>Next</a></li>";

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
