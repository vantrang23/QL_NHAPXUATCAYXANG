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

	<title>Danh sách nhà cung cấp</title>

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
// danh sach nha cung cap
 include 'connect.php';
 $sql_dsncc= "select * from NHACUNGCAP ncc";
 $result_dsncc= mysqli_query($conn, $sql_dsncc);

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
					<h1 class="h3 mb-3" style="font-weight: bold;">DANH SÁCH NHÀ CUNG CẤP</h1>

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
                                                <th class="th-sm">Mã Nhà Cung Cấp
                                                </th>
                                                <th class="th-sm">Tên Nhà Cung Cấp
                                                </th>
                                                <th class="th-sm">Địa Chỉ
                                                </th>
                                                <th class="th-sm">SDT
                                                </th>
                                                <th class="th-sm">Email
                                                </th>
                                                <th class="th-sm">Trạng Thái
                                                </th>
                                            
                                              </tr>
                                            </thead>
                                            <tbody>
											<?php
													// Check if there are results
													if ($result_dsncc && mysqli_num_rows($result_dsncc) > 0) {
														$stt=0;
														
														// Output data of each row
														while ($row = mysqli_fetch_assoc($result_dsncc)) {
															$stt++;
															$statusClass = ($row['TRANG_THAI'] == 1) ? 'active' : 'waiting';
															echo "<tr>				
																		<td>{$stt}</td>			
																		<td>{$row['ID_NCC']}</td>
																		<td>{$row['TEN_NCC']}</td>
																		<td>{$row['DIA_CHI']}</td>
																		<td>{$row['SDT']}</td>
																		<td>{$row['EMAIL']}</td>
																		<td class='{$statusClass}'>
															<div class='d-inline-flex align-items-center {$statusClass}'>
																<div class='circle'></div>
																<div class='ps-2'>" . (($row['TRANG_THAI'] == 1) ? 'Đang hợp tác' : 'Dừng hợp tác') . "</div>
															</div>
														</td>		
																	
																
																	</tr>";
														}
													} else {
														echo "<tr><td colspan='6'>Không có dữ liệu</td></tr>";
													}
													?>

                                              
                                              <!-- <tr>
                                                <td>1</td>
                                                <td>NCC1</td>
                                                <td>Nhà cung cấp 1</td>
                                                <td>Vĩnh Long</td>
                                                <td>0865551776</td>
                                                <td>ncc1@gmail.com</td>
                                                <td>Trạng Thái X</td>								
                                                						
                                              </tr> -->
                                          
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