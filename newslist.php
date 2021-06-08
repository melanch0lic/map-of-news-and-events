<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="vendor/bootstrap-5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/bootstrap-icons-1.4.0/dist/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/newslist.css">
        <link rel="stylesheet" href="assets/css/button.css">

    <title>Лента Новостей</title>
  </head>
  <body?>
    <?php
    require_once("header.php");
    ?>
    <div class="list-group list-group-flush border-bottom scrollarea scroll-y-newslist">
      <?php
      require_once("parser.php");
      ?>
    </div>
 </body>