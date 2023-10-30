<?php

include("connection.php");

if (isset($_POST["simpan_data_pangan"])) {
    # Process to insert new data
    if (isset($_POST["id_jenis_bahan_pangan"], $_POST["jenis_bahan_pangan"], $_POST["nama_bahan_pangan"])) {
        $id_jenis_bahan_pangan = $_POST["id_jenis_bahan_pangan"];
        $jenis_bahan_pangan = $_POST["jenis_bahan_pangan"];
        $nama_bahan_pangan = $_POST["nama_bahan_pangan"];

        // Create a prepared statement to insert data into the 'user' table
        $sql = "INSERT INTO data_pangan (id_jenis_bahan_pangan, jenis_bahan_pangan, nama_bahan_pangan) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($connect, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $id_jenis_bahan_pangan, $jenis_bahan_pangan, $nama_bahan_pangan);
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to the list-user page
                header("location:list-data-pangan.php");
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


