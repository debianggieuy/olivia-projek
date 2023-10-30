<?php
include './connection.php';

$id_faktor = $_GET['id_faktor']; // Correct the variable name to match the GET parameter

$sql = "DELETE FROM faktor_mempengaruhi__tanaman WHERE id_faktor = '" . $id_faktor . "'";

$result = mysqli_query($connect, $sql);

if ($result) {
    header('Location: list-faktor.php');
    exit(); // Add exit() to prevent further execution
} else {
    printf('Gagal ya: ' . mysqli_error($connect)); // Correct the error message format
    exit(); // Add exit() to prevent further execution
}
?>