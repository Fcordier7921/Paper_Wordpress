<?php /* Template Name: page d'accueil */ ?>

<?php get_header(); ?>

<div class="contenu col-12 col-md-7">
  <div>
    <div class="titletrait mt-5">
      <h6 class="title">LATEST <span>WORK</span></h6>
      <div class="trait">
        <hr>
      </div>
    </div>
    <div class="row">
      <?php
      $palnel = get_field("images");

      for ($i = 0; $i < count($palnel); $i++) {
        echo "<div class = 'col-12 col-md-3 my-2'>";
        echo "<img src ='" . $palnel[$i]['images']["sizes"]["thumbnail"] . "' class='img-fluid' />";
        echo "</div>";
      }
      ?>
    </div>
  </div>
  <div>
    <div class="titletrait mt-5">
      <h6 class="title">ABOUT <span>PAPER</span></h6>
      <div class="trait">
        <hr>
      </div>
    </div>
    <div class="about">
      <?php
      $about = get_field("about");
      echo "<p>$about</p>"
      ?>

    </div>
    <div class="col-12">
      <?php $slide= get_field("slide");
      ?>
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        
        <ol class="carousel-indicators">
          <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
          <?php for ($i = 1; $i < count($slide); $i++) {
            echo '<li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$i.'"></li>';
         }?>

        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="<?php $slide[0]["image"]["sizes"]["2048x2048"];?>" class="d-block w-100"
              alt="<?php $slide[0]["ertrerter"];?>">
          </div>
          <?php for ($i = 1; $i < count($slide); $i++) {
            echo '<div class="carousel-item">
          <img src="'.$slide[$i]["image"]["sizes"]["2048x2048"].'" class="d-block w-100" alt="'.$slide[$i]["ertrerter"].'">';
          }
          ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </a>
      </div>
    </div>


    <div>
    <div class="titletrait mt-5">
      <h6 class="title2">THIS IS AN <span>AWESOME DESIGN</span></h6>
      <div class="trait">
        <hr>
      </div>
    </div>
    <div class="col-12 col-md-6 design">
      <?php
      $design = get_field("design");
      var_dump($design);
      ?>

    </div>
  </div>
</div>


<?php get_footer(); ?>