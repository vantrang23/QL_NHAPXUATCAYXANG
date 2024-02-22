
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>header</title>

	<link href="css/app.css" rel="stylesheet">
	<script  src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	
</head>

<nav id="sidebar" class="sidebar js-sidebar">
				<div class="sidebar-content js-simplebar">
					<a class="sidebar-brand" href="gioithieu.php">
			<span class="align-middle"><?php echo $_SESSION['ten_tram'];?></span>
			</a>

					<ul class="sidebar-nav">
						<li class="sidebar-item active">
							<a class="sidebar-link" href="index.php">
								<i class="fas fa-home"></i><span class="align-middle">HOME</span>
				</a>
						</li>
						<?php if( $_SESSION['quyen'] =="Quản lý")
						echo '<li class="sidebar-item">
							<a class="sidebar-link" href="taophieunhap.php">
								<i class="fas fa-sign-in-alt"></i><span class="align-middle">Nhập Nhiên Liệu</span>
							</a>
						</li>';
						?>

						<li class="sidebar-item">
							<a class="sidebar-link" href="xuatnhienlieu.php">
								 <i class="fas fa-sign-out-alt"></i> <span class="align-middle">Xuất Nhiên Liệu</span>
				</a>
						</li>
						<?php if( $_SESSION['quyen'] =="Quản lý")
						echo '
						<li class="sidebar-item">
							<a class="sidebar-link" href="dieuchinhgia.php">
								<i class="fas fa-pen-square"></i> <span class="align-middle">Điều Chỉnh Giá</span>
							</a>
						</li>';
						?>

						<li class="sidebar-header">
							DANH MỤC
						</li>

						<!-- <li class="sidebar-item">
							<a class="sidebar-link" href="#">
								<i class="fas fa-tint"></i> <span class="align-middle">Danh Sách Nhiên Liệu</span>
				</a>
						</li> -->
						<?php if( $_SESSION['quyen'] =="Quản lý")
						echo '
						<li class="sidebar-item">
							<a class="sidebar-link" href="danhsach_nhanvien.php">
								<i class="fas fa-users"></i> <span class="align-middle">Danh Sách Nhân Viên</span>
						</a>
						</li>';
						?>

						<li class="sidebar-item">
							<a class="sidebar-link" href="danhsach_nhacungcap.php">
								<i class="fas fa-handshake"></i> <span class="align-middle">Danh Sách Nhà Cung Cấp</span>
				</a>
						</li>

						<li class="sidebar-item">
							<a class="sidebar-link" href="danhsach_phieuxuat.php">
								<i class="fas fa-file-import"></i> <span class="align-middle">Danh Sách Phiếu Xuất</span>
				</a>
						</li>
						<?php if( $_SESSION['quyen'] =="Quản lý")
						echo '
						<li class="sidebar-item">
							<a class="sidebar-link" href="danhsach_phieunhap.php">
								<i class="fas fa-file-export"></i><span class="align-middle">Danh Sách Phiếu Nhập</span>
						</a>
						</li>'
						?>
						<li class="sidebar-item">
							<a class="sidebar-link" href="danhsach_dieuchinhgia.php">
								<i class="fas fa-money-check"></i> <span class="align-middle">Danh Sách Điều Chỉnh Giá</span>
				</a>
						</li>
						
					</ul>
		</nav>