<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Homepage </title>
    <link rel="stylesheet" type="text/css" href="styles/stylesheet.css"/>
    <a href="#" class="ignielToTop"></a>
</head>
<body>
    <div id="wrapper">
        <div id="banner">
            <h1 style= "text-align: center;
                        color: white;
                        margin-top: 50px;
                        margin-left: 20px;
						">
                AMobil <br>
                
            </h1>
        </div>

        <nav id="navigation">
            <ul id="nav">
				<li><a href="index.php">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="news.php">News</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="logout.php">Exit</a></li>
            </ul>
        </nav>

		<div id="content_area_user">
			<table align="left" border="3" cellpadding="8">
				<tr>
					<td bgcolor=#C68B59> <?php echo ''.$_SESSION['namauser'];?> </td>
				</tr>
			</table>
		</div>


        <div id="content_area">

        <?php
// --- Membuat Koneksi Dengan konekdb.php
        $koneksi = mysqli_connect("localhost","root","","amob") or die(mysqli_error());

// --- BAGIAN CRUD ------------------------------------------------------------------------------------------------------------------------------------------------------------- //
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
// --- FIELD FUNGSI TAMBAH DATA (CREATE)
        function createdata($koneksi){
// -- FUNGSI CREATE
	        if (isset($_POST['btn_save'])){
		        $id = time();
		        $nama_barang = $_POST['nama_barang'];
		        $produsen = $_POST['produsen'];
		        $tipe = $_POST['tipe'];
		        $tanggal_rilis = $_POST['tanggal_rilis'];
		
		        if(!empty($nama_barang) && !empty($produsen) && !empty($tipe) && !empty($tanggal_rilis)){
			        $sql = "INSERT INTO penjualan (id,nama_barang, produsen, tipe, tanggal_rilis) VALUES(".$id.",'".$nama_barang."','".$produsen."','".$tipe."','".$tanggal_rilis."')";
			        $simpan = mysqli_query($koneksi, $sql);
			        if($simpan && isset($_GET['aksi'])){
				        if($_GET['aksi'] == 'create'){
					        header('location: index.php');
				        }
			        }
		        } else {
			        $pesan = "Maaf Data Tidak Dapat Disimpan, Mohon Untuk Mengisi Data Secara Lengkap!";
		        }
	        }
// -- FORMULIR CREATE DATA
	    ?> 
		        <form action="" method="POST">
			        <fieldset>
				        <legend><h2>Tambah Data Barang</h2></legend>
				        <label>Nama Mobil	:<input type="text" name="nama_barang" size="100"/></label> <br><br>
				        <label>Produsen Mobil	:<input type="text" name="produsen" size="100"/></label><br><br>
				        <label>Tipe Mobil	:<input type="text" name="tipe" size="100"/></label> <br><br>
				        <label>Tanggal Rilis Mobil : <input type="date" name="tanggal_rilis" /></label> <br>
				        <br>
				        <label>
					        <input type="submit" name="btn_save" value="Simpan"/>
					        <input type="reset" name="reset" value="Hapus"/>
				        </label>
				        <br>
				<p><?php echo isset($pesan) ? $pesan : "Silahkan cek dibawah!" ?></p>
			        </fieldset>
		        </form>
	                <?php

        }
// --- AKHIR DARI FIELD FUNGSI TAMBAH DATA (CREATE)

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//

// --- FIELD FUNGSI BACA/TAMPIL DATA (READ)
        function readdata($koneksi){
	        $sql = "SELECT * FROM penjualan";
	        $query = mysqli_query($koneksi, $sql);
	
	        echo "<fieldset>";
	        echo "<legend><h2> Data Penjualan Barang </h2></legend>";
	
	        echo "<table border='2' cellpadding='5'>";
	        echo "<tr>
			        <th>ID</th>
			        <th>Nama Mobil</th>
			        <th>Produsen Mobil</th>
			        <th>Tipe Mobil</th>
			        <th>Tanggal Rilis MObil</th>
			        <th>Pilihan</th>
		        </tr>";

	        while($data = mysqli_fetch_array($query)){
		        ?>
			        <tr>
				        <td><?php echo $data['id']; ?></td>
				        <td><?php echo $data['nama_barang']; ?></td>
				        <td><?php echo $data['produsen']; ?></td>
				        <td><?php echo $data['tipe']; ?></td>
				        <td><?php echo $data['tanggal_rilis']; ?></td>
				        <td>
					        <a href="index.php?aksi=update&id=<?php echo $data['id']; ?>&nama_barang=<?php echo $data['nama_barang']; ?>&produsen=<?php echo $data['produsen']; ?>&tipe=<?php echo $data['tipe']; ?>&tanggal_rilis=<?php echo $data['tanggal_rilis']; ?>">Edit</a> |
					        <a href="index.php?aksi=delete&id=<?php echo $data['id']; ?>">Hapus</a>
				        </td>
			        </tr>
		        <?php
	        }
	        echo "</table>";
	        echo "</fieldset>";
        }
// --- AKHIR DARI FIELD FUNGSI BACA/TAMPIL DATA (READ)

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//

