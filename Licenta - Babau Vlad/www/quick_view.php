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
   <title>Vizualizare produs</title>
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="produse.css">

</head>
<body>
   
<?php include 'user_header.php'; ?>

<section class="quick-view">

   <h1 class="heading">Vizualizare produs</h1>

   <?php
     $pid = $_GET['pid'];
     $select_products = $conn->prepare("SELECT * FROM `produse` WHERE id = ?"); 
     $select_products->execute([$pid]);
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['nume']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['pret']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['imagine_1']; ?>">
      <div class="row">
         <div class="image-container">
            <div class="main-image">
               <img src="Imaginiadaugate<?= $fetch_product['imagine_1']; ?>" alt="">
            </div>
            <div class="sub-image">
               <img src="Imaginiadaugate<?= $fetch_product['imagine_1']; ?>" alt="">
            </div>
         </div>
         <div class="content">
            <div class="name"><?= $fetch_product['nume']; ?></div>
            <div class="flex">
               <div class="price"><span></span><?= $fetch_product['pret']; ?><span> lei</span></div>
               <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
            </div>
            <div class="details"><?= $fetch_product['detalii']; ?></div>
            <div class="flex-btn">
               <input type="submit" value="Adaugă în coș" class="btn" name="add_to_cart">
               <input class="option-btn" type="submit" name="add_to_wishlist" value="Adaugă în wishlist">
            </div>
         </div>
      </div>
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">Nu a fost selectat niciun produs!</p>';
   }
   ?>

</section>




<script src="script.js"></script>

</body>
</html>