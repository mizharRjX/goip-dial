<!doctype html>
<html lang="en" data-bs-theme="dark">
<?php $localhost = "http://localhost/dial/"; // "http://localhost/dial/"; //http://192.168.1.10/~mizhar ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $ip_no . $page; ?>-Dial Pad</title>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">-->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
    <link rel="apple-touch-icon" sizes="180x180" href="./favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon_io/favicon-16x16.png">
    <link rel="manifest" href="./favicon_io/site.webmanifest">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css" />
    <link href="<?php echo $localhost; ?>includes/assets/css/myn.css" rel="stylesheet" />

    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
        integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<?php
error_reporting(0);
include("includes/functions.php"); ?>

<body data-mdb-theme="dark">