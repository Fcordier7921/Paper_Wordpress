<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri();?>">
  <title>Hello, world! this paper</title>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class=" navit d-flex col-12 col-md-3 mx-auto" style="background-color: #ebebeb;">
        <a class="logo" href="#"><img src="/wp-content/themes/paper/images/Sans-titre-1.png" alt=""></a>
        <div id="myLinks">
        <?php
         wp_nav_menu(['theme_location' => 'menuheader']);
         ?>
         
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="foot" id="foot">
        <?php
         wp_nav_menu(['theme_location' => 'menufooter']);
         ?>
         </div>
        </div>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <img src="/wp-content/themes/paper/images/burger.png" alt="">
        </a>
      </div>