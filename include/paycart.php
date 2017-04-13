<?php 
include('config/connection.php');
$arrId=array();
foreach ($_SESSION['cart'] as $id_san_pham => $sl) {
	# code...
	$arrId[]=$id_san_pham;
}
$strId=implode($arrId,',');
$sql="SELECT * from sanpham where id_san_pham IN($strId)";
$query=mysql_query($sql);
$totallPricesAll=0;
?>
<div class="col-md-12">
	<h2 style="color: red;font-size: 25px;border-bottom: 1px solid blue;"><i class="fa fa-cc-paypal" aria-hidden="true"></i> Xác Nhận Hóa Đơn Thanh Toán</h2>
	<p style="color: blue; text-align: center;">Trước khi thực hiện việc đặt hàng.Hãy đảm bảo máy tính của bạn kết nối internet</p>
	<form  method="post" >
		<table class="table table-bordered table-responsive">
			
			<thead>

				<tr><th>Tên Sản Phẩm</th>
					<th>Giá</th>
					<th>Số Lượng</th>
					<th>Thành tiền</th>
				</tr>
			</thead>
			<tbody>
				<?php 

				while ($row=mysql_fetch_array($query)) {
					?>
					<tr >
						<td><?php echo $row['ten_san_pham']; ?></td><td><?php echo $row['gia']; ?></td><td><?php echo $_SESSION['cart'][$row['id_san_pham']]; ?></td><td><?php ECHO $_SESSION['cart'][$row['id_san_pham']]*$row['gia']; ?> VNĐ</td>
					</tr>
					<?php
					$totallPricesAll +=$_SESSION['cart'][$row['id_san_pham']]*$row['gia'];
				}
				?>
				<tr><td colspan="3" style="text-align: center;">Tổng giá trị hóa đơn là:</td><td><?php echo $totallPricesAll  ?> VNĐ</td></tr>
			</tbody>
		</table>
		<table class="table table-bordered table-responsive">
			<tbody>
				<tr>
					<td width="160">Tên khách hàng : </td> <td><input type="text" class="form-control" required="" name="hoten" <?php 
					if(isset($_SESSION["tai_khoan"])){
						?> value="<?php echo $_SESSION["tai_khoan"];?>" <?php
					}else{
						?> value="" <?php

					}

					?> placeholder="Nhập họ tên" required></td>
				</tr>
				<tr>
					<td>Địa chỉ Email: <td><input type="gmail" class="form-control" name="email" value="" required="" placeholder="Nhập địa chỉ email" required></td>
				</tr>
				<tr>
					<td>Số điện thoại : <td><input type="text" class="form-control" name="sdt" value="" required="" placeholder="Nhập số điện thoại" required></td>
				</tr>
				<tr>
					<td>Địa chỉ : <td><input type="text" class="form-control" name="diachi" value="" required="" placeholder="Nhập địa chỉ" required></td>
				</tr>
				<tr>
					<td>Giao dịch : <td><input type="radio" name="radio" value="Giao hàng tận nơi">Giao hàng tận nơi <input type="radio" name="radio" value="Nhận hàng tại Shop">Nhận hàng tại Shop</td>
				</tr>
				<tr><td></td><td><button type="submit" name="ok" class="btn btn-success">Đặt hàng</button></td>
				</tr>
			</tbody>
		</table>
	</div>
	<?php
	if(isset($_POST['ok'])){
		if(isset($_POST['hoten'])){
			$hoten=$_POST['hoten'];
		}else{
			$hoten=$_SESSION['tai_khoan'];
		}
		$email = $_POST['email'];
		$sdt=$_POST['sdt'];
		$diachi = $_POST['diachi'];
		$giaodich = $_POST['radio'];
		
		if(isset($_SESSION['cart'])){
			$arrId = array();
			foreach($_SESSION['cart'] as $id_san_pham=>$sl){
				$arrId[] = $id_san_pham;
			}
			$strId = implode(', ', $arrId);
			$sqlcart = "SELECT * FROM sanpham WHERE id_san_pham IN($strId) ORDER BY id_san_pham
			DESC";
			$querycart = mysql_query($sqlcart);
		}
		$strBody = '';
    // Thông tin Khách hàng
		$strBody = '<p>
		<b>Khách hàng:</b> '.$hoten.'<br />
		<b>Email:</b> '.$email.'<br />
		<b>Điện thoại:</b> '.$sdt.'<br />
		<b>Địa chỉ:</b> '.$diachi.'<br/>
		<b>Giao dịch</b>'.$giaodich.'
	</p>';
    // Danh sách Sản phẩm đã mua
	$strBody .= ' <table border="1px" cellpadding="10px" cellspacing="1px"
	width="100%">
	<tr>
		<td align="center" bgcolor="#3F3F3F" colspan="4"><font
			color="white"><b>XÁC NHẬN HÓA ĐƠN THANH TOÁN</b></font></td>
		</tr>
		<tr id="invoice-bar">
			<td width="45%"><b>Tên Sản phẩm</b></td>
			<td width="20%"><b>Giá</b></td>
			<td width="15%"><b>Số lượng</b></td>
			<td width="20%"><b>Thành tiền</b></td>
		</tr>';
		$totalPriceAll = 0;
		while($rows = mysql_fetch_array($querycart)){
			$totalPrice = $rows['gia']*$_SESSION['cart'][$rows['id_san_pham']];
			$strBody .= '<tr>
			<td class="prd-name">'.$rows['ten_san_pham'].'</td>
			<td class="prd-price"><font color="#C40000">'.$rows['gia'].'
				VNĐ</font></td>
				<td class="prd-number">'.$_SESSION['cart'][$rows['id_san_pham']].'</td>
				<td class="prd-total"><font color="#C40000">'.$totalPrice.'
					VNĐ</font></td>
				</tr>';
				$totalPriceAll += $totalPrice;
			}
			$strBody .= '<tr>
			<td class="prd-name">Tổng giá trị hóa đơn là:</td>
			<td colspan="2"></td>
			<td class="prd-total"><b><font color="#C40000">'.$totalPriceAll.'
				VNĐ</font></b></td>
			</tr>
		</table>';
		$strBody .= '<p align="justify">
		<b>Quý khách đã đặt hàng thành công!</b><br />
		• Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần
		Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br
		/>
		• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước
		khi giao hàng 24 tiếng.<br />
		<b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Shop chúng
			Tôi!</b>
		</p>';
    // Thiết lập cấu hình PHP mailer để gửi Email
    // Thiết lập SMTP Server
    require("class.phpmailer.php"); // nạp thư viện
    $mailer = new PHPMailer(); // khởi tạo đối tượng
    $mailer->IsSMTP(); // gọi class smtp để đăng nhập
    $mailer->CharSet="utf-8"; // bảng mã unicode
    //Đăng nhập Gmail
    $mailer->SMTPAuth = true; // Đăng nhập
    $mailer->SMTPSecure = "ssl"; // Giao thức SSL
    $mailer->Host = "smtp.gmail.com"; // SMTP của GMAIL
    $mailer->Port = 465; // cổng SMTP
    // Phải chỉnh sửa lại
    $mailer->Username = "yeuthuongngaynao@gmail.com"; // GMAIL username
    $mailer->Password = "toikohieu"; // GMAIL password
    $mailer->AddAddress($email, $hoten); //email người nhận
    $mailer->AddCC("svtinhoc123@gmail.com", "Admin Balo Shop"); // gửi thêm một email cho Admin
    // Chuẩn bị gửi thư nào
    $mailer->FromName = 'Balo Shop'; // tên người gửi
    $mailer->From = 'yeuthuongngaynao@gmail.com'; // mail người gửi
    $mailer->Subject = 'Hóa đơn xác nhận mua hàng từ Balo Shop';
    $mailer->IsHTML(TRUE); //Bật HTML không thích thì false
    // Nội dung lá thư
    $mailer->Body = $strBody;
    // Gửi email
    if(!$mailer->Send()){
    // Gửi không được, đưa ra thông báo lỗi
    	echo "Lỗi gửi Email: " . $mailer->ErrorInfo;
    }
    else{
    // Gửi thành công
    	echo '<div class="alert alert-success alert-dismissible" role="alert">
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    	<p style="color:red;text-align:center;">Đặt hàng thành công ! .Bạn hãy kiểm tra email của mình để nhận được thông tin thanh toán.</p>
    </div>
    ';
}
}
?>