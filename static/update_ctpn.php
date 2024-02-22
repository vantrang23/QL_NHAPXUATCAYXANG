
<?php
session_start();
$id_tram=$_SESSION['id_tram'];

include 'connect.php';
if (isset($_GET['id_phieunhap']) && isset($_GET['id_nhienlieu'])) {
    $id_phieunhap = $_GET['id_phieunhap'];
    $id_nhienlieu = $_GET['id_nhienlieu'];

	//lấy tên nhiên liệu
	$sql="SELECT * FROM NHIENLIEU WHERE id_nhienlieu=$id_nhienlieu";
	$result_ten=mysqli_query($conn, $sql);
	$row_ten = mysqli_fetch_assoc($result_ten);

	//lấy tên phieu nhap
	$sql_pn="SELECT * FROM CTPN WHERE ID_PHIEUNHAP=$id_phieunhap and ID_NHIENLIEU=$id_nhienlieu";
	$result_phieunhap=mysqli_query($conn, $sql_pn);
	$row_phieunhap = mysqli_fetch_assoc($result_phieunhap);

	$sql_pn = "SELECT PN.ID_PHIEUNHAP, DATE_FORMAT(PN.THOIGIAN_NHAP, '%d-%m-%Y %H:%i:%s') as THOIGIAN_NHAP,NCC.ID_NCC, NCC.TEN_NCC, CONCAT(NHANVIEN.HO_NV, ' ', NHANVIEN.TEN_NV) AS FULLNAME,PN.TONG_TIEN, TRAMXANGDAU.TEN_TRAM 
			FROM PHIEUNHAP PN
			JOIN NHANVIEN ON PN.ID_NV = NHANVIEN.ID_NV
			JOIN NHACUNGCAP NCC ON PN.ID_NCC= NCC.ID_NCC
			JOIN TRAMXANGDAU ON PN.ID_TRAM = TRAMXANGDAU.ID_TRAM WHERE ID_PHIEUNHAP = '$id_phieunhap'"  ;
	$result_pn=mysqli_query($conn, $sql_pn);
	$row_pn = mysqli_fetch_assoc($result_pn);

	//nhap nhien lieu
	$sql_tennl="SELECT ID_NHIENLIEU,TEN_NHIENLIEU FROM NHIENLIEU where ID_NHIENLIEU<> $id_nhienlieu";
	$result_tennl=mysqli_query($conn,$sql_tennl);
	
	if(isset($_POST['nhapnhienlieu'])){
		$nhienlieu = $_POST['tennhienlieu'];
		$soluong = $_POST['soluong'];
		$dongia = $_POST['dongia'];
		$thanhtien = $_POST['thanhtien'];
		
		//update
		

		
	// Continue with the update
	$sql_update = "UPDATE CTPN SET ID_NHIENLIEU=$nhienlieu, SO_LUONG=$soluong, DONGIA=$dongia WHERE ID_PHIEUNHAP=$id_phieunhap AND ID_NHIENLIEU=$id_nhienlieu";
	$result_update = mysqli_query($conn, $sql_update);

	//sql server

	$sql_update_sqlsrv = "UPDATE CTPN SET ID_NHIENLIEU=$nhienlieu, SO_LUONG=$soluong, DONGIA=$dongia WHERE ID_PHIEUNHAP=$id_phieunhap AND ID_NHIENLIEU=$id_nhienlieu";
	$result_update_sqlsrv = sqlsrv_query($conn_sv, $sql_update_sqlsrv);


	if ($result_update && $result_update_sqlsrv) {
		header("Location: chitietphieunhap.php?id_phieunhap=$id_phieunhap");
	} else {
		echo "Error updating CTPN: " . mysqli_error($conn);
	}
			


		// $sql_update="UPDATE CTPN set ID_NHIENLIEU=$id, SO_LUONG=$soluong, DONGIA=$dongia where ID_PHIEUNHAP=$id_phieunhap and ID_NHIENLIEU=$id_nhienlieu";
		// $result_update=mysqli_query($conn, $sql_update);

		// $sql_nhapnhienlieu = "SELECT CTPN.DONGIA, CTPN.SO_LUONG FROM CTPN 
		// JOIN PHIEUNHAP PN ON CTPN.ID_PHIEUNHAP = PN.ID_PHIEUNHAP 
		// WHERE CTPN.ID_NHIENLIEU='$nhienlieu'";
		// $result_ctpn = mysqli_query($conn, $sql_nhapnhienlieu);
		// $sql_insert_ctpn = "INSERT INTO CTPN (ID_PHIEUNHAP,ID_NHIENLIEU,SO_LUONG,DONGIA) VALUES ('$id_phieunhap','$nhienlieu','$soluong', '$dongia')";
		// $result_insert_ctpn=mysqli_query($conn, $sql_insert_ctpn);


		
		
		//$sql_insert_thanhtien = "UPDATE PHIEUNHAP SET TONG_TIEN = TONG_TIEN + '$thanhtien', TRANG_THAI = 1 WHERE ID_PHIEUNHAP = '$id_phieunhap'";
	//	$result_insert_thanhtien=mysqli_query($conn, $sql_insert_thanhtien);
		// if ($result_update) {

		// 	header("Location: danhsachctpn.php?id_phieunhap=$id_phieunhap");
			

		// }


	}
}
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

	<title>Chi tiết phiếu nhập</title>
	
	<link href="css/app.css" rel="stylesheet">
	<script  src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/4.7.5/jquery.min.js"></script> -->
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	

