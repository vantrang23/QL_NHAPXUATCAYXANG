<?php
include 'connect.php';
// // echo $nhienLieuId = $_POST['id']; exit;

// if (isset($_POST['nhienLieuId'])) {
//     echo $nhienLieuId = $_POST['id']; exit;

//     // Perform a database query to get the corresponding Đơn giá based on $nhienLieuId
//     $sql = "SELECT GIA FROM BANGGIA WHERE ID_NHIENLIEU = '$nhienLieuId'";
//     $result = mysqli_query($conn, $sql);

//     if ($result && mysqli_num_rows($result) > 0) {
//         $row = mysqli_fetch_assoc($result);
//         $donGia = $row['GIA'];

//         // Return the Đơn giá as JSON
//         echo  $donGia;
//     } else {
//         // Handle the case where Đơn giá is not found
//         $donGia = '';
//         echo  $donGia;
//     }
// }
?>

<?php
// Lấy ID từ .tham số GET
$id = $_POST['id'];

// Lấy giá
$sql = "SELECT GIA FROM BANGGIA WHERE ID_NHIENLIEU = '$id'";
$result_price = mysqli_query($conn, $sql);

$row_price = mysqli_fetch_assoc($result_price);
$dongia = $row_price['GIA'];
// Dữ liệu phản hồi
// $data = $dongia);
echo $dongia;
