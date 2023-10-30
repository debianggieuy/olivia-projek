<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM FAKTOR</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="list-faktor.php"> FOOD MAPPING PROGRAM</a>
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
                <h4 class="text-white">FORM FAKTOR</h4>
            </div>

            <div class="card-body">
                <?php
                if(isset($_GET["id_faktor"])){
                    // memeriksa ketika load file ini,
                    // apakah membawa data GET dengan nama id_user
                    // jika ture, maka form anggota digunakan untuk edit

                    # mengakses data anggota dari id_member yg dikirim
                    include "connection.php";
                    $id_faktor = $_GET["id_faktor"];
                    $sql = "select * from user where id_faktor='$id_faktor'";
                    // eksekusiperintah SQL
                    $hasil = mysqli_query($connect, $sql);
                    # konversi hasil query ke bentuk array
                    $user = mysqli_fetch_array($hasil);
                    ?>
                    <form action="process-faktor.php" method="post">

                        ID FAKTOR
                        <input type="text" name="id_faktor"
                        class="form-control mb-2" required
                        value="<?=$faktor_mempengaruhi__tanaman["id_faktor"];?>" readonly>
    
                        SUHU
                        <input type="text" name="suhu"
                        class="form-control mb-2" required
                        value="<?=$faktor_mempengaruhi__tanaman["suhu"];?>">


                        INTENSITAS CAHAYA
                        <input type="text" name="intensitas_cahaya"
                        class="form-control mb-2" required
                        value="<?=$faktor_mempengaruhi__tanaman["intensitas_cahaya"];?>">

                        KELEMBAPAN TANAH
                        <input type="text" name="kelembapan_tanah"
                        class="form-control mb-2" required
                        value="<?=$faktor_mempengaruhi__tanaman["kelembapan_tanah"];?>">

                       
                        CURAH HUJAN
                        <input type="text" name="curah_hujan"
                        class="form-control mb-2" required
                        value="<?=$faktor_mempengaruhi__tanaman ["curah_hujan"];?>">

                      
                        PH TANAH
                        <input type="text" name="ph_tanah"
                        class="form-control mb-2" required
                        value="<?=$faktor_mempengaruhi__tanaman ["ph_tanah"];?>">

                         
                        KETINGGIAN TANAH
                        <input type="text" name="ketinggian_tanah"
                        class="form-control mb-2" required
                        value="<?=$faktor_mempengaruhi__tanaman ["ketinggian_tanah"];?>">

                        

                      
                    <button type="submit" class="btn btn-success btn-block"
                    name="edit_faktor_mempengaruhi__tanaman">
                        SIMPAN
                    </button>
                    </form>
                    <?php
                }else{

                    // jika false, maka form user digunakan untuk insert
                    ?>
                    <form action="process-faktor.php" method="post">


                    ID FAKTOR
                    <input type="text" name="id_faktor" 
                    class="form-control mb-2" required />

                    SUHU
                    <input type="text" name="suhu" 
                    class="form-control mb-2" required />

                    INTENSITAS CAHAYA
                    <input type="text" name="intensitas_cahaya" 
                    class="form-control mb-2" required />

                    KELEMBAPAN TANAH
                    <input type="text" name="kelembapan_tanah" 
                    class="form-control mb-2" required />

                    CURAH HUJAN
                    <input type="text" name="curah_hujan" 
                    class="form-control mb-2" required />
                    
                    PH TANAH
                    <input type="text" name="ph_tanah" 
                    class="form-control mb-2" required />


                    
                    


                    <button type="submit"
                    class="btn btn-warning btn-block"
                    name="simpan_faktor_mempengaruhi__tanaman">
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
