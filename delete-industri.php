<?php
include './connection.php';

$id_pengusaha = $_GET['id_pengusaha']; // Correct the variable name to match the GET parameter

$sql = "DELETE FROM daftar_industri WHERE id_pengusaha = '" . $id_pengusaha . "'";

$result = mysqli_query($connect, $sql);

if ($result) {
    header('Location: list-data-industri.php');
    exit(); // Add exit() to prevent further execution
} else {
    printf('Gagal ya: ' . mysqli_error($connect)); // Correct the error message format
    exit(); // Add exit() to prevent further execution
}
?>
