<?php 
session_start();
ob_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Controll - Balo Shop</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/bootstrap-table.css" rel="stylesheet">
	<link href="css/table.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">
	<!--Icons-->
	<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="js/lumino.glyphs.js"></script>
	<script src="../ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="../ckfinder/ckfinder.js" type="text/javascript"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<?php 
	include('../config/connection.php');
	if(isset($_SESSION["taikhoan"]))
	{
		$tk=$_SESSION["taikhoan"];
		$sql="SELECT * FROM taikhoan Where tai_khoan='$tk' && phan_quyen='1'";
		$query=mysql_query($sql);
		$num=mysql_num_rows($query);
		if($num > 0){
			?>
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<?php
				include('include/header.php');
				?>
			</nav>
			<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
				<?php
				include('include/sidebar.php');
				?>

			</div><!--/.sidebar-->

			<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
				<?php 
				if(isset($_GET['content']))
				{
					$content=$_GET['content'];
					switch ($content) {
						case 'products':
						include('include/product.php');
						break;
						case 'categories':
						include('include/categories.php');
						break;
						case 'users':
						include('include/users.php');
						break;
						case 'comments':
						include('include/comments.php');
						break;
						case 'contacts':
						include('include/contacts.php');
						break;
						case 'addproduct':
						include('include/addproduct.php');
						break;
						case 'editproduct':
						include('include/edit.php');
						break;
						case 'addcategories':
						include('include/addcategories.php');
						break;
						case 'editcategories':
						include('include/editcategories.php');
						break;
						case 'adduser':
						include('include/adduser.php');
						break;
						case 'edituser':
						include('include/edituser.php');
						break;
					}
				}else{
					include('include/content.php');
				}

				?>
			</div>
		</script>
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/chart.min.js"></script>
		<script src="js/chart-data.js"></script>
		<script src="js/easypiechart.js"></script>
		<script src="js/easypiechart-data.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/bootstrap-table.js"></script>
		<script>
			$('#calendar').datepicker({
			});

			!function ($) {
				$(document).on("click","ul.nav li.parent > a > span.icon", function(){          
					$(this).find('em:first').toggleClass("glyphicon-minus");      
				}); 
				$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
			}(window.jQuery);

			$(window).on('resize', function () {
				if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
			})
			$(window).on('resize', function () {
				if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
			})
			function changeImg(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		    	var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
			$('#avatar').click(function(){
				$('#img').click();
			});
		});

	</script>	
	<?php
}else{
	?>
	<div class="alert alert-info alert1" style="text-align: center;">
		<strong style="color:red;">Cảnh Báo !</strong></br> Nếu bạn không có quyền truy cập trang này.Xin ấn <a href="../index.php" target="_blank" style="color: red;">vào đây</a> để trở về trang chủ !</br> Chỗ này không phải chỗ chơi.>_<
	</div>
	<script type="text/javascript">
		var count = 10;
		var redirect = "http://localhost/webbalo";
		function countDown(){
			var timer = document.getElementById("timer");
			if(count > 0){
				count--;
				timer.innerHTML = "Sẽ tự động chuyển về trang chủ sau  <b>"+count+"</b> giây.";
				setTimeout("countDown()", 1000);
			}else{
				window.location.href = redirect;
			}
		}
	</script>
	<style>
		.wrap {
			width: 600px;
			margin: 250px auto;
			padding: 20px;
			border-radius: 10px;
			border: 1px solid #ddd;
			font-size: 20px;
			line-height: 1.3em;
			text-align: center;
		}
	</style>
	<div class="wrap">
		<p id="timer"><script type="text/javascript">countDown();</script></p>
	</div>
	<?php
}
}
?>
</body>

</html>
