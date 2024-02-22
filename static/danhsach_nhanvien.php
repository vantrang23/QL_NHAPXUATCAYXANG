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

	<title>Danh sách nhân viên</title>

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
 $sql_dsnhanvien= "SELECT ID_NV, ID_TK, CONCAT(HO_NV,' ',TEN_NV) as FULLNAME,CCCD,SDT,GIOI_TINH, DIA_CHI, DATE_FORMAT(NGAY_SINH, '%d-%m-%Y') as NGAY_SINH,VI_TRI,TRANG_THAI FROM NHANVIEN" ;
 $result_dsnhanvien = mysqli_query($conn, $sql_dsnhanvien);
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
					<h1 class="h3 mb-3" style="font-weight: bold;">DANH SÁCH NHÂN VIÊN</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive ">
                                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                            <thead>
                                              <tr>
                                                <th class="th-sm">Số Thứ Tự
                                                </th>
                                                <th class="th-sm">Mã Nhân Viên
                                                </th>
                                                <th class="th-sm">Mã Tài Khoản
                                                </th>
                                                <th class="th-sm">Họ Và Tên
                                                </th>
                                                <th class="th-sm">CCCD
                                                </th>
                                                <th class="th-sm">SDT
                                                </th>
                                                <th class="th-sm">Giới Tính
                                                </th>
                                                <th class="th-sm">Địa Chỉ
                                                </th>
                                                <th class="th-sm">Ngày Sinh
                                                </th>
                                                <th class="th-sm">Vị Trí
                                                </th>
                                                <th class="th-sm">Trạng Thái
                                                </th>    
                                              </tr>
                                            </thead>
                                            <tbody>
												<?php

													// Check if there are results
													if ($result_dsnhanvien && mysqli_num_rows($result_dsnhanvien) > 0) {
														// Output data of each row
														$stt=0;
														
														while ($row = mysqli_fetch_assoc($result_dsnhanvien)) {
															$stt++;
															$statusClass = ($row['TRANG_THAI'] == 1) ? 'active' : 'waiting';
															echo "<tr>
																	
																	<td>{$stt}</td>
																	<td>{$row['ID_NV']}</td>
																	<td>{$row['ID_TK']}</td>
																	<td>{$row['FULLNAME']}</td>
																	<td>{$row['CCCD']}</td>
																	<td>{$row['SDT']}</td>
																	<td>" . ($row['GIOI_TINH'] == 1 ? 'Nam' : 'Nữ') . "</td>    	
																	<td>{$row['DIA_CHI']}</td>
																	<td>{$row['NGAY_SINH']}</td>
																	<td>{$row['VI_TRI']}</td>	
																	<td class='{$statusClass}'>
															<div class='d-inline-flex align-items-center {$statusClass}'>
																<div class='circle'></div>
																<div class='ps-2'>" . (($row['TRANG_THAI'] == 1) ? 'Đang làm việc' : 'Đã nghỉ') . "</div>
															</div>
														</td>	
																	
																</tr>";
														}
													} else {
														echo "<tr><td colspan='11'>Không có dữ liệu</td></tr>";
													}
													?>
                                              <!-- <tr>
                                                <td>1</td>
                                                <td>NV1</td>
                                                <td>TK1</td>
                                                <td>Nguyễn Văn An</td>
                                                <td>123541236413</td>
                                                <td>0865551776</td>
                                                <td>Nam</td>
                                                <td>Phường X, Vĩnh Long</td>	
                                                <td>25/10/2023</td>
                                                <td>Bán hàng</td>
                                                <td>Trạng Thái X</td>								                                           					
                                              </tr>
                                                -->
                                              		  
                                            </tbody>						
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