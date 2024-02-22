<?php
session_start();
include 'connect.php';
$sql_tennl = "SELECT ID_NHIENLIEU,TEN_NHIENLIEU FROM NHIENLIEU";
$result_tennl = mysqli_query($conn, $sql_tennl);


$id_nhanvien = $_SESSION['id_nv'];
$id_tram = $_SESSION['id_tram'];
$sql_px = "SELECT PX.ID_TRAM,BG.GIA, PX.SO_LUONG, TXD.TEN_TRAM  FROM PHIEUXUAT PX
JOIN TRAMXANGDAU TXD ON PX.ID_TRAM =TXD.ID_TRAM
JOIN BANGGIA BG ON  PX.ID_NHIENLIEU= BG.ID_NHIENLIEU WHERE TXD.ID_TRAM='$id_tram'";
$result_px = mysqli_query($conn, $sql_px);
$row_px = mysqli_fetch_assoc($result_px);


$sql_nv = "SELECT ID_NV, CONCAT(HO_NV, ' ', TEN_NV) AS FULLNAME FROM NHANVIEN WHERE ID_NV = '$id_nhanvien'";
$result_nv = mysqli_query($conn, $sql_nv);



//them phieu xuat
if(isset($_POST['phieuxuat'])){
	$soluong = isset($_POST['soluong']) ? $_POST['soluong'] : 0;
    $dongia = isset($_POST['dongia']) ? $_POST['dongia'] : 0;
	$thanhtien = $_POST['thanhtien'];
	$nhienlieu = $_POST['tennhienlieu'];
    $ngayxuat = isset($_POST["ngayxuat"]) ? $_POST["ngayxuat"] : '';
	$id_random= mt_rand(1, 10000);

	  // Check if the generated ID already exists in the database
	  $check_query = "SELECT COUNT(*) as count FROM PHIEUXUAT WHERE ID_PHIEUXUAT = '$id_random'";
	  $check_result = mysqli_query($conn, $check_query);
	  $check_row = mysqli_fetch_assoc($check_result);
	    // If the generated ID already exists, generate a new one
		while ($check_row['count'] > 0) {
			// $id_random = mt_rand(1, 5000);
			$check_query = "SELECT COUNT(*) as count FROM PHIEUXUAT WHERE ID_PHIEUXUAT = '$id_random'";
			$check_result = mysqli_query($conn, $check_query);
			$check_row = mysqli_fetch_assoc($check_result);
		}
	$sql_select_dutru="SELECT SO_LUONG FROM DUTRU WHERE ID_TRAM= '$id_tram'and ID_NHIENLIEU='$nhienlieu'";
	$result_dt =mysqli_query($conn,$sql_select_dutru);
	$row_dt=  mysqli_fetch_assoc($result_dt);
	
	if($row_dt['SO_LUONG']< $soluong) {
		
		$_SESSION['over_error'] = true;
    header("Location: xuatnhienlieu.php");exit;
    exit; // Stop execution
	}
	else{				

	//tram xang
	$sql_insert_px = "INSERT INTO PHIEUXUAT (ID_PHIEUXUAT,ID_NV, ID_TRAM, ID_NHIENLIEU, THOIGIAN_XUAT, SO_LUONG, TONG_TIEN) 
	VALUES ('$id_random','$id_nhanvien', '$id_tram', '$nhienlieu', '$ngayxuat', '$soluong', '$thanhtien')";
	$result_insert_px = mysqli_query($conn, $sql_insert_px);
	
	$sql_insert_px_sql = "INSERT INTO PHIEUXUAT (ID_PHIEUXUAT,ID_NV, ID_TRAM, ID_NHIENLIEU, THOIGIAN_XUAT, SO_LUONG, TONG_TIEN) 
	VALUES ('$id_random','$id_nhanvien', '$id_tram', '$nhienlieu', '$ngayxuat', '$soluong', '$thanhtien')";
	$result_insert_px_sql = sqlsrv_query($conn_sv, 	$sql_insert_px_sql);

	if ($result_insert_px) {

		$update_dutru="UPDATE DUTRU SET  SO_LUONG = SO_LUONG - $soluong  WHERE ID_NHIENLIEU = '$nhienlieu' AND ID_TRAM = '$id_tram'";
		$result_dutru=mysqli_query($conn, $update_dutru);
				
	}
	if ($result_insert_px_sql) {

		$update_dutru_sql="UPDATE DUTRU SET  SO_LUONG = SO_LUONG - $soluong  WHERE ID_NHIENLIEU = '$nhienlieu' AND ID_TRAM = '$id_tram'";
		$result_dutru_sql=sqlsrv_query($conn_sv, $update_dutru_sql);

	} else{
		die("Insert Sql loi! " . print_r(sqlsrv_errors(), true));
	}

	 $id_phieuxuat = $id_tram;
	header("Location: danhsach_phieuxuat.php");
	// header("Location: danhsach_phieuxuat.php?id_phieuxuat=$id_phieuxuat");

	exit();
}
}
mysqli_close($conn);
sqlsrv_close($conn_sv);
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

	<title>Phiếu xuất</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

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

					<h1 class="h3 mb-3"><strong>XUẤT NHIÊN LIỆU</strong></h1>

					<div class="row">
						<form action="" method="post">
							<div class="col-12">
								<div class="card">
									<div class="card-body">
										<div class="row" id="input_disable">
											<?php
											date_default_timezone_set('Asia/Ho_Chi_Minh');

											$datetime = date('Y-m-d H:i:s');
											?>
											<div class="col-md-6">

												<b>Ngày xuất:</b>
												<input name="ngayxuat" value="<?php echo $datetime; ?>" type="text" class="form-control" placeholder="" readonly>
											</div>

											<div class="col-md-6">
												<b>Trạm xăng dầu:</b>
												<input value="<?php echo $row_px['TEN_TRAM']; ?>" type="text" style="background-color: #FFFAB3;" disabled>
											</div>
										</div>
									</div>

									<div class="card-body">
										<div class="mb-3" style="width: 90%;">
											<label class="form-label"><b>Nhân Viên Xử Lý:</b></label>
											<select name="tennhanvien" style="height: 40px; font-size: 17px;" class="form-select mb-3">
												<!-- <option selected disabled>Tên nhân viên</option>; -->
												<?php
												while ($row = mysqli_fetch_assoc($result_nv)) {

													$id_nv = $id_nhanvien;
													$fullname = $row['FULLNAME'];

													echo "<option value='$id_nv'>$fullname</option>";
												}
												?>
											</select>
										</div>

										<div class="mb-3" style="width: 90%;">
											<label class="form-label"><b>Tên Nhiên Liệu:</b></label>
											<select name="tennhienlieu" id="IdNhienlieu" style="height: 40px;" class="form-select mb-3">
												
												<?php			
													
													
												// Loop through the data and generate the <option> tags
												while ($row_tennl = mysqli_fetch_assoc($result_tennl)) {												
														$id_tnl = $row_tennl['ID_NHIENLIEU'];
														$tennl = $row_tennl['TEN_NHIENLIEU'];
														echo "<option value='{$id_tnl}'>{$tennl}</option>";
												}
												?>

											
											</select>
										</div>
										<div class="mb-3" style="width: 40%;">
											<label class="form-label"><b>Đơn Giá:</b></label>
											<div class="input-group">
												<input id="dongia" type="text" class="form-control dongia" name="dongia" readonly>
												<h3 class="a"></h3>

												<span class="input-group-text"><b>VND</b></span>
											</div>
										</div>
								
										<div class="mb-3" style="width: 40%;">
										<?php
												if (isset($_SESSION['over_error']) && $_SESSION['over_error'] == true) {
    
 
													echo '<div class="alert alert-danger" role="alert" style="color:red; margin-top: 5px;">Số lượng cần xuất lớn hơn mức nhiên liệu dự trữ</div>';
														$_SESSION['over_error'] = false;
													} else {
														$_SESSION['over_error'] = false;
													}
												?>
												<label class="form-label"><b>Số Lượng:</b></label>
												<div class="input-group">
												
												<input id="soluong" type="number" class="form-control" name="soluong">
												<span class="input-group-text"><b>Lít</b></span>
											</div>
										</div>
									</div>

									<div class="col-12">

										<div class="row justify-content-end">
											<div class="col-md-4 mb-4 ">
												<div class="input-group ">
													<span class="input-group-text"><b>Thành tiền</b>:</span>
													<input name="thanhtien"  id="thanhtien" type="text" class="form-control " readonly>
													<span class="input-group-text"><b>VND</b></span>
												</div>
											</div>
											<div class="col-md-3 ml-auto mb-3">
												<button name="phieuxuat" type="submit" class="btn btn-primary ml-auto mr-2">Save</button>
												<a href="index.php" type="submit" class="btn btn-danger mr-2">Cancel</a>
											</div>
										</div>

									</div>

								</div>

							</div>
						</form>
					</div>
				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="#" target="_blank"><strong>Gas Station DNT</strong></a> - <a class="text-muted" href="#" target="_blank"><strong>Duy - Ngân - Trang</strong></a> &copy;
							</p>
						</div>

					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>
	<style>
		.navbar-bg {
			background: #fff;
			margin-left: 10px;
		}

		#dongia {
			font-size: 12px;

		}

		#btn {
			float: right;
			margin-right: 290px;
		}

		#thanhtien {
			color: red;
			font-size: 17px;
			font-weight: bold;
			background-color: khaki;
		}

		#input_disable input {
			height: 30px;
			color: #103667;
		}

		#input_disable {
			margin-top: 20px;

		}

		button {
			margin-right: 5px;
		}
	</style>

