<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>




<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IDocsMali </title>

    <!-- Bootstrap -->
    <link href="public/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="public/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="public/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="public/assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="public/assets/build/css/custom.min.css" rel="stylesheet">

    <!--  <link rel="stylesheet" type="text/css" href="public/assets/css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="public/assets/build/css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image" href="public/assets/images/favicon.png">


</head>

<body
    style="background-image:url(public/assets/images/back.jpg); background-size: cover; background-attachment: fixed;">
    <?php
    // Afficher dynamiquement la vue demandée
    if (isset($page)) {
        require "Views/$page.php";
    } else {
        echo "<p>Page introuvable.</p>";
    }
    ?>



    <?php if (isset($_SESSION['error'])): ?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?php echo $_SESSION['error']; ?>'
    });
    </script>
    <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Succès !',
        text: '<?php echo $_SESSION['success']; ?>'
    });
    </script>
    <?php unset($_SESSION['success']); ?>
    <?php endif; ?>
</body>

</html>