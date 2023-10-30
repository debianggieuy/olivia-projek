<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM DATA PANGAN</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="list-data-pangan.php"> FOOD MAPPING PROGRAM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
    <a class="nav-item nav-link active" href="list-data-industri.php"> DATA INDUSTRI <span class="sr-only">(current)</span></a>
    <a class="nav-item nav-link active" href="list-data-pangan.php"> DATA BAHAN PANGAN <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="list-faktor.php"> FAKTOR <span class="sr-only">(current)</span></a>
    

      </li>      
    </ul>
  </div>
</nav>
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="text-white">FORM DATA PANGAN</h4>
            </div>

            <div class="card-body">
                <?php
                if(isset($_GET["id_jenis_bahan_pangan"])){
                    // memeriksa ketika load file ini,
                    // apakah membawa data GET dengan nama id_user
                    // jika ture, maka form anggota digunakan untuk edit

                    # mengakses data anggota dari id_member yg dikirim
                    include "connection.php";
                    $id_jenis_bahan_pangan = $_GET["id_jenis_bahan_pangan"];
                    $sql = "select * from data_pangan where id_jenis_bahan_pangan='$id_jenis_bahan_pangan'";
                    // eksekusiperintah SQL
                    $hasil = mysqli_query($connect, $sql);
                    # konversi hasil query ke bentuk array
                    $data_pangan = mysqli_fetch_array($hasil);
                    ?>
                    <form action="process-data-pangan.php" method="post">

                       ID JENIS BAHAN PANGAN
                        <input type="text" name="id_jenis_bahan_pangan"
                        class="form-control mb-2" required
                        value="<?=$data_pangan["id_jenis_bahan_pangan"];?>" readonly>
    
                        JENIS BAHAN PANGAN
                        <input type="text" name="nama_bahan_pangan"
                        class="form-control mb-2" required
                        value="<?=$data_pangan["nama_bahan_pangan"];?>">


                        NAMA BAHAN PANGAN
                        <input type="text" name="nama_bahan_pangan"
                        class="form-control mb-2" required
                        value="<?=$data_pangan["nama_bahan_pangan"];?>">
                       

                    <button type="submit" class="btn btn-success btn-block"
                    name="edit_data_pangan">
                        SIMPAN
                    </button>
                    </form>
                    <?php
                }else{

                    // jika false, maka form user digunakan untuk insert
                    ?>
                    <form action="process-data-pangan.php" method="post">


                    ID JENIS BAHAN PANGAN
                    <input type="text" name="id_jenis_bahan_pangan" 
                    class="form-control mb-2" required />

                    JENIS BAHAN PANGAN
                    <input type="text" name="jenis_bahan_pangan" 
                    class="form-control mb-2" required />

                    NAMA BAHAN PANGAN
                    <input type="text" name="nama_bahan_pangan" 
                    class="form-control mb-2" required />


                    <button type="submit"
                    class="btn btn-warning btn-block"
                    name="simpan_data_pangan">
                        SIMPAN
                    </button>
                    </form>
                    <?php
                }
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>
