<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    <title>Data Detail Mahasiswa</title>
    </head>
    <body>
    <section>
        <div class="header">
            <button class="backbutton" name="backhome" style="margin-bottom:10px;"><a href="index.php"><span style="color: #FFFFFF;text-decoration: none;">Back</span></a></button>
        </div>
    </section>
        <div class="welcome" style="text-align:center; margin-top:30px;">
            <h1>Daftar Detail Mahasiswa</h1>        
            <a href="create.php"><button type="button">Tambah Data</button></a>
            <a href="search.php"><button type="button">Pencarian Data</button></a>
        </div>
        <table border="1" id="tabel1" class="table" style="justify-content: center;align-items: center;">
            <thead>
                <tr>
                    <th data-column="id" data-order="desc">#ID</th>
                    <th data-column="nama" data-order="desc">
                        Nama
                    </th>
                    <th data-column="prodi" data-order="desc">
                        Program Studi
                    </th>
                    <th data-column="semester" data-order="desc">
                        Semester
                    </th>
                    <th data-column="kelas" data-order="desc">
                        Kelas
                    </th>
                    <th data-column="tahun_angkatan" data-order="desc">
                        Tahun Angkatan
                    </th>
                    <th data-column="nim" data-order="desc">
                        Nomor Induk Mahasiswa
                    </th>
                    <th data-column="alamat" data-order="desc">
                        Alamat
                    </th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>
                        #ID
                    </th>
                    <th>
                        Nama
                    </th>
                    <th>
                        Program Studi
                    </th>
                    <th>
                        Semester
                    </th>
                    <th>
                        Kelas
                    </th>
                    <th>
                        Tahun Angkatan
                    </th>
                    <th>
                        Nomor Induk Mahasiswa
                    </th>
                    <th>
                        Alamat
                    </th>
                </tr>
            </tfoot>
            <!-- Perulangan Untuk Menampilkan Semua Data yang ada di Variable Data -->
            <script>
                $('th').on('click', function(){
                    var column = $(this).data('column')
                    var order = $(this).data('order')
                    hasil = column + " " + order
                    if(order == 'desc'){
                        $(this).data('order', "asc")
                    }
                    else if(order == "asc"){
                        $(this).data('order', "desc")
                    }
                    document.cookie= "hasil =" + hasil;
                    location.reload();
                    return false;
                    console.log(hasil)
                })
            </script>
            <?php
            // Buat prepared statement untuk mengambil semua data dari tbBiodata
            if (!isset($_COOKIE['hasil'])){
                $urutan = "id asc";
            }else{
                $urutan = $_COOKIE['hasil'];
            }
            echo $urutan;
            $query = $db->prepare("SELECT * FROM datamaha ORDER BY $urutan");
            $query = $db->prepare("SELECT * FROM datadetail INNER JOIN datamaha ON datadetail.nim=datamaha.nim");
            // Jalankan perintah SQL
            $query->execute();
            // Ambil semua data dan masukkan ke variable $data
            $data = $query->fetchAll();
            
            ?>

            <tbody>
            <?php foreach ($data as $value): ?>                
                <tr>
                    <td>
                        <?php echo $value['id'] ?>
                    </td>
                    <td>
                        <?php echo $value['nama'] ?>
                    </td>
                    <td>
                        <?php echo $value['prodi'] ?>
                    </td>
                    <td>
                        <?php echo $value['semester'] ?>
                    </td>
                    <td>
                        <?php echo $value['kelas'] ?>
                    </td>
                    <td>
                        <?php echo $value['tahun_angkatan'] ?>
                    </td>
                    <td>
                        <?php echo $value['nim'] ?>
                    </td>
                    <td>
                        <?php echo $value['alamat'] ?>
                    </td>
                    <td>
                        <a href="edit.php?id=<?php echo $value['id']?>"><button type="button">Edit</button></a>
                        <a href="#>" onclick="return confirm('Yakin untuk dihapus ?  maaf tombol deletenya blm jadi'); " ><button type="button">Delete</button></a>      
                        <!-- fungsi deletenya blm jadi qwq                   -->
                        <!-- <a href="delete.php?id=<?php echo $value['id']?>nim=<?php echo $value=['nim']?>" onclick="return confirm('Yakin untuk dihapus ?'); " ><button type="button">Delete</button></a> -->
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>
