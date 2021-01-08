<?php /* Template Name: page d'accueil */ ?>

<?php get_header(); ?>

<div class="contenu col-12 col-md-8">
  <div>
    <div class="titletrait my-4">
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
    <div class="titletrait my-4">
      <h6 class="title">ABOUT <span>PAPER</span></h6>
      <div class="trait">
        <hr>
      </div>
    </div>
    <div class="about col-12">
      <?php
      $about = get_field("about");
      echo "<p>$about</p>"
      ?>

    </div>
    <div class="mt-5">
      <?php $slide= get_field("slide");
       ?>
      <!-- Slideshow container -->
      <div class="slideshow-container">
        <?php
        for ($i = 0; $i < count($slide); $i++) {
          $o=1;
          $result=$i+$o;
        echo '<div class="mySlides fade">';
        echo '<div class="numbertext">'.$result.' / '.count($slide).'</div>';
        echo '<img src="'.$slide[$i]["image"]["sizes"]["2048x2048"].'" style="width:100%" alt="'.$slide[$i]["ertrerter"].'">';
        echo '<div class="text">'.$slide[$i]["ertrerter"].'</div>';
        echo '</div>';
      }?>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>
      <br>

      <!-- The dots/circles -->
      <div style="text-align:right">
        <?php
      for ($i = 0; $i < count($slide); $i++) {
        echo '<span class="dot" onclick="currentSlide('.$i.')"></span>';
      }?>
      </div>
    </div>
  </div>

  <div>
    <div class="titletrait my-5">
      <h6 class="title2">THIS IS AN <span>AWESOME DESIGN</span></h6>
      <div class="trait">
        <hr>
      </div>
    </div>
    <div class="row col-12   design">
      <?php $design = get_field("design"); 
        $designUp= get_field("design_important");
        $designSuit= get_field("designsuit");?>
      <div class="col-12  ">
        <?php echo "<p>$design<br><span>$designUp</span><br>$designSuit</p>"?>
      </div>
    </div>
  </div>
  <div class="col-12 my-5">
    <?php $avis=get_field("avis");?>
    
    
      <div class="col-12 avis">
      <h6 class="m-5">THIS IS AN AWESOME DESIGN <span>CALL TO ACTION</span></h6>
      <p class="m-5">" <?php echo $avis[0]["text_avis"];?> "</p>
      
  </div>

</div>


<?php get_footer(); ?>