<?php

include 'koneksi.php';

session_start();

	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
//	session_start();
//	include 'koneksi.php';
//	//cek apakah user suadh login
//	if($_SESSION['login'] == false){
//		header('Location : homei.php');
//	}
?>		

<html> 
	<head> 
	<style> 
		* {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        body {
            font-family: 'callibrie';
            overflow-x: hidden;
            background-color: white;
        }
        header{
            background-color: black;
            color: white;
        }


        .main-nav {
            list-style-type: none;
            display: none;
        }


        .main-nav li {
            text-align: center;
            margin: 15px auto;
        }

        .logo {
            display: inline-block;
            font-size: 22px;
            margin-top: 10px;
            margin-left: 20px;
        }

        .navbar-toggle {
            position: absolute;
            top: 10px;
            right: 20px;
            cursor: pointer;
            color: rgb(255, 0, 0);
            font-size: 24px;
        }

        @media screen and (min-width: 768px) {
            .navbar {
                display: flex;
                padding-bottom: 0;
                height: 80px;
                align-items: center;
            }

            .main-nav {
                display: flex;
                margin-left: 400px;
                flex-direction: row;
                justify-content: flex-end;
            }

            .main-nav li {
                margin: 0;
            }


            .logo {
                margin-top: 0;
            }

            .navbar-toggle {
                display: none;
            }
        }

        .side-nav{
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;    
            background-color: black;
            opacity: 0.9;
            overflow-x: hidden;
            padding-top: 60px;
            transition: 0.5s; 
        }

        .side-nav a{
            padding: 10px 10px 10px 30px;
            text-decoration: none;
            font-size: 25px;
            color: red;
            display: block;
            transition: 0.3s;
        }

        .side-nav a:hover{
            color: red;
        }

        .side-nav .btn-close{
            position: absolute;
            top: 0;
            right: 22px;
            font-size: 36px;
            margin-left: 50px;
        }

                input{
            height: 40px;
            margin-left: 20px;
            margin-bottom: 10px;
            border: 3px solid blue;
            background-color:;
            border-radius: 10px;
        }
        
        

        form{
            border: 10px solid black;
            margin-left:400px;
            border-radius: 15px;
            margin-right: 250px;
            margin-top: 10px;
            background-color: #dcdcdc
        }

        #nav {
            line-height:40px;
            background-color: #dcdcdc;
            height:1000px;
            width:230px;
            float:left;
            padding:5px;
            border:5px solid black;
        }
            .link a:link, a:visited {
            background-color: #00bfff;
            color: white;
            width: 210px;
            padding: 14px 25px;
            text-align: center; 
            text-decoration: none;
            display: inline-block;
        }


        .link a:hover, a:active {
            background-color: green;
        }
	</style>
	</head>
	<body> 
	<div class="container"> 
		<center>
		<form action="#" method="POST">
		<center <a href="#" class="tambah">Form Mahasiswa Baru</a></center>
	<table align="center">
		<?php
    $edit = mysqli_query($koneksi,"SELECT * FROM order_sunat WHERE id_order='$_SESSION[id]'");
    $a = mysqli_fetch_assoc($edit);
    ?>
    <tr>
		<td>Id Order</td>
		<td><input type="text" name="id_order"  value="<?php echo $a['id_order']; ?>" readonly></td>
	</tr>
	<tr>
		<td>Tanggal Pembayaran</td>
		<td><input type="date" name="tanggal"></td>
	</tr>
	<tr>
		<td>ATM</td>
		<td>
			<select name="atm" onchange="pin(this)">
				<option>Pilih </option>
				<option>BRI</option>
				<option>BNI</option>
				<option>BCA</option>
				<option>MANDIRI</option>
			</select>
			
		</td>
		<td>
			<span id="harganya"><p></p></span>	
		</td>
	</tr>
	<tr>
		<td>Total Harga</td>
		<td>
			<input type="text" name="total_harga"  value="<?php echo $a['id_metode']; ?>" readonly >
		</td>
	</tr>
	<tr>
        <td></td>
        <td align="center"><input type="submit" name="tiket" value="BAYAR" style="width: 90px; background-color: black; color: white; margin-left: 70px;"></input><td>
    </tr>
	<script>
		function pin(t){
			var id = t.value;
			var harga = document.getElementById('harganya');
			
			if(id=="BRI"){
				harga.innerHTML =("1234567890");
			}
			else if(id=="BNI"){
				harga.innerHTML =("6574839284");
			}
			if(id=="BCA"){
				harga.innerHTML =("0987654321");
			}
			if(id=="MANDIRI"){
				harga.innerHTML =("5432167890");
			}
		}
	</script>
	</table>
	</form>
	</div>
	</body>
</html>