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

	<title>Trang chủ</title>

	<link href="css/app.css" rel="stylesheet">
	<script  src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	
</head>
<?php
session_start();
include_once("connect.php");
 if (isset($_SESSION['username']) && $_SESSION['username']){
	 echo 'Bạn đã đăng nhập với tên là '.$_SESSION['username']."<br/>";
	
 }
 else{
	 echo 'Bạn chưa đăng nhập';
 }
 
 $id_tram=$_SESSION['id_tram'];

		// Include the database connection file
	
		// $sql = "SELECT n.TEN_NHIENLIEU, b.NGAY_CN, b.GIA
		// 		FROM BANGGIA b
		// 		INNER JOIN NHIENLIEU n ON b.ID_NHIENLIEU = n.ID_NHIENLIEU
		// 		ORDER BY n.TEN_NHIENLIEU, b.NGAY_CN";

		//BANGGIA XANG
		$sql_banggia_1 = "SELECT bg.ID_NHIENLIEU, TEN_NHIENLIEU, NGAY_CN, GIA, nl.LOAI_NHIENLIEU
        FROM BANGGIA bg
        JOIN NHIENLIEU nl ON bg.ID_NHIENLIEU = nl.ID_NHIENLIEU
        WHERE (bg.ID_NHIENLIEU, NGAY_CN) IN (
                SELECT ID_NHIENLIEU, MAX(NGAY_CN) AS max_ngay_cn
                FROM BANGGIA
                GROUP BY ID_NHIENLIEU)
        AND nl.LOAI_NHIENLIEU = 1";

		$result_banggia_1 = mysqli_query($conn, $sql_banggia_1);
		//BANGGIA DAU
		$sql_banggia_2 = "SELECT bg.ID_NHIENLIEU, TEN_NHIENLIEU, NGAY_CN, GIA, nl.LOAI_NHIENLIEU
        FROM BANGGIA bg
        JOIN NHIENLIEU nl ON bg.ID_NHIENLIEU = nl.ID_NHIENLIEU
        WHERE (bg.ID_NHIENLIEU, NGAY_CN) IN (
                SELECT ID_NHIENLIEU, MAX(NGAY_CN) AS max_ngay_cn
                FROM BANGGIA
                GROUP BY ID_NHIENLIEU)
        AND nl.LOAI_NHIENLIEU = 0";

		$result_banggia_2 = mysqli_query($conn, $sql_banggia_2);
		
		// MUC NHIEN LIEU xang
		$sql_level_1 = "SELECT nl.TEN_NHIENLIEU, dt.SO_LUONG,nl.LOAI_NHIENLIEU
		FROM NHIENLIEU nl
		LEFT JOIN DUTRU dt ON nl.ID_NHIENLIEU = dt.ID_NHIENLIEU
		 JOIN TRAMXANGDAU txd ON dt.ID_TRAM = txd.ID_TRAM
		WHERE  nl.LOAI_NHIENLIEU = 1 and dt.ID_TRAM='$id_tram'";

		$result_level_1 = mysqli_query($conn, $sql_level_1);
		//MUC NHIEN LIEU DAU
			// MUC NHIEN LIEU
			$sql_level_2 = "SELECT nl.TEN_NHIENLIEU, dt.SO_LUONG,nl.LOAI_NHIENLIEU
			FROM NHIENLIEU nl
			LEFT JOIN DUTRU dt ON nl.ID_NHIENLIEU = dt.ID_NHIENLIEU
			JOIN TRAMXANGDAU txd ON dt.ID_TRAM = txd.ID_TRAM
			WHERE nl.LOAI_NHIENLIEU = 0 and dt.ID_TRAM='$id_tram'";
	
			$result_level_2 = mysqli_query($conn, $sql_level_2);
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

					<h1 class="h3 mb-3"><strong>TRANG CHỦ</strong></h1>

					<div class="row">
						<div class="col-12">
							<div class="card">	
								<div class="card-header">
									<div class="title-icon-wrapper" style="display: flex;">
										<i class="fas fa-money-check-alt" style="color: #939ba2; font-size: 23px; margin-right: 7px;"></i>
										<h5 class="card-title mb-0"  style=" flex-grow: 1;" id="tieude_banggia">GIÁ XĂNG DẦU HÔM NAY</h5> 					
									</div>	

								</div>						
								<div class="card-body">
									<!-- xăng -->
									<div class="col-12 col-lg-8 col-xxl-12 d-flex">
										<div class="card flex-fill">
											<h5 class="card-title mb-0"><b>Giá Xăng </b></h5>
											<table class="table table-hover my-0">
												<thead>
													<tr>
														<th>Nhiên Liệu</th>
														<th class="d-none d-xl-table-cell">Ngày cập nhật gần nhất</th>
														<th class="d-none d-xl-table-cell">Đơn giá</th>							
													</tr>
												
												</thead>
											
												<tbody>
												<?php
													// Check if there are results
													if ($result_banggia_1 && mysqli_num_rows($result_banggia_1) > 0) {
														// Output data of each row
														while ($row = mysqli_fetch_assoc($result_banggia_1)) {
															echo "<tr>
																	<td><strong>{$row['TEN_NHIENLIEU']}</strong></td>
																	<td class='d-none d-xl-table-cell'>{$row['NGAY_CN']}</td>
																	<td class='d-none d-md-table-cell'><span class='badge bg-success'>{$row['GIA']} VND/Lít</span></td>
																</tr>";
														}
													} else {
														echo "<tr><td colspan='3'>Không có dữ liệu</td></tr>";
													}
													?>
												</tbody>
											</table>
										</div>

										<!-- dầu -->
										<div id="khoangcach"></div>
										<div class="card flex-fill" id="banggiadau">
											<h5 class="card-title mb-0"><b>Giá Dầu</b></h5>
											<table class="table table-hover my-0">
												<thead>
													<tr>
														<th>Nhiên Liệu</th>
														<th class="d-none d-xl-table-cell">Ngày cập nhật gần nhất</th>
														<th class="d-none d-xl-table-cell">Đơn giá</th>
														
													</tr>
												</thead>
												<tbody>
												<?php
													// Check if there are results
													if ($result_banggia_2 && mysqli_num_rows($result_banggia_2) > 0) {
														// Output data of each row
														while ($row = mysqli_fetch_assoc($result_banggia_2)) {
															echo "<tr>
																	<td><strong>{$row['TEN_NHIENLIEU']}</strong></td>
																	<td class='d-none d-xl-table-cell'>{$row['NGAY_CN']}</td>
																	<td class='d-none d-md-table-cell'><span class='badge bg-success'>{$row['GIA']} VND/Lít</span></td>
																</tr>";
														}
													} else {
														echo "<tr><td colspan='3'>No data available</td></tr>";
													}
													?>
												</tbody>
											</table>
										</div>								
								</div>
								<?php if( $_SESSION['quyen'] =="Quản lý")
								 	echo '<a id="bt_dieuchinh" href="dieuchinhgia.php" type="button" class="btn btn-primary">Điều Chỉnh</a>';
								?>
								</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<div class="title-icon-wrapper" style="display: flex; align-items: center; justify-content: center;">
										<i class="fas fa-tint" style="color: #939ba2; font-size: 23px; margin-right: 7px;"></i>
										<h5 class="card-title mb-0"  style=" flex-grow: 1;" id="tieude_banggia">MỨC NHIÊN LIỆU</h5> 
									</div>	
								</div>
								<div class="card-body">

									<div class="col-12 col-lg-8 col-xxl-12 d-flex">
										<div class="card flex-fill">
											<h5 class="card-title mb-0"><b>Mức xăng </b></h5>
											<table class="table table-hover my-0">
												<thead>
													<tr>
														<th>Nhiên Liệu</th>
													
														<th class="d-none d-xl-table-cell">Dung lượng</th>
														
													</tr>
												</thead>
												<tbody>
													<!-- <tr>
														<td> <strong id="tennhienlieu">Project Apollo</strong>  </td>
														
														<td class="d-none d-md-table-cell"><span id="dutru"  class="badge ">23 Lít</span></td>
													</tr>
												
													<tr>
														<td> <strong id="tennhienlieu">Prjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjoject Apollo</strong></td>
														
														<td class="d-none d-xl-table-cell"><span id="dutru"  class="badge ">23 Lít</span></td>
														
													</tr>
													<tr>
														<td> <strong id="tennhienlieu">Project Apollo</strong></td>
														
														<td class="d-none d-xl-table-cell"><span id="dutru" class="badge ">23 Lít</span></td>
														
													</tr>	 -->
													<?php
														// Check if there are results
														if ($result_level_1 && mysqli_num_rows($result_level_1) > 0) {
															// Output data of each row
															while ($row = mysqli_fetch_assoc($result_level_1)) {
																echo "<tr>
																		<td><strong>{$row['TEN_NHIENLIEU']}</strong></td>
																		<td class='d-none d-md-table-cell'><span id='dutru' class='badge'>{$row['SO_LUONG']} Lít</span></td>
																	</tr>";
															}
														} else {
															echo "<tr><td colspan='2'>No data available</td></tr>";
														}
													?>
												</tbody>
											</table>
										</div>
										<div id="khoangcach"> </div>
										<div class="card flex-fill" id="banggiadau">
											<h5 class="card-title mb-0"><b>Mức Dầu</b></h5>
											<table class="table table-hover my-0">
												<thead>
													<tr>
														<th>Nhiên Liệu</th>
												
														<th class="d-none d-xl-table-cell">Dung lượng</th>
														
													</tr>
												</thead>
												<tbody>													
												<?php
														// Check if there are results
													if ($result_level_2 && mysqli_num_rows($result_level_2) > 0) {
															// Output data of each row
														while ($row = mysqli_fetch_assoc($result_level_2)) {
															echo "<tr>
																		<td><strong>{$row['TEN_NHIENLIEU']}</strong></td>
																		<td class='d-none d-md-table-cell'><span id='dutru' class='badge'>{$row['SO_LUONG']} Lít</span></td>
																	</tr>";
															}
														} else {
															echo "<tr><td colspan='2'>No data available</td></tr>";
														}
													?>
												</tbody>
											</table>
										</div>
									</div>										
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

	<!-- <script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-nhap-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-nhap-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script> -->
<!-- 
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-xuat-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-xuat-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script> -->
<!-- 
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script> -->
	<!-- <script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new jsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				},
				zoomOnScroll: false
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script> -->
	<!-- <script>
		document.addEventListener("DOMContentLoaded", function() {
			var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
			var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
				defaultDate: defaultDate
			});
		});

		
	</script> -->
	<style>
		.navbar-bg {
			background: #fff;
			margin-left: 10px;}
		#dongia{
			font-size: 14px;
			
		}
		#khoangcach {
			width: 50px;
		}

		#tennhienlieu{
			font-size: 15px;
			color:#000088;
		}
		#tieude_banggia {
			
			font-size: 18px;
		}
		#bt_dieuchinh {
			float: right;
			margin-right: 290px;
		}
		#dutru{
			background-color: #EEAD0E;
			font-size: 14px;
		}

	
	</style>
</body>

</html>