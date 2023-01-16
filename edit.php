<?php
    require_once "db.php";
    require_once "User.php";
    
    // Buat object user
    $user = new User($db);
    // Jika belum login
    if(!$user->isLoggedIn()){
        header("location: error.php"); //Redirect ke halaman login
    }
    // Ambil data user saat ini
    $currentUser = $user->getUser();
    
    //===============

    if(!isset($_GET['id'])){
        die("Error: ID Tidak Dimasukkan");
    }

    //Ambil data
    $query = $db->prepare("SELECT * FROM datadetail INNER JOIN datamaha ON datadetail.nim=datamaha.nim WHERE id = :id");
    $query->bindParam(":id", $_GET['id']);
    // Jalankan perintah sql
    $query->execute();
    if($query->rowCount() == 0){
        // Tidak ada hasil
        die("Error: ID Tidak Ditemukan");
    }else{
        // ID Ditemukan, Ambil data
        $data = $query->fetch();
    }


    if(isset($_POST['submit'])){
        $nama = htmlentities($_POST['nama']);
        $prodi = htmlentities($_POST['prodi']);
        $semester = htmlentities($_POST['semester']);
        $kelas = htmlentities($_POST['kelas']);
        $tahun_angkatan = htmlentities($_POST['tahun_angkatan']);
        $nim = htmlentities($_POST['nim']);
        $alamat = htmlentities($_POST['alamat']);


        $sql = "UPDATE datamaha SET 
        nama = '$nama',
        prodi = '$prodi',
        semester = '$semester',
        kelas =  '$kelas',
        tahun_angkatan = '$tahun_angkatan' WHERE id = $_GET[id]";
        $query = mysqli_query($koneksi, $sql);
        if($query==1){


            //banyak sekali experiment qwq
            // $sql1 = mysqli_query($koneksi, "UPDATE datadetail(`nim`, `alamat`) SET ('{$_POST['nim']}', '{$_POST['alamat']}')");
            $sql1 = "UPDATE datadetail SET 
            alamat = '$alamat' where nim = '$nim'";
            $query = mysqli_query($koneksi, $sql1);
                // $verify = mysqli_query($koneksi, "SELECT * FROM 'datadetail' WHERE 'nim' = $nim ");
                // if(mysqli_num_rows($verify)>0){
                //     $row=mysqli_fetch_array($verify);
                //     $nama = $row['nama'];
    
    
    
                // }
                // $sql1 = "UPDATE datadetail(`nim`, `alamat`) SET ('{$_POST['nim']}', '{$_POST['alamat']}')";
                // $query = mysqli_query($koneksi, $sql1);
            }

        //bekas experiment qwq
        // // Simpan data yang di inputkan ke POST ke masing-masing variable
        // // dan convert semua tag HTML yang mungkin dimasukkan untuk mengindari XSS
        // $nama = htmlentities($_POST['nama']);
        // $prodi = htmlentities($_POST['prodi']);
        // $semester = htmlentities($_POST['semester']);
        // $kelas = htmlentities($_POST['kelas']);
        // $tahun_angkatan = htmlentities($_POST['tahun_angkatan']);
        // $kelas = htmlentities($_POST['kelas']);
        // $tahun_angkatan = htmlentities($_POST['tahun_angkatan']);

        // // Prepared statement untuk mengubah data
        // $query = $db->prepare("UPDATE `datamaha` SET `nama`=:nama,`prodi`=:prodi,`semester`=:semester, `kelas`=:kelas, `tahun_angkatan`=:tahun_angkatan WHERE id=:id");
        // $query->bindParam(":nama", $nama);
        // $query->bindParam(":prodi", $prodi);
        // $query->bindParam(":semester", $semester);
        // $query->bindParam(":kelas", $kelas);
        // $query->bindParam(":tahun_angkatan", $tahun_angkatan);
        // $query->bindParam(":id", $_GET['id']);
        // // Jalankan perintah SQL
        // $query->execute();
        // // Alihkan ke index.php
        header("location: detailmaha.php");
    }
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
            <h1>Page Edit</h1>     
			<h4>Silahkan mengedit/mengupdate data yang ada</h4>   
            <hr />
	</div>
        <form method="post" style="margin-left:40%;">
            Nama:<br> <input required type="text" name="nama" placeholder="Nama" value="<?php echo $data['nama'] ?>"/> <br>
            Program Studi:<br> <input required type="text" name="prodi" placeholder="Program Studi" value="<?php echo $data['prodi'] ?>"/> <br>
            Semester:<br> <input required type="text" name="semester" placeholder="Semester" value="<?php echo $data['semester'] ?>"/> <br>
            Kelas:<br> <input required type="text" name="kelas" placeholder="Kelas" value="<?php echo $data['kelas'] ?>"/> <br>
            Tahun Angkatan:<br> <input required type="text" name="tahun_angkatan" placeholder="Tahun Angkatan" value="<?php echo $data['tahun_angkatan'] ?>"/> <br>
            Alamat :<br> <input required type="text" name="alamat" placeholder="Alamat" value="<?php echo $data['alamat'] ?>"/> <br>
            <input type="submit" name="submit" />
        </form>
    </body>
</html>
