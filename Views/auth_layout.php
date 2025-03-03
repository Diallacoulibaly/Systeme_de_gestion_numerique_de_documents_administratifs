<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

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
<<<<<<< HEAD
    <link rel="stylesheet" href="public/assets/css/style.css">

</head>

<body class="login" style="background-image: url(public/assets/images/inbox.png);">
=======

    <!-- Pour le nouveau style -->
    <link href="public/assets/build/css/style.css" rel="stylesheet">
</head>

<body class="login" style="background-image: url(public/assets/images/denim.jpg);">
>>>>>>> 6e7aacee603d3fe8571515d56dfd0b703b33ab48
    <?php
    // Afficher dynamiquement la vue demandée
    if (isset($page)) {
        require "Views/$page.php";
    } else {
        echo "<p>Page introuvable.</p>";
    }
    ?>

</body>

</html>