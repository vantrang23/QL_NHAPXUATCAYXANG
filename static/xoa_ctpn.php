<?php
session_start();

include 'connect.php';

if (isset($_GET['id_phieunhap']) && isset($_GET['id_nhienlieu'])) {
    $id_phieunhap = $_GET['id_phieunhap'];
    $id_nhienlieu = $_GET['id_nhienlieu'];


    // Perform the deletion
    $sql_delete = "DELETE FROM CTPN WHERE ID_PHIEUNHAP = '$id_phieunhap' AND ID_NHIENLIEU = '$id_nhienlieu'";
    $result_delete= mysqli_query($conn, $sql_delete);

    $sql_delete_sqlsrv = "DELETE FROM CTPN WHERE ID_PHIEUNHAP = '$id_phieunhap' AND ID_NHIENLIEU = '$id_nhienlieu'";
    $result_delete_sqlsrv= sqlsrv_query($conn_sv, $sql_delete_sqlsrv);
    
    if ($result_delete && $result_delete_sqlsrv) {
        // Redirect back to the page where the delete button was clicked
        header("Location: chitietphieunhap.php?id_phieunhap=$id_phieunhap");
        exit();
    } else {
        echo "Error deleting item: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
} else {
    echo "Invalid item ID.";
}
?>
