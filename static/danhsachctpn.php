
<?php
session_start();
$id_tram=$_SESSION['id_tram'];

include 'connect.php';

//THONG TIN PHIEU NHAP
if (isset($_GET['id_phieunhap'])) {
	$id_phieunhap = $_GET['id_phieunhap'];
	$sql_pn = "SELECT PN.ID_PHIEUNHAP, DATE_FORMAT(PN.THOIGIAN_NHAP, '%d-%m-%Y %H:%i:%s') as THOIGIAN_NHAP, NCC.TEN_NCC, CONCAT(NHANVIEN.HO_NV, ' ', NHANVIEN.TEN_NV) AS FULLNAME,PN.TONG_TIEN, TRAMXANGDAU.TEN_TRAM 
			FROM PHIEUNHAP PN
			JOIN NHANVIEN ON PN.ID_NV = NHANVIEN.ID_NV
			JOIN NHACUNGCAP NCC ON PN.ID_NCC= NCC.ID_NCC
			JOIN TRAMXANGDAU ON PN.ID_TRAM = TRAMXANGDAU.ID_TRAM WHERE ID_PHIEUNHAP = '$id_phieunhap'"  ;
	$result_pn=mysqli_query($conn, $sql_pn);
	$row_pn = mysqli_fetch_assoc($result_pn);
	//HIEN THI CTPN
	$sql_select_dsctpn="SELECT NL.TEN_NHIENLIEU,NL.LOAI_NHIENLIEU, CTPN.ID_NHIENLIEU,CTPN.DONGIA, CTPN.SO_LUONG FROM CTPN 
	-- JOIN PHIEUNHAP PN ON CTPN.ID_PHIEUNHAP = PN.ID_PHIEUNHAP
	JOIN NHIENLIEU NL ON CTPN.ID_NHIENLIEU=NL.ID_NHIENLIEU  WHERE ID_PHIEUNHAP = '$id_phieunhap'";
	$result_select_dsctpn = mysqli_query($conn, $sql_select_dsctpn);


//DANH SACH CTPN

	// 	}

		// BANG DU TRU
		// if ($result_insert_ctpn) {
		// 	// Truy vấn số lượng hiện tại trong bảng DUTRU
		// 	$sql_dutru = "SELECT SO_LUONG FROM DUTRU 
		// 	JOIN PHIEUNHAP PN ON DUTRU.ID_TRAM= PN.ID_TRAM WHERE DUTRU.ID_TRAM = PN.ID_TRAM AND ID_NHIENLIEU = '$nhienlieu'";
		// 	$result_dutru = mysqli_query($conn, $sql_dutru);
		// 	$row_dutru = mysqli_fetch_assoc($result_dutru);

		// 	// Cập nhật số lượng trong bảng DUTRU
		// 	$soLuongHienTai = $row_dutru['SO_LUONG'];
		// 	$soLuongMoi = $soLuongHienTai + $soluong;

		// 	$sql_update_dutru = "UPDATE DUTRU SET SO_LUONG = '$soLuongMoi' WHERE ID_TRAM = '$id_tram' AND ID_NHIENLIEU = '$nhienlieu'";
		// 	$result_update_dutru = mysqli_query($conn, $sql_update_dutru);

		// 	if ($result_update_dutru) {
		// 		echo "Thêm thành công và cập nhật số lượng DUTRU.";
		// 	} else {
		// 		echo "Có lỗi khi cập nhật số lượng DUTRU: " . mysqli_error($conn);
		// 	}
		// } else {
			
		// }

	//}

if (isset($_POST['danhaphang'])){
//cap nhat trang thai
	$sql_update_trangthai="UPDATE PHIEUNHAP SET TRANG_THAI=1 WHERE ID_PHIEUNHAP='$id_phieunhap'";
	$result_update_trangthai=mysqli_query($conn, $sql_update_trangthai);
//cap nhat du tru
$sql_dutru="SELECT CTPN.SO_LUONG, CTPN.ID_NHIENLIEU FROM CTPN where CTPN.ID_PHIEUNHAP=$id_phieunhap";
$result_dutru=mysqli_query($conn, $sql_dutru);
while ($row_dutru = mysqli_fetch_assoc($result_dutru)) {
	$sql_update_dutru="UPDATE DUTRU SET SO_LUONG = SO_LUONG + {$row_dutru['SO_LUONG']} where ID_NHIENLIEU = {$row_dutru['ID_NHIENLIEU']} and ID_TRAM = '$id_tram'";
	$result_update_dutru=mysqli_query($conn, $sql_update_dutru);
}


//$row_update_dutru=mysqli_fetch_assoc($result_update_dutru);
header("Location: danhsach_phieunhap.php");

	exit();
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ?PHP  $TONGTIEN = 0;
		$THANHTIEN=0;? -->
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
					<form method="POST">
						<div class="row justify-content-end" >
							<div class="col-md-3 ml-auto mb-3">		
								
								<input type="submit" name="danhaphang" class="btn btn-facebook ml-auto mr-2" value='Đã nhập hàng'>
								<input type="submit"name="save" class="btn btn-primary ml-auto mr-2" value="Save">
								<input type="submit" class="btn btn-danger mr-2" value='Cancel'>
							
							</div>
						</div>
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
