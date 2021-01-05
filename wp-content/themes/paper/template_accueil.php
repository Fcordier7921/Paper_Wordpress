<?php /* Template Name: page d'accueil */ ?>

<?php get_header(); ?>

<div class="contenu col-12 col-md-7">
  <div>
  <div class="titletrait mt-5">
    <h5 class="title">LATEST <span>WORK</span></h5>
    <div class="trait"><hr></div>
  </div>
  <div class="row">
  <?php
  $palnel=get_field( "images" );

  for ($i=0; $i < count($palnel) ; $i++) {
    echo "<div class = 'col-12 col-md-3 my-2'>";
    echo "<img src ='".$palnel[$i]['images']["sizes"]["thumbnail"]."' class='img-fluid' />";
    echo "<p>".$palnel[$i]['non']."</p>";
    echo "</div>";
    }
  ?>
  </div>
</div>
</div>


<?php get_footer(); ?>