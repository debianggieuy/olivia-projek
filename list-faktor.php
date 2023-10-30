<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR FAKTOR</title>
    <link rel="stylesheet" href="css/bootstarap.min.css">
</head>
<body>
<?php include("home.php"); ?>
<div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="text-white text-center">DATA FAKTOR</h4>
            </div>

            <div class="card-body">
                <!--kotak pencarian data user-->
                <form action="list-faktor.php" method="get">
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
                        $sql = "select * from faktor_mempengaruhi__tanaman where id_faktor like '%$search%'
                        or suhu like '%$search%'
                        or intensitas_cahaya like '%$search%'
                        or kelembapan_tanah like '%$search%'
                        or curah_hujan like '%$search%'
                        or ph_tanah like '%$search%' 
                        or ketinggian_tanah ' '%$search%'";
                       
                    }else{
                        $sql = "select * from faktor_mempengaruhi__tanaman";
                    } 

                    //eksekusi perintah sql
                   
                    $query = mysqli_query ($connect, $sql);
                    while($faktor_mempengaruhi__tanaman = mysqli_fetch_array($query)) { ?>
                    

                    <li class="list-group-item">
                        <div class="row">
                            
                            <div class="col-lg-8 col-md-10">
                                <h6>ID FAKTOR : <?php echo $faktor_mempengaruhi__tanaman["id_faktor"] ?></h6>
                                <h6>SUHU:<?php echo $faktor_mempengaruhi__tanaman["suhu"]?></h6>
                                <h6>INTENSITAS CAHAYA: <?php echo $faktor_mempengaruhi__tanaman["intensitas_cahaya"] ?></h6>
                                <h6>KELEMBAPAN TANAH:<?php echo $faktor_mempengaruhi__tanaman["kelembapan_tanah"]?></h6>
                                <h6>CURAH HUJAN:<?php echo $faktor_mempengaruhi__tanaman["curah_hujan"]?></h6>
                                <h6>PH TANAH:<?php echo $faktor_mempengaruhi__tanaman["ph_tanah"]?></h6>
                                <h6>KETINGGIAN TANAH:<?php echo $faktor_mempengaruhi__tanaman["ketinggian_tanah"]?></h6>
                                
                                

                            <!--bagian tombol-->
                            <div class="col-lg-4 col-md-2">
                            <a href="form-faktor.php?id_faktor=<?=$faktor_mempengaruhi__tanaman["id_faktor"]?>">
                                <button class="btn btn-info btn-block">
                                    EDIT
                                </button>
                                </a>
                                <div class="card-footer">
                                    <a href="delete-faktor.php?id_faktor=<?=$faktor_mempengaruhi__tanaman["id_faktor"]?>"
                                    onClick="return confirm('Apakah Anda Yakin?')">
                                </div>
                                <button class="btn btn-block btn-warning">
                                    HAPUS
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
                <a href="form-faktor.php">
                    <button class="btn btn-success">TAMBAH DATA</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>