</head>

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
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>NHẬP NHIÊN LIỆU</strong></h1>
                   
					<div class="row">                    
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Phiếu Nhập</h5>
            </div>
            <div class="card-body">
                <div class="row" id="input_disable">
                    <div class="col-md-6">
                        <b>Ngày nhập:</b>
                        <input value="<?php echo $row_pn['THOIGIAN_NHAP']; ?>" type="text" style="background-color: #FFFAB3;" disabled>
                    </div>
                    <div class="col-md-6">
                        <b>Mã phiếu nhập:</b>
                        <input value="<?php echo $row_pn['ID_PHIEUNHAP']; ?>" type="text" style="background-color: #FFFAB3;" disabled>
                        <br><br>
                        <b>Trạm xăng dầu:</b>
                        <input value="<?php echo $row_pn['TEN_TRAM']; ?>" type="text"style="background-color: #FFFAB3;" disabled>
                    </div>
                </div>
                <div class="mb-3" style="width: 90%;">
                    <label class="form-label"><b>Nhân Viên Xử Lý:</b></label>
                    <input type="text" value='<?php echo $row_pn['FULLNAME']; ?>' style='height: 40px;' class='form-control' disabled>
                </div>
                <div class="mb-3" style="width: 90%;">
                    <label class="form-label"><b>Nhà Cung Cấp:</b></label>
                    <input type="text" value='<?php echo $row_pn['TEN_NCC']; ?>' style='height: 40px;' class='form-control' disabled>
                    <input type="hidden" value='<?php echo $row_pn['ID_NCC']; ?>' id="idncc" style='height: 40px;' class='form-control' >
                
				</div>
            </div>
        </div>
    </div>
