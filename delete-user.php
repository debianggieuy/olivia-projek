<?php
include './connection.php';

$id_user = $_GET['id_user'];

$sql = "DELETE FROM user  WHERE id_user = '" . $id_user . "'";

$result = mysqli_query($connect, $sql);

if ($result) {
    header('Location: list-user.php');
} else {
    printf('Gagal ya ' . mysqli_error($connect));
    exit();
}
?>
