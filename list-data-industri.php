<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR DATA INDUSTRI</title>
    <link rel="stylesheet" href="css/bootstarap.min.css">
</head>
<body>
<?php include("home.php"); ?>
<div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="text-white text-center">DATA INDUSTRI </h4>
            </div>

            <div class="card-body">
                <!--kotak pencarian data user-->
                <form action="list-data-industri.php" method="get">
                    <input type="text" name="search" 
                    class="form-control mb-2"
                    placeholder="Masukkan Keyword" required/>
                </form>
                <ul class="list-group">
                    <?php
                    include("connection.php");
                    if (isset($_GET["search"])) {
                        # jika pada saat load halaman ini
                        # akan mengecek apakah ada data dengan method 
                        # get yang bernama search

                        $search = $_GET["search"];
                        $sql = "select * from daftar_industri where id_pengusaha like '%$search%'
                        or nama_pengusaha like '%$search%'
                        or no_telepon like '%$search%'
                        or alamat_pengusaha like '%$search%'
                        or kapasitas_produksi '%$search%'";
                    }else{
                        $sql = "select * from daftar_industri";
                    }

                    //eksekusi perintah sql
                    $query = mysqli_query ($connect, $sql);
                    while($daftar_industri = mysqli_fetch_array($query)) { ?>

                    <li class="list-group-item">
                        <div class="row">
                            
                            <div class="col-lg-8 col-md-10">
                                <h6>ID PENGUSAHA: <?php echo $daftar_industri["id_pengusaha"] ?></h6>
                                <h6>NAMA PENGUSAHA:<?php echo $daftar_industri["nama_pengusaha"]?></h6>
                                <h6>NO TELEPON: <?php echo $daftar_industri["no_telepon"] ?></h6>
                                <h6>ALAMAT PENGUSAHA: <?php echo $daftar_industri["alamat_pengusaha"] ?></h6>
                                <h6>KAPASITAS PRODUKSI: <?php echo $daftar_industri["kapasitas_produksi"] ?></h6>

                               
                            <!--bagian tombol-->
                            <div class="col-lg-4 col-md-2">
                            <a href="form-data-pangan.php?id_pengusaha=<?=$daftar_industri["id_pengusaha"]?>">
                                <button class="btn btn-info btn-block">
                                    EDIT
                                </button>
                                </a>
                                <div class="card-footer">
                                    <a href="delete-data-pangan.php?id_pengusaha=<?=$daftar_industri["id_pengusaha"]?>"
                                    onClick="return confirm('Apakah Anda Yakin?')">
                                </div>
                                <div class="card-footer">
                               <a href="form-data-industri.php">
                                 <button class="btn btn-success">HAPUS</button>
                                
                                </button>
                                    </a>
                            </div>
                        </div>
                    </li>
                    <?php
                    }
                    ?>
                    
                </ul>
            </div>

            <div class="card-footer">
                <a href="form-data-industri.php">
                    <button class="btn btn-success">TAMBAH DATA</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>