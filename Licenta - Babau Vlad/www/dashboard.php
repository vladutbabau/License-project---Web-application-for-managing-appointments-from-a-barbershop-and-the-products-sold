<?php

include 'connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
  header('location:admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Panou de control</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="admin_login.css">

</head>
<body>

<?php include 'admin_header.php'; ?>

<section class="dashboard">

   <h1 class="heading">Panou de control</h1>

   <div class="box-container">

      <div class="box">
         <h3>Bine ai venit!</h3>
         <p><?= $fetch_profile['nume']; ?></p>
         <a href="update_profile.php" class="btn">Modifica profil</a>
      </div>

      <div class="box">
         <?php
            $total_pendings = 0;
            $select_pendings = $conn->prepare("SELECT * FROM `comenzi` WHERE status_plata = ?");
            $select_pendings->execute(['in curs']);
            if($select_pendings->rowCount() > 0){
               while($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)){
                  $total_pendings += $fetch_pendings['total_pret'];
               }
            }
         ?>
         <h3><span></span><?= $total_pendings; ?><span> lei</span></h3>
         <p>Comenzi in asteptare</p>
         <a href="placed_orders.php" class="btn">Vezi comenzile in asteptare</a>
      </div>

      <div class="box">
         <?php
            $total_completes = 0;
            $select_completes = $conn->prepare("SELECT * FROM `comenzi` WHERE status_plata = ?");
            $select_completes->execute(['completa']);
            if($select_completes->rowCount() > 0){
               while($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)){
                  $total_completes += $fetch_completes['total_pret'];
               }
            }
         ?>
         <h3><span></span><?= $total_completes; ?><span> lei</span></h3>
         <p>Comenzi complete</p>
         <a href="placed_orders.php" class="btn">Vezi comenzile complete</a>
      </div>

      <div class="box">
         <?php
            $select_orders = $conn->prepare("SELECT * FROM `comenzi`");
            $select_orders->execute();
            $number_of_orders = $select_orders->rowCount();
         ?>
         <h3><?= $number_of_orders; ?></h3>
         <p>Comenzi plasate</p>
         <a href="placed_orders.php" class="btn">Vezi comenzile plasate</a>
      </div>

      <div class="box">
         <?php
            $select_products = $conn->prepare("SELECT * FROM `produse`");
            $select_products->execute();
            $number_of_products = $select_products->rowCount();
         ?>
         <h3><?= $number_of_products; ?></h3>
         <p>Produse adaugate</p>
         <a href="products.php" class="btn">Vezi produsele adaugate</a>
      </div>

      <div class="box">
         <?php
            $select_users = $conn->prepare("SELECT * FROM `utilizatori`");
            $select_users->execute();
            $number_of_users = $select_users->rowCount();
         ?>
         <h3><?= $number_of_users; ?></h3>
         <p>Conturi utilizatori</p>
         <a href="users_accounts.php" class="btn">Vezi conturile utilizatorilor</a>
      </div>

      <div class="box">
         <?php
            $select_admins = $conn->prepare("SELECT * FROM `admins`");
            $select_admins->execute();
            $number_of_admins = $select_admins->rowCount();
         ?>
         <h3><?= $number_of_admins; ?></h3>
         <p>Conturi admini</p>
         <a href="admin_accounts.php" class="btn">Vezi conturile administratorilor</a>
      </div>
         
      <div class="box">
                  <?php
                     $select_programari = $conn->prepare("SELECT * FROM `programari`");
                     $select_programari->execute();
                     $number_of_programari = $select_programari->rowCount();
                  ?>
                  <h3><?= $number_of_programari; ?></h3>
                  <p>Programări in așteptare</p>
                  <a href="programari.php" class="btn">Vezi toate programările</a>
      </div>

      <div class="box">
         <?php
            $select_messages = $conn->prepare("SELECT * FROM `mesaje`");
            $select_messages->execute();
            $number_of_messages = $select_messages->rowCount();
         ?>
         <h3><?= $number_of_messages; ?></h3>
         <p>Mesaje noi</p>
         <a href="messagess.php" class="btn">Vezi mesaje</a>
      </div>

      

   </div>

</section>
<script src="admin_script.js"></script>
   
</body>
</html>