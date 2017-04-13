<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Trang chủ shop balo cặp sách</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/product.css">
	<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="css/style-slide.css" />
	<!-- End WOWSlider.com HEAD section -->
	<script type="text/javascript" src="js/wowslider.js" ></script>
	<script type="text/javascript" src="js/script.js" ></script>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js" ></script>
	<script type="text/javascript" src="js/jquery.elevatezoom.js" ></script>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="css/bootstrap-theme.css" >
	<!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="ckfinder/ckfinder.js" type="text/javascript"></script>
	
</head>
<body>

	<div id="wapper">
		<?php include('include/header.php'); ?>
	</div>
	<div id="main">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<?php include('include/main.php'); ?>
				</div>
				<div class="col-md-3">
					<?php include('include/sidebar.php'); ?>
				</div>
			</div>
		</div>
	</div><!-- /main -->
	<div id="footer">
		<?php include('include/footer.php'); ?>
	</div>	

	<a class="btn-top" href="javascript:void(0);" title="Top" style="display: inline;"></a>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.box-product').hover(function(){
			$(this).css({"box-shadow": '0px 0px 10px black'});
		},function(){
			$(this).css({"box-shadow": '0px 0px 0px 0px #DDDDDD'});
		});
	});
	$(document).ready(function(){
		$('.img-product img').hover(function(){
			$(this).css({"box-shadow": '0px 0px 10px black'});
		},function(){
			$(this).css({"box-shadow": '0px 0px 0px 0px #DDDDDD'});
		});
	});
	$(document).ready(function(){
		$('.btn-top').hide();
		if($('.btn-top').length>0){
			$(window).scroll(function(){
				var e=$(window).scrollTop();
				if(e>1500){
					$('.btn-top').show();
				}else{
					$('.btn-top').hide();
				}
			});
			$('.btn-top').click(function(){
				$('body,html').animate({
					scrollTop:0
				})
			})
		}
	});
	$(document).ready(function(){
		if($('.popup').length>0){
			$(window).scroll(function(){
				var e=$(window).scrollTop();
				if(e>2000){
					$('.popup').css({'position':'fixed','top':'0'});
				}else{
					$('.popup').css({'position':'relative'});
				}
			});
		}
	});
</script>
</body>
</html>