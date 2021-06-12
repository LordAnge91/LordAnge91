<?php 
   session_start();
?>

<?php
   include_once 'mainElement/nav.php'
?>


   
    

<!-- Slideshow container --><div class="fitbox">
<div class="slideshow-container slideinfo ">
   <img class="backCarousel" src="pictures/Carousel/background2.jpg">
<!--<picture class="backCarousel" >
      <source media="(max-width: 400px)" srcset="pictures/Carousel/back400.jpg" width="100vw">
      <source media="(max-width: 600px)" srcset="pictures/Carousel/back600.jpg" width="100vw">
      <source media="(max-width: 800px)" srcset="pictures/Carousel/back800.jpg" width="100vw">
      <source media="(max-width: 1200px)" srcset="pictures/Carousel/back1200.jpg" width="100vw">
      <source media="(max-width: 1600px)" srcset="pictures/Carousel/back1600.jpg" width="100vw">
      <source media="(max-width: 1920px)" srcset="pictures/Carousel/background2.jpg" width="100vw">
      <img src="pictures/Carousel/background2.jpg">
   </picture>-->

  <!-- Full-width images with number and caption text -->
  <div class="mySlides translateMotion">
    <div class="numbertext numbertextZ">Per un sapore originale</div>
    <img class="fade" src="pictures/Carousel/Cola_amer.png" alt="immagine nummero 1 del slideshow" width="100%">
  </div>

  <div class="mySlides translateMotion">
    <div class="numbertext"></div>
    <img class="fade" src="pictures/Carousel/shopping.jpg" alt="immagine nummero 2 del slideshow" width="100%">
  </div>

  <div class="mySlides translateMotion">
    <div class="numbertext"></div>
    <img class="fade" src="pictures/Carousel/supermarket.jpg" alt="immagine nummero 3 del slideshow" width="100%">
  </div>

  <div class="mySlides translateMotion">
    <div class="numbertext">Fai la spesa in ogni momento</div>
    <img class="fade" src="pictures/Carousel/shelf.jpg" alt="immagine nummero 4 del slideshow" width="100%">
  </div>


</div>
</div>

   
<div class="homeFlex translateMotion2">
<div class="hsn translateMotion2">
<h2>Frutta e Verdura</h2><h2><a class="green" href="1/Frutta&Verdura/Frutta_&_Verdura.php">vai alla pagina</a></h2>
</div><div class="homeShower">
   
   <div style="transform: translateX(0px);" class="showFlex translateMotion2">
   </div>

   <div class='scrollBack'>
      <img class="scrollArrow" src="pictures/angle-arrow-down_icon-icons.com_73683.png">
   </div>

   <div class='scrollFoward'>
      <img class="scrollArrow" src="pictures/angle-arrow-down_icon-icons.com_73683.png">
   </div>
   

</div></div>

<div class="homeFlex translateMotion2">
<div class="hsn">
<h2 class=" blue">Bibite Gassate</h2><h2><a class="blue" href="1/Bevande/Bibite/Gassate.php">vai alla pagina</a></h2>
</div><div class="homeShower">
   
   <div style="transform: translateX(0%);" class="showFlex translateMotion2">
   </div>

   <div class='scrollBack'>
      <img class="scrollArrow" src="pictures/angle-arrow-down_icon-icons.com_73683.png">
   </div>

   <div class='scrollFoward'>
      <img class="scrollArrow" src="pictures/angle-arrow-down_icon-icons.com_73683.png">
   </div>
   

</div></div>

<div class="homeFlex translateMotion2">
<div class="hsn">
<h2 class=" red">Offerte</h2><h2><a class="red" href="1/Speciali/Offerta.php">vai alla pagina</a></h2>
</div>
<div class="homeShower">
   
   <div style="transform: translateX(0%);" class="showFlex translateMotion2">
   </div>

   <div class='scrollBack'>
      <img class="scrollArrow" src="pictures/angle-arrow-down_icon-icons.com_73683.png">
   </div>

   <div class='scrollFoward'>
      <img class="scrollArrow" src="pictures/angle-arrow-down_icon-icons.com_73683.png">
   </div>
   

</div></div>












<?php
include_once 'mainElement/footer.php'
?>


<script src="JS/menu.js"></script>
<script src="JS/SearchBar.js"></script>
<script src="JS/Cart0i.js"></script>
<script src="JS/homeShow1.js"></script>
<script src="JS/homeShow2.js"></script>
<script src="JS/homeShow3.js"></script>

<script type="text/javascript">



var slideIndex = 0;
showSlides(slideIndex);


// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "flex";
  setTimeout(showSlides, 4000); // Change image every 5 seconds
}


</script>

   </body>