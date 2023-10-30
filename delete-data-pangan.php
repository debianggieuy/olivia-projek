<<?php
include './connection.php';

$id_jenis_bahan_pangan = $_GET['id_jenis_bahan_pangan']; // Correct the variable name to match the GET parameter

$sql = "DELETE FROM data_pangan WHERE id_jenis_bahan_pangan = '" . $id_jenis_bahan_pangan . "'";

$result = mysqli_query($connect, $sql);

if ($result) {
    header('Location: list-data-pangan.php');
    exit(); // Add exit() to prevent further execution
} else {
    printf('Gagal ya: ' . mysqli_error($connect)); // Correct the error message format
    exit(); // Add exit() to prevent further execution
}
?>