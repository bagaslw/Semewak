<?php include "koneksi.php"; ?>
<?php
	session_start();
	include 'koneksi.php';
	//cek apakah user suadh login
	if($_SESSION['login'] == false){
		header('Location : homei.php');
	}
?>
<html>
<head>
	<style>
		
</style>
</head>
<body>
	
	<?php
    $edit = mysqli_query($koneksi,"SELECT * FROM bank WHERE id_bank='$_SESSION[id]'");
    $a = mysqli_fetch_assoc($edit);
    ?>
	
	<div class="container"> 
		<center>
		<form action="#" method="POST">
			<table align="center">
			
				<tr>
				<h1><center>TRANSAKSI</center></h1>
				</tr>
				<tr>
					<td>Pilih Bank</td>
					<td>
						<select name="id_Bank" onchange="pilih(this)">
							<option value="">Pilih Bank</option>
							<?php 
							$sql=mysqli_query($koneksi,"SELECT * from bank");
							while($datametod=mysqli_fetch_assoc($sql)){
							?>
							<option id="method" value="<?php echo $datametod['id_bank'];?>" onchange="function pilih(hg) {
								var id = hg.value;
								var harga = document.getElementById('harganya');
								if(true){
									<?php
									$sq=mysqli_query($koneksi,"SELECT * from bank");
									while($datameto=mysqli_fetch_assoc($sq)){?>
									if(id == $datameto['nama']){
									harga.innerHTML = '<?php echo $datameto['pin']; ?>';
								}
								<?php
								
							}
					?>
			}	
							}"><?php echo $datametod['nama'];?></option>
							<?php
								}
							?>
						</select>
					</td>
				</tr>
					<td>Harga</td>
					<td>
						<span id="harganya"><p></p></span>
					</td>
				<tr>
				</tr>
				<tr>
					<td></td>
					<td><input class="button button2"type="submit" value="Bayar"></td>
					<form method="POST" action="#">
				</tr>
			</table>
		</form>
	</div>
	<script type="text/javascript">

		function pilih(hg){
			var id = hg.value;
			var harga = document.getElementById('harganya');

			if(true){
				<?php
						$sq=mysqli_query($koneksi,"SELECT * from bank");
							while($datameto = mysqli_fetch_assoc($sq)){?>

								if(id == '<?php echo $datameto['id_bank'] ?>'){
									harga.innerHTML = '<?php echo $datameto['pin']; ?>';
								}
								<?php
								
							}
					?>
			}
		}
	</script>
</body>
</html>