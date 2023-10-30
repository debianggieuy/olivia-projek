<?php

include("connection.php");

if (isset($_POST["simpan_user"])) {
    # Process to insert new data
    if (isset($_POST["id_user"], $_POST["username"], $_POST["no_telepon"])) {
        $id_user = $_POST["id_user"];
        $username = $_POST["username"];
        $no_telepon = $_POST["no_telepon"];

        // Create a prepared statement to insert data into the 'user' table
        $sql = "INSERT INTO user (id_user, username, no_telepon) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($connect, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $id_user, $username, $no_telepon);
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to the list-user page
                header("location:list-user.php");
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


