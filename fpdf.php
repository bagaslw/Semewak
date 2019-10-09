<?php
require('pdf-in-php/fpdf16/fpdf16.php');  //pastikan path atau alamat FPDF sesuai
define('FPDF_FONTPATH','pdf-in-php/fpdf16/font/');
 Class PDF extends FPDF{

 function Header(){
   $this->SetTextColor(128,0,0); // warna tulisan
   $this->SetFont('Arial','B','12'); // font yang digunakan
   // membuat cell dg panjang 19 dan align center 'C'
   $this->Cell(19,1,'TIKET',0,0,'C');
   $this->Ln();
   $this->Cell(19,1,'CETAK TIKET',0,0,'C');
   $this->Ln();
   $this->SetFont('Arial','B','9');
   $this->SetFillColor(192,192,192); // warna isi
   $this->SetTextColor(0,0,0); // warna teks untuk th
   $this->Cell(1);
   $this->Cell(1,1,'NO','TB',0,'L',1); // cell dengan panjang 1
   $this->Cell(2,1,'ID TIKET','TB',0,'L',1); // cell dengan panjang 1
   $this->Cell(3,1,'ID PEMESAN','TB',0,'L',1); // cell dengan panjang 1
   $this->Cell(3.4,1,'ID PESAWAT','TB',0,'L',1);
   $this->Cell(3,1,'TANGGAL','TB',0,'L',1);
   $this->Cell(4,1,'NAMA PENUMPANG','TB',0,'L',1); // cell dengan panjang 2
   $this->Cell(1.5,1,'KURSI','TB',0,'L',1); // cell dengan panjang 3
   // panjang cell bisa disesuaikan
   $this->Ln();
  }
    function Footer(){
   $this->SetY(-2,5);
   $this->Cell(0,1,$this->PageNo(),0,0,'C');
  } 
}
 $server = "localhost";
 $user = "root";
 $pass = "";
 $data = "tegar_project";

 $net = new mysqli($server, $user, $pass, $data);

 if($net->connect_error){
  die("Koneksi gagal: ".$net->connect_error);
 }

 session_start();
$idd = $_SESSION['tiketid'];
 $q = "select * from tiket NATURAL JOIN detail_pemesanan WHERE tiket.Id_tiket = detail_pemesanan.Id_tiket AND tiket.Id_tiket='".$idd."'";
 $h = $net->query($q) or die($net->error);
 $i = 0;
 
 while($d=$h->fetch_array()){
  $cell[$i][0]=$d['Id_tiket'];
  $cell[$i][1]=$d['Id_pemesan'];
  $cell[$i][2]=$d['Id_pesawat'];
  $cell[$i][3]=$d['Tanggal'];
  $cell[$i][4]=$d['Nama_penumpang'];
  $cell[$i][5]=$d['No_kursi'];
  $i++;
 }

$pdf = new PDF('P','cm','A4');
 $pdf->Open();
 $pdf->AliasNbPages();
 $pdf->AddPage();

 $pdf->SetFont('Arial','','8');
 //perulangan untuk membuat tabel
 for($j=0;$j<$i;$j++){
  $pdf->Cell(1);
  $pdf->Cell(1,1,$j+1,'B',0,'C');
  $pdf->Cell(2,1,$cell[$j][0],'B',0,'C');
  $pdf->Cell(2.5,1,$cell[$j][1],'B',0,'C');
  $pdf->Cell(3,1,$cell[$j][2],'B',0,'C');
  $pdf->Cell(2.5,1,$cell[$j][3],'B',0,'R');
  $pdf->Cell(3.5,1,$cell[$j][4],'B',0,'R');
  $pdf->Cell(3,1,$cell[$j][5],'B',0,'R');
  $pdf->Ln();
 }

 $pdf->Output(); // ditampilkan

?>
?>