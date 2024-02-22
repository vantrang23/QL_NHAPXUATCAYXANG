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

	<title>Thông tin trạm</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	<script  src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />



	
	<!-- table -->
	<!-- <script  src="https://ajax.googleapis.com/ajax/libs/jquery/4.5.7/jquery.min.js"></script>  -->


	<!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/rowreorder/1.4.1/js/dataTables.rowReorder.min.js"></script>

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<script src="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css"></script>
	<script src="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.bootstrap4.min.css"></script> -->


	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.jqueryui.min.css">

</head>

<body>
	<div class="wrapper">
	<?php
			include "header.php";
		?>
		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
				<i class="hamburger align-self-center"></i>
				</a>

					<div class="navbar-collapse collapse">
						<ul class="navbar-nav navbar-align">
							<li class="nav-item dropdown">
								<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
					<i class="align-middle" data-feather="settings"></i>
				</a>

								<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
					<img src="img/avatars/585e4bf3cb11b227491c339a.png" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark">User Name</span>
				</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a class="dropdown-item" href="logout.php"> <i class="fas fa-sign-out-alt"></i> Log out</a>
								</div>
							</li>
						</ul>
					</div>
			</nav>

			<main class="content">			
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3" style="font-weight: bold;">THÔNG TIN TRẠM XĂNG PHƯỜNG X</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive ">
                                        <h3>Tên trạm xăng: Trạm Xăng 1</h3>
                                        <h3>Địa chỉ: Phường X, Vĩnh Long</h3>
                                        <div>
                                            <h3 >Sản phẩm và dịch vụ:</h3>
                                            <ul>
                                                <li>Xăng RON 95-V</li>
                                                <li>Xăng RON 95-III</li>
                                                <li>Xăng E5 RON 92-II</li>
                                                <li>DO 0,001S-V</li> 
                                                <li>DO 0,05S-II</li>
                                                <li>Dầu hỏa 2-K</li>	
                                            </ul>
                                        </div>
                                        <div>
                                            <h3 >Giá cả:</h3>
                                            <table class="table table-striped table-bordered table-sm" cellspacing="0" width="350px" style="width: 350px;">
                                                <thead>
                                                  <tr>
                                                    <th class="th-sm">Số Thứ Tự
                                                    </th>
                                                    <th class="th-sm">Tên Loại Xăng
                                                    </th>
                                                    <th class="th-sm">Giá
                                                    </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>1</td>
                                                    <td>Xăng RON 95-V</td>
                                                    <td>23.504</td>							
                                                  </tr>
                                                  <tr>
                                                    <td>2</td>
                                                    <td>Xăng RON 95-III</td>
                                                    <td>23.504</td>							
                                                  </tr>
                                                  <tr>
                                                    <td>3</td>
                                                    <td>Xăng E5 Ron 92-II</td>
                                                    <td>23.504</td>							
                                                  </tr>
                                                  <tr>
                                                    <td>4</td>
                                                    <td>DO 0,001S-V</td>
                                                    <td>23.504</td>							
                                                  </tr>
                                                  <tr>
                                                    <td>5</td>
                                                    <td>DO 0,05S-II</td>
                                                    <td>23.504</td>							
                                                  </tr>
                                                  <tr>
                                                    <td>6</td>
                                                    <td>Dầu hỏa 2-K</td>
                                                    <td>23.504</td>							
                                                  </tr>
                                                </tbody>						
                                              </table>
                                        </div>
                                        <h3>Giờ hoạt động</h3>
                                        <p>Thứ 2 - Chủ nhật: 6:00 AM - 10:00 PM</p>

                                        <h3>Thông tin liên hệ</h3>
                                        <p>Điện thoại: +84 123 456 789</p>
                                        <p>Email: tramxang@gmail.com</p>
                                        <p>Website: <a href="#">www.tramxang.com.vn</a></p>
                                        
                                    </div>
								</div>
							</div>
						</div>
					</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="#" target="_blank"><strong>Gas Station DNT</strong></a> - <a class="text-muted" href="#" target="_blank"><strong>Duy - Ngân - Trang</strong></a>								&copy;
							</p>
						</div>
						
					</div>
				</div>
			</footer>
		</div>
	</div>
	

  
	<script src="js/app.js"></script>
	<script>

		$(document).ready(function () {
		$('#dtBasicExample').DataTable();
		$('.dataTables_length').addClass('bs-select');
		});

	
		
	</script>

	<style>
		.navbar-bg {
			background: #fff;
			margin-left: 10px;}	
	
		table.dataTable thead .sorting:after,
		table.dataTable thead .sorting:before,
		table.dataTable thead .sorting_asc:after,
		table.dataTable thead .sorting_asc:before,
		table.dataTable thead .sorting_asc_disabled:after,
		table.dataTable thead .sorting_asc_disabled:before,
		table.dataTable thead .sorting_desc:after,
		table.dataTable thead .sorting_desc:before,
		table.dataTable thead .sorting_desc_disabled:after,
		table.dataTable thead .sorting_desc_disabled:before {
			bottom: .5em;
		}
		div.dataTables_wrapper div.dataTables_filter {
   			 margin-bottom: 20px;
		}
		div.dataTables_wrapper table.dataTable thead th {
			border-top: 1px solid #ddd;
			border-bottom: 2px solid #ddd;
		}
		
		div.dataTables_wrapper div.dataTables_paginate {
			margin-top: 20px;
  		}
		  div.dataTables_wrapper div.dataTables_info {
			margin-top: 20px;
  		}
	
	</style>
</body>

</html>