<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM USER</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="list-user.php"> FOOD MAPPING PROGRAM</a>
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
                <h4 class="text-white">FORM USER</h4>
            </div>

            <div class="card-body">
                <?php
                if(isset($_GET["id_user"])){
                    // memeriksa ketika load file ini,
                    // apakah membawa data GET dengan nama id_user
                    // jika ture, maka form anggota digunakan untuk edit

                    # mengakses data anggota dari id_member yg dikirim
                    include "connection.php";
                    $id_user = $_GET["id_user"];
                    $sql = "select * from user where id_user='$id_user'";
                    // eksekusiperintah SQL
                    $hasil = mysqli_query($connect, $sql);
                    # konversi hasil query ke bentuk array
                    $user = mysqli_fetch_array($hasil);
                    ?>
                    <form action="process-user.php" method="post">

                       ID USER
                        <input type="text" name="id_user"
                        class="form-control mb-2" required
                        value="<?=$user["id_user"];?>" readonly>
    
                        USERNAME
                        <input type="text" name="username"
                        class="form-control mb-2" required
                        value="<?=$user["username"];?>">


                        NO TELEPON
                        <input type="text" name="no_telepon"
                        class="form-control mb-2" required
                        value="<?=$user["no_telepon"];?>">
                       

                    <button type="submit" class="btn btn-success btn-block"
                    name="edit_user">
                        SIMPAN
                    </button>
                    </form>
                    <?php
                }else{

                    // jika false, maka form user digunakan untuk insert
                    ?>
                    <form action="process-user.php" method="post">


                    ID USER
                    <input type="text" name="id_user" 
                    class="form-control mb-2" required />

                    USERNAME
                    <input type="text" name="username" 
                    class="form-control mb-2" required />

                    NO TELEPON
                    <input type="text" name="no_telepon" 
                    class="form-control mb-2" required />


                    <button type="submit"
                    class="btn btn-warning btn-block"
                    name="simpan_user">
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
