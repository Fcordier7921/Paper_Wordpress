</div><!--div de la classe row dans la header-->
</div><!--div du container dans la header-->
<footer id="footer" class="container-fluid" style="background-color: gray;">
	
</footer>

<?php wp_footer(); ?>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
</body>
</html>