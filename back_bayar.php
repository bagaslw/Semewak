<?php

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $id_transaksi = rand(1, 100);
        $id_order = $_POST['id_order'];
        $id_metode = $_POST['id_metode'];
//        $tanggal_sewa = $_POST['tanggal_sewa'];
//        $lama_sewa = $_POST['lama_sewa'];
        $total_sewa = $_POST['total_harga'];
//        $status = $_POST['status'];

        if($id_transaksi=='' ||$id_order=='' || $id_metode==''){
            echo "Form belum lengkap";
        }else{
           $ganti = mysqli_query($koneksi, "INSERT INTO transaksi VALUES ('$id_transaksi', '$id_order', '$id_metode','$id_user', '$total_sewa')");
            if($ganti){
                if($status == 1){
                    echo "Data Berhasil Dikonfirmasi";
                }else{
                    echo "Data Berhasil Ditolak";
                }
            }else{
                echo "Gagal";
            }
        }
}
?>