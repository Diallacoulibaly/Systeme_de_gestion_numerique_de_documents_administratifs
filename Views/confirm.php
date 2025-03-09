<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de l'email</title>
    <link rel="stylesheet" href="path/to/sweetalert.css">
</head>

<body>

    <?php
    if (isset($_SESSION['success'])) {
        echo "<script>swal('Succès', '" . $_SESSION['success'] . "', 'success');</script>";
        unset($_SESSION['success']);
    } elseif (isset($_SESSION['error'])) {
        echo "<script>swal('Erreur', '" . $_SESSION['error'] . "', 'error');</script>";
        unset($_SESSION['error']);
    }
    ?>

    <script src="path/to/sweetalert.min.js"></script>
</body>

</html>