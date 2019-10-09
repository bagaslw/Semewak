<?php
include 'koneksi.php';
?>
<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	session_start();
//	include 'koneksi.php';
//	//cek apakah user suadh login
//	if($_SESSION['login'] == false){
//		header('Location : homei.php');
//	}
?>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style type="text/css">
    input[type=text], select {
    width: 100%;
    padding: 12px 50px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}
input[type=reset] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=reset]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 40px;
}
table {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 40px;
}
    </style>
</head>
<body>

    <h1><center>Pembayaran</center></h1>
   <?php
    $edit = mysqli_query($koneksi,"SELECT * FROM order WHERE id_order='$_GET[id]'");
    $a = mysqli_fetch_assoc($edit);
    ?>
    <form method="POST">
    <center><table></center>
            <tr>
                <td>ID Order</td>
                <td><input type="number" name="id_order" value="<?php echo $a['id_order']; ?>"readonly></td>
            </tr>
            <tr>
                <td>ID User</td>
                <td><input type="number" name="id_user" value="<?php echo $a['id_user']; ?>"readonly></td>
            </tr>
            <tr>
                <td>ID Metode</td>
                <td><input type="number" name="id_metode" value="<?php echo $a['id_metode']; ?>"readonly></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    <input type="text" name="alamat" value="<?php echo $a['alamat']; ?>">
                </td>
            </tr>
            <tr>
                <td>Tanggal Order</td>
                <td>
                    <input type="date" name="tgl_order" value="<?php echo $a['tgl_order']; ?>">
                </td>
            </tr>
            <tr>
                <td>jam</td>
                <td>
                    <input type="time" name="jam" value="<?php echo $a['jam']; ?>">
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <input type="text" name="status" value="<?php echo $a['status']; ?>"readonly>
                </td>
            </tr>
            <td></td>
            <td>
                <input type="submit" value="UPDATE"> 
                <input type="submit" value="BATAL">
            </td>
        </tr>
    </table>
    </form>
</body>
</html>
<?php

//   if($_SERVER['REQUEST_METHOD']=='POST'){
//
//      $id_order =  rand(1, 100);
//       $id_user = $_POST['id_user'];
//        $id_metode = $_POST['id_metode'];
//        $alamat = $_POST['alamat'];
//        $tgl_order = $_POST['tgl_order'];
//        $jam = $_POST['jam'];
//        $status = $_POST['status'];

//        if($id_order=='' || $id_metode==''|| $id_user=='' | $alamat==''|| $tgl_order==''|| $jam==''|| $status==''|){
//            echo "Form belum lengkap";
//        }else{
//          $ganti = mysqli_query($koneksi,"UPDATE order SET id_order='$id_penyewa',id_gedung='$id_gedung',tanggal_sewa='$tanggal_sewa'//,lama_sewa='$lama_sewa',total_sewa='$total_sewa',status='$status' WHERE id_booking='$_GET[id]'");
//            if($ganti){
//                if($status == 1){
//                    echo "Data Berhasil Dikonfirmasi";
//                    echo "Data Berhasil Ditolak";
//                }
//            }else{
//            }
//        }
//}
//?>