<?php 
include('config/connection.php');
if(isset($_SESSION['taikhoan']))
{
	$user=$_SESSION['taikhoan'];
	$sql="select * from taikhoan where tai_khoan='$user'";
	$query=mysql_query($sql);
}
?>

<div class="infouser">
	<h2 style="color: red;border-bottom: 1px solid blue;"><i class="fa fa-laptop" aria-hidden="true"></i>
		Thông tin tài khoản</h2>
		<table class="table table-hover table-bordered table-responsive">
			<thead>
				<tr>
					<th>Tài khoản</th><th>Email</th><th>Giới tính</th><th>Ngày sinh</th><th>Quê quán</th><th>Địa chỉ</th><th>Số điện thoại</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				while ($row=mysql_fetch_array($query)) {
					?>
					<tr>
						<td><?php echo $row['tai_khoan']; ?></td><td><?php echo $row['email']; ?></td><td><?php echo $row['gioi_tinh']; ?></td><td><?php if(isset($row['ngay_sinh'])){ $oriDate=$row['ngay_sinh']; $newDate=date('d-m-Y',strtotime($oriDate)); echo $newDate;}else{ echo "";} ?></td><td><?php echo $row['que_quan']; ?></td><td><?php echo $row['dia_chi']; ?></td><td><?php echo $row['sdt']; ?></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>