<script src="js/app.js"></script>
<!-- tinh thanh tien -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Get the input elements
    var soluongInput = document.querySelector("input[name='soluong']");
    var dongiaInput = document.querySelector("input[name='dongia']");
    var thanhtienInput = document.getElementById("thanhtien");

    // Add an event listener to the input elements
    soluongInput.addEventListener("input", updateThanhTien);
    dongiaInput.addEventListener("input", updateThanhTien);

    // Function to update the 'Thanh Tien' field
    function updateThanhTien() {
        // Get the values of soluong and dongia
        var soluong = parseFloat(soluongInput.value) || 0;
        var dongia = parseFloat(dongiaInput.value) || 0;

        // Calculate the thanhtien
        var thanhtien = soluong * dongia;

        // Display the result in the 'Thanh Tien' field
        thanhtienInput.value = thanhtien; // Format as currency
    }
});
</script>


	<script>

		// Thêm trình nghe sự kiện vào sự kiện change của phần tử select
		$('#IdNhienlieu').change(function() {
			// Lấy ID của tùy chọn được chọn
			var selectedId = $(this).val();
			// alert(selectedId);exit;

			// Truy vấn cơ sở dữ liệu để lấy giá của loại nhiên liệu
			$.ajax({
				url: 'dongia.php',
				method: 'POST',
				dataType: 'html',
				data: {
					id: selectedId
				},
				success: function(data) {
					// Đặt giá vào trường nhập
					// $('.dongia').html(data);
					document.getElementById("dongia").value=data;
				}
			});
		}); 
	</script>

<!-- <script>
document.getElementById('IdNhienlieu').addEventListener('change', function() {
  // Lấy ID được chọn
  var selectedId = this.value;

  // Gửi yêu cầu AJAX để lấy giá
  fetch('get_dongia.php?id=' + selectedId)
    .then(response => response.json())
    .then(data => {
      // Cập nhật trường đầu vào giá
      document.getElementById('dongia').value = data.dongia;
    });
});
</script> -->


</body>

</html>