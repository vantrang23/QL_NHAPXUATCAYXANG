<?php session_start();
	include_once("connect.php");

	//lay gia tri tu sesstion
	$id_nhanvien = $_SESSION['id_nv'];
	$id_tram=$_SESSION['id_tram'];
	$sql_nv = "SELECT ID_NV, CONCAT(HO_NV, ' ', TEN_NV) AS FULLNAME FROM NHANVIEN WHERE ID_NV = '$id_nhanvien'";
	$result_nv= mysqli_query($conn, $sql_nv);

	$sql_ncc="SELECT ID_NCC, TEN_NCC FROM NHACUNGCAP where TRANG_THAI=1";
	$result_ncc=mysqli_query($conn, $sql_ncc);
	// $row = mysqli_fetch_array($result_ncc);
	// $_SESSION['ID_NCC'] = $row['ID_NCC'];
	if (isset($_POST['taophieunhap'])) {
		$id_ncc=$_POST["tenncc"];
		$id_nhanv=$_POST["tennhanvien"];
		$id_phieunhap=mt_rand(1,10000);
		//mariadb
		$sql_insert = "INSERT INTO PHIEUNHAP (ID_PHIEUNHAP,ID_NV,ID_TRAM, ID_NCC,THOIGIAN_NHAP,TRANG_THAI) VALUES ('$id_phieunhap','$id_nhanv','$id_tram','$id_ncc', NOW(),'0')";
		$result_insert = mysqli_query($conn, $sql_insert);
		// $row_insert = mysqli_fetch_array($result_insert);

		//sql
		$sql_insert_sql="INSERT INTO PHIEUNHAP (ID_PHIEUNHAP,ID_NV,ID_TRAM, ID_NCC,THOIGIAN_NHAP,TRANG_THAI) VALUES ('$id_phieunhap','$id_nhanv','$id_tram','$id_ncc', GETDATE(),'0')";
		$result_insert_sql=sqlsrv_query($conn_sv,$sql_insert_sql);
		if (!$result_insert_sql) {
			die(print_r(sqlsrv_errors(), true)); // Print SQL Server query errors
		}
		if ($result_insert ) {
			//Get PHP insertion ID
			$id_pn = $id_phieunhap;

			header("Location: chitietphieunhap.php?id_phieunhap=$id_pn");
			exit;

		} else {
			// Insertion failed
			echo "Insert that bai!"; 
		}
	
	}
	//Nha cung cap
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

	<title>Tạo phiếu nhập</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<script  src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

	
</head>
<?php
	



?>
<body>
	<div class="wrapper">
		<?php
			include 'header.php';
		?>
		<div class="main">
		<?php
			include 'username.php';
			?>

			<main class="content">	
				<div class="modal" id="exampleModal" data-bs-backdrop="static" >
					<div class="modal-dialog modal-dialog-centered">
					   <div class="modal-content">		
						<form action="" method="POST">			  
						  <div class="modal-header">
							 <h4 class="modal-title">Tạo phiếu nhập</h4>
						  </div>				 
							<div class="modal-body">
									<div class="mb-3" style="width: 90%;">
										<!-- <label class="form-label"><b>Nhân Viên Xử Lý:</b></label>
										<select style="height: 40px; font-size: 17px;" class="form-select mb-3">
										
											<option selected>Tên nhân viên</option>
											<option>One</option>
											<option>Two</option>
											<option>Three</option>
										</select>
										-->
										<label class="form-label"><b>Nhân Viên Xử Lý:</b></label>
										<select name="tennhanvien" style="height: 40px; font-size: 17px;" class="form-select mb-3">
										
											<?php
											while ($row = mysqli_fetch_assoc($result_nv)) {
												
												$id_nv = $id_nhanvien;
												$fullname = $row['FULLNAME'];
											
												echo "<option value='$id_nv'>$fullname</option>";
											}
											?>
										</select>
									<div class="mb-3" style="width: 90%;">
										<label class="form-label"><b>Nhà cung cấp:</b></label>
										<select name="tenncc" style="height: 40px; font-size: 17px;" class="form-select mb-3">
											<option selected disabled>Tên nhà cung cấp</option>
											<?php
											while ($row = mysqli_fetch_assoc($result_ncc)) {
												
												$id_ncc = $row['ID_NCC'];
												$ncc= $row['TEN_NCC'];
												echo "<option value='$id_ncc'>$ncc</option>";
											}
											?>
										</select>
										
									</div>
								
							</div>
						  <div class="modal-footer">
						  <input type="submit" name="taophieunhap" class="btn btn-primary" value="Tạo">
							<!-- <a href="chitietphieunhap.php" class="btn btn-primary">Tạo</a> -->
							 <!-- <button type="submit" class="btn btn-primary">Tạo</button> -->

							 <a href="index.php" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</a>
						  </div>
						</form>
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
	
	<style>
		
		.navbar-bg {
			background: #fff;
			margin-left: 10px;}
		#dongia{
			font-size: 12px;
			
		}
		#khoangcach {
			width: 50px;
		}
		#tieude_banggia {
			text-align: center;
			font-size: 20px;
		}
		#btn {
			float: right;
			margin-right: 290px;
		}
		#thanhtien
		{
			color: red;
			font-size: 17px;
			font-weight: bold;
			background-color: khaki;
		}
		#input_disable  input{
			height: 30px;
			color: #103667;
			
		}
		a{
			text-decoration: none;
		}
		button{
            margin-right: 5px;
        }
	
	</style>

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
<script>
	$(document).ready(function(){
		$('#exampleModal').modal('show');
	});
</script>