
<?php
	session_start();
	include_once("connect.php");
	$sql_dspn="SELECT ID_PHIEUNHAP, NCC.TEN_NCC,CONCAT(HO_NV, ' ', TEN_NV) AS FULLNAME, DATE_FORMAT(PN.THOIGIAN_NHAP, '%d-%m-%Y %H:%i:%s') as THOIGIAN_NHAP,PN.TONG_TIEN,PN.TRANG_THAI FROM PHIEUNHAP PN
	JOIN NHACUNGCAP NCC ON PN.ID_NCC=NCC.ID_NCC
	JOIN NHANVIEN NV ON PN.ID_NV=NV.ID_NV  ORDER BY PN.THOIGIAN_NHAP DESC";
	$result_dspn=mysqli_query($conn,$sql_dspn);

	mysqli_close($conn);?>
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

	<title>Danh sách phiếu nhập</title>

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
	
<?php
	

?>

		<div class="main">
		<?php
			include 'username.php';
			?>

			<main class="content">			
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3" style="font-weight: bold;">DANH SÁCH PHIẾU NHẬP</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive ">
									<table id="dtBasicExample" class="table table-striped table-bordered table-sm" width="100%">
										<thead>
											<tr>
												<th class="th-sm">STT</th>
												<th class="th-sm">Mã phiếu nhập</th>
												<th class="th-sm">Nhà cung cấp</th>
												<th class="th-sm">Nhân viên</th>
												<th class="th-sm">Ngày nhập</th>
												<th class="th-sm">Tổng tiền</th>
												<th class="th-sm">Trạng thái</th>
												<th class="th-sm">Action</th>
											  </tr>
										</thead>

										<?php
										if ($result_dspn && mysqli_num_rows($result_dspn) > 0) {
											$stt = 0;
											while ($row_dspn = mysqli_fetch_assoc($result_dspn)) {
												$stt++;
												$statusClass = ($row_dspn['TRANG_THAI'] == 1) ? 'active' : 'waiting';
												echo "<tr>
														<td>{$stt}</td>
														<td>{$row_dspn['ID_PHIEUNHAP']}</td>
														<td>{$row_dspn['TEN_NCC']}</td>
														<td>{$row_dspn['FULLNAME']}</td>
														<td>{$row_dspn['THOIGIAN_NHAP']}</td>
														<td>{$row_dspn['TONG_TIEN']}</td>
													
														<td class='{$statusClass}'>
															<div class='d-inline-flex align-items-center {$statusClass}'>
																<div class='circle'></div>
																<div class='ps-2'>" . (($row_dspn['TRANG_THAI'] == 1) ? 'Đã nhập' : 'Chờ xử lý') . "</div>
															</div>
														</td>											
														<td> 
															<div class='btn-group ml-auto'>
															<a href='xoadspn.php?id_phieunhap={$row_dspn['ID_PHIEUNHAP']}' class='btn btn-sm btn-outline-dark'><i class='fas fa-trash-alt'></i></a>
																
															<a href='chitietphieunhap.php?id_phieunhap={$row_dspn['ID_PHIEUNHAP']}' class='btn btn-sm btn-outline-dark'><i class='fas fa-edit'></i></a>
															</div>
														</td>
													</tr>";
											}
										} else {
											echo "<tr><td colspan='7'>Không có dữ liệu</td></tr>";
										}
										?>
											

										</tbody>	

										
										<tfoot>
											<tr>
												<th class="th-sm">STT</th>
												<th class="th-sm">Mã phiếu nhập</th>
												<th class="th-sm">Nhà cung cấp</th>
												<th class="th-sm">Nhân viên</th>
												<th class="th-sm">Ngày nhập</th>
												<th class="th-sm">Tổng tiền</th>
												<th class="th-sm">Trạng thái</th>
												<th class="th-sm">Action</th>
											  </tr>
										</tfoot>
									  </table>
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
		.table tbody td .active,
 .table tbody td .waiting {
     background-color: #B9F6CA;
     color: #388E3C;
     font-weight: 600;
     padding: 1px 10px;
     border-radius: 15px;
     font-size: 0.9rem;
 }

 .table tbody td .waiting {
 background-color: #F5A89A;
     color: #DD0000;
 }

 .table tbody td .active .circle,
 .table tbody td .waiting .circle {
     width: 8px;
     height: 8px;
     border-radius: 50%;
     background-color: #388E3C;
 }

 .table tbody td .waiting .circle {
     background-color: #DD0000;
 }
	</style>	
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