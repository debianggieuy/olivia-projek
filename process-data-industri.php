<?php

include("connection.php");

if (isset($_POST["simpan_data_industri"])) {
    # Process to insert new data
    if (isset($_POST["id_pengusaha"], $_POST["nama_pengusha"], $_POST["no_telepon"],$_POST["alamat_pengusaha"],$_POST["kapasitas_produksi"])) {
        $id_pengusaha = $_POST["id_pengusaha"];
        $nama_pengusaha = $_POST["nama_pengusaha"];
        $no_telepon = $_POST["no_telepon"];
        $alamat_pengusaha = $_POST["alamat_pengusaha"];
        $kapasitas_produksi = $_POST["kapasitas__produksi"];

        // Create a prepared statement to insert data into the 'user' table
        $sql = "INSERT INTO daftar_industri (id_pengusaha,nama_pengusaha,no_telepon, alamat_pengusaha,kapasitas_produksi) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($connect, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $id_pengusaha, $nama_pengusaha, $no_telepon, $alamat_pengusaha,$kapasitas__produksi);
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to the list-user page
                header("location:list-data-industri.php");
                exit; // Make sure to exit after redirection
            } else {
                echo "Error executing the statement: " . mysqli_error($connect);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing the statement: " . mysqli_error($connect);
        }
    }
}

// ... (The rest of your code)
?>


