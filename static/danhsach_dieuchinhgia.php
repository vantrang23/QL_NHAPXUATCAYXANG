<?php
session_start();
?>
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

	<title>DANH SACH DIEU CHINH GIA</title>

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
<?php
	include 'connect.php';
	$sql_capnhatbg = "SELECT NL.TEN_NHIENLIEU, NL.LOAI_NHIENLIEU, DATE_FORMAT(BG.NGAY_CN, '%d-%m-%Y %H:%i:%s') as NGAY_CN,BG.GIA FROM BANGGIA BG
	JOIN NHIENLIEU NL ON BG.ID_NHIENLIEU=NL.ID_NHIENLIEU  ORDER BY BG.NGAY_CN DESC";
	$result_capnhatbg=mysqli_query($conn, $sql_capnhatbg);
	mysqli_close($conn);

?>
<body>
	<div class="wrapper">
		<?php
			include "header.php";
		?>

		<div class="main">
		<?php
			include 'username.php';
			?>

			<main class="content">			
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3" style="font-weight: bold;">DANH SÁCH ĐIỀU CHỈNH GIÁ</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive ">
									<table id="dtBasicExample" class="table table-striped table-bordered table-sm" width="100%">
										<thead>
											<tr>
												<th class="th-sm">STT</th>
												<th class="th-sm">Tên nhiên liệu</th>
												<th class="th-sm">Loại nhiên liệu</th>
												<th class="th-sm">Đơn giá</th>
												<th class="th-sm">Ngày điều chỉnh</th>
											  </tr>
										</thead>
										<tbody>
										<?php
										if ($result_capnhatbg && mysqli_num_rows($result_capnhatbg) > 0) {
											$stt = 0;
											while ($row_cnbg = mysqli_fetch_assoc($result_capnhatbg)) {
												$stt++;
												$loai_nienlieu = ($row_cnbg['LOAI_NHIENLIEU'] == 1) ? 'Xăng' : 'Dầu';
												echo "<tr>
														<td>{$stt}</td>
														<td>{$row_cnbg['TEN_NHIENLIEU']}</td>
														<td>{$loai_nienlieu}</td>
														<td>{$row_cnbg['GIA']}</td>
														<td>{$row_cnbg['NGAY_CN']}</td>																																							
													</tr>";
											}
										} else {
											echo "<tr><td colspan='7'>Không có dữ liệu</td></tr>";
										}
										?>
											
										
										<tfoot>
											<tr>
												<th class="th-sm">STT</th>
												<th class="th-sm">Tên nhiên liệu</th>
												<th class="th-sm">Loại nhiên liệu</th>
												<th class="th-sm">Đơn giá</th>
												<th class="th-sm">Ngày điều chỉnh</th>
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