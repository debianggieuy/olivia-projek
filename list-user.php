<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR USER</title>
    <link rel="stylesheet" href="css/bootstarap.min.css">
</head>
<body>
<?php include("home.php"); ?>
<div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="text-white text-center">DATA USER</h4>
            </div>

            <div class="card-body">
                <!--kotak pencarian data user-->
                <form action="list-user.php" method="get">
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
                        $sql = "select * from user where id_user like '%$search%'
                        or username like '%$search%'
                        or no_telepon '%$search%'";
                    }else{
                        $sql = "select * from user";
                    }

                    //eksekusi perintah sql
                    $query = mysqli_query ($connect, $sql);
                    while($user = mysqli_fetch_array($query)) { ?>

                    <li class="list-group-item">
                        <div class="row">
                            
                            <div class="col-lg-8 col-md-10">
                                <h6>ID : <?php echo $user["id_user"] ?></h6>
                                <h6>USERNAME:<?php echo $user["username"]?></h6>
                                <h6>NO TELEPON: <?php echo $user["no_telepon"] ?></h6>
                               
                            <!--bagian tombol-->
                            <div class="col-lg-4 col-md-2">
                            <a href="form-user.php?id_user=<?=$user["id_user"]?>">
                                <button class="btn btn-info btn-block">
                                    EDIT
                                </button>
                                </a>
                                <div class="card-footer">
                                    <a href="delete-user.php?id_user=<?=$user["id_user"]?>"
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
                <a href="form-user.php">
                    <button class="btn btn-success">TAMBAH DATA</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>