</div>

					<div class="row">
						<form action="" method="post">
							<div class="col-12">
								<div class="card">	
									<div class="card-header" >
										<h5 class="card-title mb-0" >Nhập Nhiên Liệu</h5>	
									</div>							
									<div class="card-body">																		
										<div class="mb-3" style="width: 90%;">
											<label class="form-label"><b>Tên Nhiên Liệu:</b></label>
											<select id="IdNhienlieu" name='tennhienlieu' style="height: 40px;" class="form-select mb-3">
												<option value='<?php echo $row_ten['ID_NHIENLIEU'];?>' selected ><?php echo $row_ten['TEN_NHIENLIEU'];?></option>
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
												<input id="dongia" type="text" value="<?php echo $row_phieunhap['DONGIA'];?>" class="form-control dongia" name="dongia" readonly>
												<h3 class="a"></h3>

												<span class="input-group-text"><b>VND</b></span>
											</div>
										</div>
										<div class="mb-3" style="width: 40%;">
											<label class="form-label"><b>Số Lượng:</b></label>
											<div class="input-group">
												<input name='soluong' type="number" class="form-control" value='<?php echo $row_phieunhap['SO_LUONG'];?>' >
												<span class="input-group-text"><b>Lít</b></span>
											</div>
										</div>
									</div>
									
									<div class="col-12">									
										<div class="row justify-content-end">
											<div class="col-md-4 mb-4 ">
												<div class="input-group">
													<span class="input-group-text"><b>Thành tiền</b>:</span>
													<input name='thanhtien' id="tthanhtien" type="text" class="form-control "  readonly >
													<span class="input-group-text"><b>VND</b></span>
												</div>
											</div>
											<div class="col-md-3 ml-auto mb-3">
					
												<button type="submit" name="nhapnhienlieu" class="btn btn-primary ml-auto mr-2">UPDATE</button>
												<!-- <button type="submit" name='capnhatnhienlieu' class="btn btn-primary mr-2">Update</button> -->
											</div>
										</div>
							        </div>
                                </div>
                            </div>
						</form>
					</div>


					<div class="row">
                        <div class="col-12">
                            <div class="card">		
								<div class="card-header" >
									<h5 class="card-title mb-0" id="tieude_banggia">Danh Sách Nhiên Liệu Nhập</h5>	
								</div>							
                                <div class="card-body">	
								<div class="col-md-3 ml-auto mb-3">
									<a href="chitietphieunhap.php?id_phieunhap=<?php echo $id_phieunhap; ?>" class="btn btn-primary ml-auto mr-2">Add</a>
								</div>
							
								<!-- <div class="col-md-3 ml-auto mb-3">
									
                                    <input name="chitietphieunhap" value="Add" type="submit" class="btn btn-primary ml-auto mr-2">
                                </div> -->
                                    <div class="table-responsive ">
										
                                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="th-sm">STT</th>
                                                    <th class="th-sm">Tên nhiên liệu</th>
                                                    <th class="th-sm">Loại nhiên liệu</th>
                                                    <th class="th-sm">Số lượng</th>
                                                    <th class="th-sm">Đơn giá</th>
                                                    <th class="th-sm">Thành tiền</th>
                                                    <th class="th-sm">Action</th>
                                                  </tr>
                                            </thead>																					
                                            <tbody>
												<!-- ?php  $THANHTIEN=ROWDONGIA * ROWSOL ? -->
												<?php
												//HIEN THI CHI TIET PHIEU NHAP
												$sql_select_dsctpn="SELECT NL.TEN_NHIENLIEU,NL.LOAI_NHIENLIEU, CTPN.ID_NHIENLIEU,CTPN.DONGIA, CTPN.SO_LUONG FROM CTPN 
												-- JOIN PHIEUNHAP PN ON CTPN.ID_PHIEUNHAP = PN.ID_PHIEUNHAP
												JOIN NHIENLIEU NL ON CTPN.ID_NHIENLIEU=NL.ID_NHIENLIEU  WHERE ID_PHIEUNHAP = '$id_phieunhap'";
												$result_select_dsctpn = mysqli_query($conn, $sql_select_dsctpn);
													$tongtien=0;
													// Check if there are results
													if ($result_select_dsctpn && mysqli_num_rows($result_select_dsctpn) > 0) {
														// Output data of each row
														$stt = 0;
														while ($row = mysqli_fetch_assoc($result_select_dsctpn)) {
															

															$stt++;
															$thanhtien = $row['SO_LUONG'] * $row['DONGIA'];
															$tongtien += $thanhtien;
															
															$loai_nhien_lieu = ($row['LOAI_NHIENLIEU'] == 1) ? 'Xăng' : 'Dầu';
															echo "<tr>
																	<td>{$stt}</td>
																	<td>{$row['TEN_NHIENLIEU']}</td>
																	<td>{$loai_nhien_lieu}</td>
																	<td>{$row['SO_LUONG']}</td>
																	<td>{$row['DONGIA']}</td>
																	<td>{$thanhtien}</td>
																	<td> 
																		<div class='btn-group ml-auto'>
																			<a href='xoa_ctpn.php?id_phieunhap={$id_phieunhap}&id_nhienlieu={$row['ID_NHIENLIEU']}' class='btn btn-sm btn-outline-dark'><i class='fas fa-trash-alt'></i></a>
																		
																			<a href='update_ctpn.php?id_phieunhap={$id_phieunhap}&id_nhienlieu={$row['ID_NHIENLIEU']}' class='btn btn-sm btn-outline-dark'><i class='fas fa-edit'></i></a>
																		</div>
																	</td>    
																</tr>";
														}
													} else {
														echo "<tr><td colspan='10'>Không có dữ liệu</td></tr>";
													}
													if(isset($_POST['save'])){
														$sql_update_tongtien="UPDATE PHIEUNHAP  SET TONG_TIEN='$tongtien' where ID_PHIEUNHAP='$id_phieunhap' ";
														$result_update_tongtien=mysqli_query($conn, $sql_update_tongtien);
														
													
													}
													?>
                                              
												</tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="th-sm">STT</th>
                                                    <th class="th-sm">Tên nhiên liệu</th>
                                                    <th class="th-sm">Loại nhiên liệu</th>
                                                    <th class="th-sm">Số lượng</th>
                                                    <th class="th-sm">Đơn giá</th>
                                                    <th class="th-sm">Thành tiền</th>
                                                    <th class="th-sm">Action</th>
                                                  </tr>
                                            </tfoot>
                                          </table>
                                        </div>							
										<div class="row justify-content-end" >
                                        	<div class="col-md-5 ml-auto mb-4">   	                                    
												<div class="input-group ">
													<span class="input-group-text"><b>TỔNG TIỀN NHẬP</b>:</span>
													<!-- <input value="20000000" id="tongtien" type="text" class="form-control " name="tongtien" disabled> -->
													<input value="<?php echo number_format($tongtien, 0, '', ','); ?>" id="tongtien" type="text" class="form-control" name="tongtien" disabled>
													<span class="input-group-text"><b>VND</b></span>
												</div>		
											</div> 									
                                        </div>
                                    </div> 
                            </div>
                        </div>
					</div>
					<!-- <div class="row justify-content-end" >
						<div class="col-md-3 ml-auto mb-3">		
							<button type="button" class="btn btn-primary ml-auto mr-2">Export</button>
							<a href="index.html" type="button" class="btn btn-danger mr-2">Cancel</a>
						</div>
					</div> -->
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
    document.addEventListener("DOMContentLoaded", function () {
        // Get the input elements
        var soluongInput = document.querySelector("input[name='soluong']");
        var dongiaInput = document.querySelector("input[name='dongia']");
        var thanhtienInput = document.getElementById("tthanhtien");

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
			var idncc = document.getElementById("idncc").value
			// alert(selectedId);exit;
			

			// Truy vấn cơ sở dữ liệu để lấy giá của loại nhiên liệu
			$.ajax({
				url: 'dongia_ncc.php',
				method: 'POST',
				dataType: 'html',
				data: {
					idnl: selectedId, idncc: idncc
				},
				success: function(data) {
					// Đặt giá vào trường nhập
					// $('.dongia').html(data);
					console.log("skdgha"+data)
					document.getElementById("dongia").value=data;
				}
			});
		}); 
	</script>
	<style>
		
		.navbar-bg {
			background: #fff;
			margin-left: 10px;}
		#dongia{
			font-size: 12px;
			
		}
		#btn {
			float: right;
			margin-right: 290px;
		}
		#tthanhtien, #tongtien
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
        #input_disable {
           
            margin-bottom: 20px;
        }
		a{
			text-decoration: none;
		}
		button{
			margin-right: 5px;
		}
	
	</style>


</body>
</html>
