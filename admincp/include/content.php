<?php 
include('../config/connection.php');
$sqlsp="select * from sanpham";
$querysp=mysql_query($sqlsp);
$numsp=mysql_num_rows($querysp);

$sqltk="select * from taikhoan";
$querytk=mysql_query($sqltk);
$numtk=mysql_num_rows($querytk);

$sqlbl="select * from binhluan";
$querybl=mysql_query($sqlbl);
$numbl=mysql_num_rows($querybl);

$sqldm="select * from danhmuc";
$querydm=mysql_query($sqldm);
$numdm=mysql_num_rows($querydm);

$sqllh="select * from lienhe";
$querylh=mysql_query($sqllh);
$numlh=mysql_num_rows($querylh);
?>
<div class="row">
	<ol class="breadcrumb">
		<li><a href=""><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">Trang chủ admin</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">SHOP BALO</h1>
	</div>
</div><!--/.row-->

<div class="row">
	<div class="col-xs-12 col-md-6 col-lg-3">
		<div class="panel panel-blue panel-widget ">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large"><?php 
						echo $numsp;
						?></div>
						<div class="text-muted">Sản Phẩm</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-orange panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large"><?php echo $numbl; ?></div>
						<div class="text-muted">Bình luận</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-teal panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large"><?php echo $numtk; ?></div>
						<div class="text-muted">Tài khoản</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-red panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large"><?php echo $numdm; ?></div>
						<div class="text-muted">Danh mục</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-teal panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large"><?php echo $numlh; ?></div>
						<div class="text-muted">Liên hệ</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-red">
				<div class="panel-heading dark-overlay"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>Calendar</div>
				<div class="panel-body">
					<div id="calendar"></div>
				</div>
			</div>
		</div>
	</div><!--/.row-->

	<div class="row">
		<div class="col-xs-6 col-md-3">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4>Sản phẩm</h4>
					<div class="easypiechart" id="easypiechart-blue" data-percent="92" ><span class="percent"><?php echo $numsp; ?></span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-md-3">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4>Bình luận</h4>
					<div class="easypiechart" id="easypiechart-orange" data-percent="65" ><span class="percent"><?php echo $numbl; ?></span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-md-3">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4>Tài khoản</h4>
					<div class="easypiechart" id="easypiechart-teal" data-percent="56" ><span class="percent"><?php echo $numtk; ?></span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-md-3">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4>Danh mục</h4>
					<div class="easypiechart" id="easypiechart-red" data-percent="27" ><span class="percent"><?php echo $numdm; ?></span>
					</div>
				</div>
			</div>
		</div>
		</div><!--/.row-->