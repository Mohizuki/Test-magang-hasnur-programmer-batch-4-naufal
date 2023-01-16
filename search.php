<?php
    require_once "db.php";
    require_once "User.php";
    
    // Buat object user
    $user = new User($db);
    // Jika belum login
    if(!$user->isLoggedIn()){
        header("location: login.php"); //Redirect ke halaman login
    }
    // Ambil data user saat ini
    $currentUser = $user->getUser();
    
    //===============
?>
<!DOCTYPE html>
<html>
    <head>
    <style>
        .container{
            width: 45%;
            position: absolute;
        }
        .header{
            display: flex;
            justify-content: space-between;
            background-color: #ABBEED;
            padding: 0 60px;
            top: 0;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="simpan.css">
    <title>Data Mahasiswa Section</title>
    </head>
    <body>
	<section>
        <div class="header">
            <button class="backbutton" name="backhome" style="margin-bottom:10px;"><a href="index.php"><span style="color: #FFFFFF;text-decoration: none;">Back</span></a></button>
        </div>
    </section>
	<div class="welcome" style="text-align:center;">
			<h3>Selamat datang <font color="red"><?php echo $currentUser['nama'] ?></font> di</h3>
            <h1>Page Pencarian</h1>     
			<h4>Silahkan masukkan nama atau program studi yang ingin dicari</h4>   
            <hr />
	</div>
		<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="margin-left:43%;">
			<input type="text" name="q" placeholder="Masukkan nama" value="<?php if (isset($_GET['q'])){ echo $_GET['q']; } ?>"/>	
		</form>
    </body>
</html>
<?php
 
 if (isset($_GET['q'])){
    $q = $_GET['q'];     
    $query = "SElECT * FROM datamaha INNER JOIN datadetail ON datadetail.nim=datamaha.nim WHERE nama LIKE :q OR prodi LIKE :q";    
    $q = "%".$q."%"; ////tambahkan tanda persen pada variabel $q     
    $stmt = $db->prepare($query); //persiapkan query    
    $stmt->bindParam(':q', $q); //isi nilai :q dari $q               
    $stmt->execute(); //eksekusi query   
    $jml = $stmt->rowCount(); //cek jumlah data hasil query
     
	if ($jml>0){ //jika ada data tampilkan
	 	echo "<table border=\"1\" class=\"table\" style=\"margin-top:30px;\">
	 			<tr>
	 			  	<th>Id</th>
	 			  	<th>Nama</th>
	 			  	<th>Program Studi</th>
	 			  	<th>Semester</th>
				   	<th>Kelas</th>
					<th>Tahun Angkatan</th>
					<th>Nomor Induk Mahasiswa</th>
					<th>Alamat</th>
	 			</tr>";
		
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         extract($row); //ganti $row['field'] menjadi {$field}
	 	 echo "<tr>
					<td>{$id}</td>
					<td>{$nama}</td>
					<td>{$prodi}</td>
					<td>{$semester}</td>
					<td>{$kelas}</td>
					<td>{$tahun_angkatan}</td>
					<td>{$nim}</td>
					<td>{$alamat}</td>
	 			</tr>";	
		}
		echo "</table>"; 		
	} else {
		echo "Pencarian <b>$_GET[q]</b> tidak ditemukan";
	}
 }
?>
