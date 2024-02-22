
<?php session_start();?>
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

	<title>Điều chỉnh giá bán</title>

	<script  src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<?php
include 'connect.php';
//TEN NHIEN LIEU XANG DAU
$sql_tenxang="SELECT * FROM NHIENLIEU ";
$result_tenxang=mysqli_query($conn,$sql_tenxang);


//gia ban ra
if (isset($_POST['dieuchinhgia'])){
	
$nhienlieu=$_POST['nhienlieu'];
$giaban=$_POST['giaban'];
$ngaydieuchinh = $_POST['ngaydieuchinh'];
$sql_insert_gia="INSERT INTO BANGGIA  VALUES ('$nhienlieu','$ngaydieuchinh','$giaban')";
$result_insert_gia=mysqli_query($conn,$sql_insert_gia);

//kiem tra ket noi mariadb
if(!$result_insert_gia){
	die("Ket noi mariab that bai! " . mysqli_error($conn));
}

//insert SQL
$sql_insert_gia_sql_server ="INSERT INTO BANGGIA  VALUES ('$nhienlieu','$ngaydieuchinh','$giaban')";
    // $params = array($nhienlieu, $ngaydieuchinh, $giaban);
    $result_insert_gia_sql_server = sqlsrv_query($conn_sv, $sql_insert_gia_sql_server);

 // KIEM TR KQ INSRRT SQL
 if ($result_insert_gia_sql_server === false) {
	die("Insert Sql loi! " . print_r(sqlsrv_errors(), true));
}

header("Location: index.php");
exit;
}
mysqli_close($conn);
sqlsrv_close($conn_sv);

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
				<h1  id="tieude" class="h3 mb-3" id><strong>ĐIỀU CHỈNH BẢNG GIÁ NHIÊN LIỆU BÁN RA</strong></h1><br>
				<div id="container" class="container-fluid p-0" >
					<form method="post">
						
						<br>
						
						<div class="row">
							<div class="col-12 col-lg-8">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0" style="font-size: 18px; color: brown;">Điều Chỉnh Giá Nhiên Liệu</h5>
									</div>
									<div class="card-body">
									<div class="mb-3" style="width: 90%;">
											<label class="form-label"><b>Tên Nhiên Liệu:</b></label>
											<select name="nhienlieu" style="height: 40px;" class="form-select mb-3">
												
												<?php
													// Loop through the data and generate the <option> tags
													while ($row_tenxang = mysqli_fetch_assoc($result_tenxang)) {
														$id_tnl = $row_tenxang['ID_NHIENLIEU'];
														$tennl=$row_tenxang['TEN_NHIENLIEU'];
														echo "<option value='{$id_tnl }'>{$tennl}</option>";
													}
												?>
											</select>
										</div>
										<div class="mb-3" style="width: 95%;">
										<label class="form-label">Ngày điều chỉnh gần nhất</label>

										<?php 
										date_default_timezone_set('Asia/Ho_Chi_Minh');
										
										$datetime = date('Y-m-d H:i:s');
										?>

										<input name="ngaydieuchinh" value="<?php echo $datetime; ?>" type="text" class="form-control" placeholder="" readonly>
										</div>
										<div class="mb-3" style="width: 50%;">
											<label class="form-label">Giá bán ra</label>
											<div  class="input-group" id="dongia">
												<input name="giaban" type="number"  class="form-control" aria-label="Amount (to the nearest dollar)">
												<div class="input-group-append">
													<!-- <span class="input-group-text">000</span> -->
												<span class="input-group-text">VND/Lít</span>
												</div>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						

						<button name="dieuchinhgia" id="bt_dieuchinh" type="submit" class="btn btn-primary">Điều Chỉnh</button>
						<a href="danhsach_phieunhap.php" type="submit" class="btn btn-danger mr-2">Cancel</a>
					</form>
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
	.input-group-append {
		display: flex;
	}

	#container{
		
		margin-left: 200px;
	
	}
	#tieude {
		text-align: center;
		font-size: 20px;
	}
	h5{
		text-align: center;
		font-weight: bold;
		
	}
	#bt_dieuchinh{
		margin-left: 50%;
	}
	label{
		font-weight: bold;
	}
	button{
		margin-right: 5px;
	}
</style>
	
</body>

</html>