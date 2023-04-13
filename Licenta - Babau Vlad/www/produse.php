<?php

include 'connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="produse.css">

</head>
<body>
   
<?php include 'user_header.php'; ?>

<div class="home-bg">

<section class="home">

   <div class="swiper home-slider">
   
   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <div class="image">
            <img src="imagini/accesoriiifrizerie.jpg" alt="">
         </div>
         <div class="content">
            <span>Reduceri de până la 50%</span>
            <h3>Cele mai noi accesorii pentru frizeria ta!</h3>
            <a href="magazin.php" class="btn">Către magazin</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="Imagini/scauncopil.jpg" alt="">
         </div>
         <div class="content">
            <span>Cel mai frumos accesoriu pentru frizeria ta!</span>
            <h3>Scaun destinat copiilor</h3>
            <a href="magazin.php" class="btn">Către magazin</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="Imagini/grataresipamatufuri.jpg" alt="">
         </div>
         <div class="content">
            <span>Grătare și pămătufuri la prețuri avantajoase</span>
            <h3>Nu folosi consumabilele mai mult decât este necesar</h3>
            <a href="magazin.php" class="btn">Către magazin</a>
         </div>
      </div>

   </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

</div>

<section class="category">

   <h1 class="heading">Caută după categorie</h1>

   <div class="swiper category-slider">

   <div class="swiper-wrapper">

   <a href="category.php?category=foarfeca" class="swiper-slide slide">
      <img src="Imagini/foarfecaa.png" alt="">
      <h3>Foarfeci</h3>
   </a>

   <a href="category.php?category=masina" class="swiper-slide slide">
      <img src="Imagini/masinadetuns.png" alt="">
      <h3>Mașini de tuns</h3>
   </a>

   <a href="category.php?category=gratar" class="swiper-slide slide">
      <img src="Imagini/gratare.png" alt="">
      <h3>Grătare</h3>
   </a>

   <a href="category.php?category=Scaun" class="swiper-slide slide">
      <img src="Imagini/scaun-frizer.png" alt="">
      <h3>Scaune frizerie</h3>
   </a>

   <a href="category.php?category=ingrijire" class="swiper-slide slide">
      <img src="Imagini/spray.png" alt="">
      <h3>Îngrijire păr</h3>
   </a>

   <a href="category.php?category=feon" class="swiper-slide slide">
      <img src="Imagini/feon.png" alt="">
      <h3>Feon</h3>
   </a>

   <a href="category.php?category=barbierit" class="swiper-slide slide">
      <img src="Imagini/barba.png" alt="">
      <h3>Bărbierit</h3>
   </a>

   <a href="category.php?category=accesorii" class="swiper-slide slide">
      <img src="Imagini/accesoriifrizerie.png" alt="">
      <h3>Accesorii frizerie</h3>
   </a>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>

<section class="home-products">

   <h1 class="heading">Ultimele produse adaugate</h1>

   <div class="swiper products-slider">

   <div class="swiper-wrapper">

   <?php
     $select_products = $conn->prepare("SELECT * FROM `produse` LIMIT 6"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="nume" value="<?= $fetch_product['nume']; ?>">
      <input type="hidden" name="pret" value="<?= $fetch_product['pret']; ?>">
      <input type="hidden" name="imagine" value="<?= $fetch_product['imagine_1']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
      <img src="Imaginiadaugate<?= $fetch_product['imagine_1']; ?>" alt="">
      <div class="name"><?= $fetch_product['nume']; ?></div>
      <div class="flex">
         <div class="pret"><span></span><?= $fetch_product['pret']; ?><span> lei</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="Adaugă în coș" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">Nu ai adăugat niciun produs încă!</p>';
   }
   ?>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="script.js"></script>

<script>

var swiper = new Swiper(".home-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});

 var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});

var swiper = new Swiper(".products-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>