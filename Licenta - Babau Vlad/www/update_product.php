<?php

include 'connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_POST['update'])){

   $pid = $_POST['pid'];
   $name = $_POST['nume'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['pret'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $details = $_POST['details'];
   $details = filter_var($details, FILTER_SANITIZE_STRING);

   $update_product = $conn->prepare("UPDATE `produse` SET nume = ?, pret = ?, detalii = ? WHERE id = ?");
   $update_product->execute([$name, $price, $details, $pid]);

   $message[] = 'Produsul a fost actualizat cu succes!';

   $old_image_01 = $_POST['old_image_01'];
   $image_01 = $_FILES['image_01']['name'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image_01']['size'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
   $image_folder_01 = 'Imaginiupgradate'.$image_01;

   if(!empty($image_01)){
      if($image_size_01 > 2000000){
         $message[] = 'Dimensiunea imaginii este prea mare!';
      }else{
         $update_image_01 = $conn->prepare("UPDATE `produse` SET imagine_1 = ? WHERE id = ?");
         $update_image_01->execute([$image_01, $pid]);
         move_uploaded_file($image_tmp_name_01, $image_folder_01);
         unlink('Imaginiupgradate'.$old_image_01);
         $message[] = 'imaginea 1 a fost actualizata cu succes!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Modifica produs</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="admin_login.css">

</head>
<body>

<?php include 'admin_header.php'; ?>

<section class="update-product">

   <h1 class="heading">Actualizare produs</h1>

   <?php
      $update_id = $_GET['update'];
      $select_products = $conn->prepare("SELECT * FROM `produse` WHERE id = ?");
      $select_products->execute([$update_id]);
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
      <input type="hidden" name="old_image_01" value="<?= $fetch_products['imagine_1']; ?>">
      <div class="image-container">
         <div class="main-image">
            <img src="Imaginiadaugate<?= $fetch_products['imagine_1']; ?>" alt="">
         </div>
      </div>
      <span>Modifica nume</span>
      <input type="text" name="nume" required class="box" maxlength="100" placeholder="Introdu numele produsului" value="<?= $fetch_products['nume']; ?>">
      <span>Modifica pret</span>
      <input type="number" name="pret" required class="box" min="0" max="9999999999" placeholder="Introdu pretul produsului" onkeypress="if(this.value.length == 10) return false;" value="<?= $fetch_products['pret']; ?>">
      <span>Modifica detalii</span>
      <textarea name="details" class="box" required cols="30" rows="10"><?= $fetch_products['detalii']; ?></textarea>
      <span>Adauga alta imagine</span>
      <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      <div class="flex-btn">
         <input type="submit" name="update" class="btn" value="Modifica">
         <a href="products.php" class="option-btn">Inapoi</a>
      </div>
   </form>
   
   <?php
         }
      }else{
         echo '<p class="empty">Niciun produs gasit!</p>';
      }
   ?>

</section>












<script src="admin_script.js"></script>
   
</body>
</html>