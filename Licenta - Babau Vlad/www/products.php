<?php

include 'connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['add_product'])){

   $name = $_POST['nume'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['pret'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $details = $_POST['details'];
   $details = filter_var($details, FILTER_SANITIZE_STRING);

   $image_01 = $_FILES['imagine_1']['name'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['imagine_1']['size'];
   $image_tmp_name_01 = $_FILES['imagine_1']['tmp_name'];
   $image_folder_01 = 'Imaginiadaugate'.$image_01;

   $select_products = $conn->prepare("SELECT * FROM `produse` WHERE nume = ?");
   $select_products->execute([$name]);

   if($select_products->rowCount() > 0){
      $message[] = 'Numele produsului deja exista!';
   }else{

      $insert_products = $conn->prepare("INSERT INTO `produse`(nume, detalii, pret, imagine_1) VALUES(?,?,?,?)");
      $insert_products->execute([$name, $details, $price, $image_01]);

      if($insert_products){
         if($image_size_01 > 2000000){
            $message[] = 'Dimensiunea imaginii este mult prea mare!';
         }else{
            move_uploaded_file($image_tmp_name_01, $image_folder_01);
            $message[] = 'A fost adaugat un produs nou!';
         }

      }

   }  

};

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_product_image = $conn->prepare("SELECT * FROM `produse` WHERE id = ?");
   $delete_product_image->execute([$delete_id]);
   $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
   unlink('Imaginiadaugate'.$fetch_delete_image['imagine_1']);
   $delete_product = $conn->prepare("DELETE FROM `produse` WHERE id = ?");
   $delete_product->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM `cos` WHERE pid = ?");
   $delete_cart->execute([$delete_id]);
   $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE pid = ?");
   $delete_wishlist->execute([$delete_id]);
   header('location:products.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Produse</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="admin_login.css">

</head>
<body>

<?php include 'admin_header.php'; ?>

<section class="add-products">

   <h1 class="heading">Adaugă produse</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <span>Nume produs(obligatoriu)</span>
            <input type="text" class="box" required maxlength="100" placeholder="Introdu numele produsului" name="nume">
         </div>
         <div class="inputBox">
            <span>Preț produs(obligatoriu)</span>
            <input type="number" min="0" class="box" required max="9999999999" placeholder="Introdu pretul produsului" onkeypress="if(this.value.length == 10) return false;" name="pret">
         </div>
        <div class="inputBox">
            <span>Imagine(obligatoriu)</span>
            <input type="file" name="imagine_1" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
         <div class="inputBox">
            <span>Detalii produs</span>
            <textarea name="details" placeholder="Introdu detalii produs" class="box" required maxlength="500" cols="30" rows="10"></textarea>
         </div>
      </div>
      
      <input type="submit" value="Adauga produs" class="btn" name="add_product">
   </form>

</section>

<section class="show-products">

   <h1 class="heading">Produse adaugate</h1>

   <div class="box-container">

   <?php
      $select_products = $conn->prepare("SELECT * FROM `produse`");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <div class="box">
      <img src="Imaginiadaugate<?= $fetch_products['imagine_1']; ?>" alt="">
      <div class="nume"><?= $fetch_products['nume']; ?></div>
      <div class="pret"><span><?= $fetch_products['pret']; ?></span> lei</div>
      <div class="detalii"><span><?= $fetch_products['detalii']; ?></span></div>
      <div class="flex-btn">
         <a href="update_product.php?update=<?= $fetch_products['id']; ?>" class="option-btn">Modifica</a>
         <a href="products.php?delete=<?= $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('Stergi produsul?');">Sterge</a>
      </div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">Niciun produs nu a fost adaugat!</p>';
      }
   ?>
   
   </div>

</section>

<script src="admin_script.js"></script>
   
</body>
</html>