<?php

include("connection.php");

if (isset($_POST["simpan_faktor"])) {
    # Process to insert new data
    if (isset($_POST["id_faktor"], $_POST["suhu"], $_POST["intensitas_cahaya"],$_POST["kelembapan_tanah"],$_POST["curah_hujan"],$_POST["ph_tanah"],$_POST["ketinggian _tanah"] )) {
        $id_faktor = $_POST["id_faktor"];
        $suhu = $_POST["suhu"];
        $intensitas_cahaya = $_POST["intensitas_cahaya"];
        $kelembapan_tanah = $_POST["kelembapan_tanah"];
        $curah_hujan = $_POST["curah_hujan"];
        $ph_tanah = $_POST["ph_tanah"];
        $ketinggian_tanah= $_POST["ketinggian_tanah"];
        
        // Create a prepared statement to insert data into the 'user' table
        $sql = "INSERT INTO faktor_mempengaruhi__tanaman (id_faktor, suhu, intensitas_cahaya ,kelembapan_tanah, curah_hujan ,ph_tanah,ketinggian_tanah) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($connect, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $id_faktor, $suhu, $intensitas_cahaya, $kelembapan_tanah, $ph_tanah,$ketinggian_tanah);
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to the list-user page
                header("location:list-faktor.php");
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


