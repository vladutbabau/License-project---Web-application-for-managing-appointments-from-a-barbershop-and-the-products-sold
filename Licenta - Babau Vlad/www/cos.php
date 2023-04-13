<?php

include 'connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:user_login.php');
};

if(isset($_POST['delete'])){
   $cart_id = $_POST['cart_id'];
   $delete_cart_item = $conn->prepare("DELETE FROM `cos` WHERE id = ?");
   $delete_cart_item->execute([$cart_id]);
}

if(isset($_GET['delete_all'])){
   $delete_cart_item = $conn->prepare("DELETE FROM `cos` WHERE user_id = ?");
   $delete_cart_item->execute([$user_id]);
   header('location:cos.php');
}

if(isset($_POST['update_qty'])){
   $cart_id = $_POST['cart_id'];
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);
   $update_qty = $conn->prepare("UPDATE `cos` SET cantitate = ? WHERE id = ?");
   $update_qty->execute([$qty, $cart_id]);
   $message[] = 'A fost modificata cantitatea din cos';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cos de cumparaturi</title>
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="produse.css">

</head>
<body>
   
<?php include 'user_header.php'; ?>

<section class="products shopping-cart">

   <h3 class="heading">Cos de cumparaturi</h3>

   <div class="box-container">

   <?php
      $grand_total = 0;
      $select_cart = $conn->prepare("SELECT * FROM `cos` WHERE user_id = ?");
      $select_cart->execute([$user_id]);
      if($select_cart->rowCount() > 0){
         while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">
      <a href="quick_view.php?pid=<?= $fetch_cart['pid']; ?>" class="fas fa-eye"></a>
      <img src="Imaginiadaugate<?= $fetch_cart['imagine']; ?>" alt="">
      <div class="name"><?= $fetch_cart['nume']; ?></div>
      <div class="flex">
         <div class="price"><?= $fetch_cart['pret']; ?> lei</div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="<?= $fetch_cart['cantitate']; ?>">
         <button type="submit" class="fas fa-edit" name="update_qty"></button>
      </div>
      <div class="sub-total">Sub total: <span><?= $sub_total = ($fetch_cart['pret'] * $fetch_cart['cantitate']); ?> lei</span> </div>
      <input type="submit" value="delete item" onclick="return confirm('Stergi acest produs din cos?');" class="delete-btn" name="delete">
   </form>
   <?php
   $grand_total += $sub_total;
      }
   }else{
      echo '<p class="empty">Cosul tau de cumparaturi este gol</p>';
   }
   ?>
   </div>

   <div class="cart-total">
      <p>Total de plata: <span><?= $grand_total; ?> lei</span></p>
      <a href="magazin.php" class="option-btn">Continua cumparaturile</a>
      <a href="cos.php?delete_all" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('Doresti sa stergi toate produsele din cos?');">delete all item</a>
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
   </div>

</section>



<script src="script.js"></script>

</body>
</html>