// --- FIELD FUNGSI UBAH/EDIT DATA (UPDATE)
function updatedata($koneksi){

// --- FUNGSI UPDATE DATA
	if(isset($_POST['btn_edit'])){
		$id = $_POST['id'];
        $nama_barang = $_POST['nama_barang'];
        $produsen = $_POST['produsen'];
        $tipe = $_POST['tipe'];
        $tanggal_rilis = $_POST['tanggal_rilis'];
		
		if(!empty($nama_barang) && !empty($produsen) && !empty($tipe) && !empty($tanggal_rilis)){
			$perubahan = "nama_barang='".$nama_barang."',produsen=".$produsen.",tipe=".$tipe.",tanggal_rilis='".$tanggal_rilis."'";
			$sql_update = "UPDATE penjualan SET ".$perubahan." WHERE id=$id";
			$update = mysqli_query($koneksi, $sql_update);
			if($update && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'update'){
					header('location: index.php');
				}
			}
		} else {
			$pesan = "Maaf Data Tidak Dapat Disimpan, Mohon Untuk Mengisi Data Secara Lengkap!";
		}
	}
	
// --- FORMULIR UPDATE DATA
	if(isset($_GET['id'])){
		?>
			<a href="index.php"> &laquo; Kembali </a>  ||
			<a href="index.php?aksi=create">  Update </a>
			<hr>
			
			<form action="" method="POST">
			<fieldset>
				<legend><h2>Ubah Data Barang</h2></legend>
				<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"/>
				<label>Nama Mobil :<input type="text" name="nama_barang" size="100" value="<?php echo $_GET['nama_barang'] ?>"/></label> <br><br>
				<label>Produsen Mobil :<input type="text" name="produsen" size="100" value="<?php echo $_GET['produsen'] ?>"/></label><br><br>
				<label>Tipe Mobil :<input type="text" name="tipe" size="100" value="<?php echo $_GET['tipe'] ?>"/></label> <br><br>
				<label>Tanggal Rilis Mobil : <input type="date" name="tanggal_rilis" size="100" value="<?php echo $_GET['tanggal_rilis'] ?>"/></label> <br>
				<br>
				<label>
                <input type="submit" name="btn_edit" value="Simpan Perubahan"/> <a href="index.php?aksi=delete&id=<?php echo $_GET['id'] ?>"> </a>
				</label>
				<br>
				<p><?php echo isset($pesan) ? $pesan : "" ?></p>
				
			</fieldset>
			</form>
		<?php
	}
	
}
// --- AKHIR DARI FIELD FUNGSI UBAH/EDIT DATA (UPDATE)

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//

// --- FIELD FUNGSI HAPUS DATA (DELETE)
function deletedata($koneksi){

	if(isset($_GET['id']) && isset($_GET['aksi'])){
		$id = $_GET['id'];
		$sql_hapus = "DELETE FROM penjualan WHERE id=" . $id;
		$hapus = mysqli_query($koneksi, $sql_hapus);
		
		if($hapus){
			if($_GET['aksi'] == 'delete'){
				header('location: index.php');
			}
		}
	}
	
}
// --- AKHIR DARI DUNGSI HAPUS (DELETE)

// =============================================================================================================================================================================//

// --- Kendali Halaman
if (isset($_GET['aksi'])){
	switch($_GET['aksi']){
		case "create":
			echo '<a href="index.php"> &laquo; Home</a>';
			createdata($koneksi);
			break;
		case "read":
			readdata($koneksi);
			break;
		case "update":
			updatedata($koneksi);
			readdata($koneksi);
			break;
		case "delete":
			deletedata($koneksi);
			break;
		default:
			echo "<h3>Aksi <i>".$_GET['aksi']."</i> tidak ada!</h3>";
			createdata($koneksi);
			readdata($koneksi);
	}
} else {
	createdata($koneksi);
	readdata($koneksi);
}
?>
        </div>

        <div id="sidebar">
		<h3 style="	color: black;
					text-align: center;"><b>Big Promo!!<br> <a> </a></b>
		
		</h3>

		<table border = "2" cellpadding = "10" align = "center" style="text-align: center;">
        <tr>
            <td>    
                <a> 
                    <img src="images/mob1.jpg" alt="Image" height="150" width="210" style = "display : block; margin : auto;"><br>
                    Toyota Agya
                </a>
            </td>
        </tr>

        <tr>
            <td>    
                <a> 
                    <img src="images/mob2.png" alt="Image" height="150" width="210" style = "display : block; margin : auto;"><br>
                    Daihatsu Ayla
                </a>
            </td>
        </tr>
		<tr>
            <td>    
                <a> 
                    <img src="images/mob3.jpg" alt="Image" height="150" width="210" style = "display : block; margin : auto;"><br>
                   Honda Brio
                </a>
            </td>
        </tr>
      
    	</table>
		</div>

        <footer>
            <p>
                <b>&copy; AMobil</b>
                			<br>
                
            </p>
        </footer>
    </div>

</body>
</html>