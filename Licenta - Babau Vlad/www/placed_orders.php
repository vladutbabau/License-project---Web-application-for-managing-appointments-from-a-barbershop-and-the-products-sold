<?php

include 'connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_POST['status_plata'])){
   $order_id = $_POST['user_id'];
   $payment_status = $_POST['status_plata'];
   $payment_status = filter_var($payment_status, FILTER_SANITIZE_STRING);
   $update_payment = $conn->prepare("UPDATE `comenzi` SET status_plata = ? WHERE id = ?");
   $update_payment->execute([$payment_status, $order_id]);
   $message[] = 'payment status updated!';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_order = $conn->prepare("DELETE FROM `comenzi` WHERE id = ?");
   $delete_order->execute([$delete_id]);
   header('location:placed_orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>placed orders</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="admin_login.css">

</head>
<body>

<?php include 'admin_header.php'; ?>

<section class="orders">

<h1 class="heading">Comandă nefinalizată</h1>

<div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT * FROM `comenzi`");
      $select_orders->execute();
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p> plasata la: <span><?= $fetch_orders['plasata_la']; ?></span> </p>
      <p> nume: <span><?= $fetch_orders['nume']; ?></span> </p>
      <p> numar: <span><?= $fetch_orders['numar']; ?></span> </p>
      <p> adresa: <span><?= $fetch_orders['adresa']; ?></span> </p>
      <p> total produse: <span><?= $fetch_orders['total_produse']; ?></span> </p>
      <p> Pret total: <span>$<?= $fetch_orders['total_pret']; ?>/-</span> </p>
      <p> Metoda de plata: <span><?= $fetch_orders['metoda']; ?></span> </p>
      <form action="" method="post">
         <input type="hidden" name="user_id" value="<?= $fetch_orders['id']; ?>">
         <select name="status_plata" class="select">
            <option selected disabled><?= $fetch_orders['status_plata']; ?></option>
            <option value="in curs">in curs</option>
            <option value="completa">completa</option>
         </select>
        <div class="flex-btn">
         <input type="submit" value="update" class="option-btn" name="update_payment">
         <a href="placed_orders.php?delete=<?= $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('Stergi aceasta comanda?');">Sterge</a>
        </div>
      </form>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">Nu a fost creată nicio comandă momentan!</p>';
      }
   ?>

</div>

</section>

<script src="admin_script.js"></script>
   
</body>
</html>