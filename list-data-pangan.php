<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR USER</title>
    <link rel="stylesheet" href="css/bootstarap.min.css">
</head>
<body>
<?php include("home.php"); ?>
<div class="container">
    <div class="card">
        <div class="card-header bg-info">
            <h4 class="text-white text-center">DATA PANGAN</h4>
        </div>

        <div class="card-body">
            <!--kotak pencarian data user-->
            <form action="list-data-pangan.php" method="get">
                <input type="text" name="search" class="form-control mb-2" placeholder="Masukkan Keyword" required/>
            </form>
            <ul class="list-group">
                <?php
                include("connection.php");
                if (isset($_GET["search"])) {
                    # jika pada saat load halaman ini
                    # akan mengecek apakah ada data dengan method 
                    # get yang bernama search

                    $search = $_GET["search"];
                    $sql = "select * from data_pangan where id_jenis_bahan_pangan like '%$search%'
                    or jenis_bahan_pangan like '%$search%'
                    or nama_bahan_pangan '%$search%'";
                } else {
                    $sql = "select * from data_pangan";
                }

                //eksekusi perintah sql
                $query = mysqli_query($connect, $sql);
                while ($data_pangan = mysqli_fetch_array($query)) { ?>

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-lg-8 col-md-10">
                                <h6>ID : <?php echo $data_pangan["id_jenis_bahan_pangan"] ?></h6>
                                <h6>JENIS BAHAN PANGAN: <?php echo $data_pangan["jenis_bahan_pangan"] ?></h6>
                                <h6>NAMA BAHAN PANGAN: <?php echo $data_pangan["nama_bahan_pangan"] ?></h6>
                            </div>
                            <!--bagian tombol-->
                            <div class="col-lg-4 col-md-2">
                                <a href="form-data-pangan.php?id_jenis_bahan_pangan=<?=$data_pangan["id_jenis_bahan_pangan"]?>">
                                    <button class="btn btn-info btn-block">
                                        EDIT
                                    </button>
                                </a>
                                <div class="card-footer">
                                    <a href="delete-data-pangan.php?id_jenis_bahan_pangan=<?=$data_pangan["id_jenis_bahan_pangan"]?>" onClick="return confirm('Apakah Anda Yakin?')">
                                    </div>
                                    <button class="btn btn-block btn-warning">
                                        HAPUS
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </li>
                <?php } ?>
            </ul>
        </div>

        <div class="card-footer">
            <a href="form-data-pangan.php">
                <button class="btn btn-success">TAMBAH DATA</button>
            </a>
        </div>
    </div>
</div>
</body>
</html>
