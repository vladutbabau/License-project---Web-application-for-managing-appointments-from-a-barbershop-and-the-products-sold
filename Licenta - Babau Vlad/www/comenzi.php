<?php

include 'connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Comanda</title>
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="produse.css">

</head>
<body>
   
<?php include 'user_header.php'; ?>

<section class="orders">

   <h1 class="heading">Comenzile tale</h1>

   <div class="box-container">

   <?php
      if($user_id == ''){
         echo '<p class="empty">Te rog intră în cont pentru a putea comanda</p>';
      }else{
         $select_orders = $conn->prepare("SELECT * FROM `comenzi` WHERE user_id = ?");
         $select_orders->execute([$user_id]);
         if($select_orders->rowCount() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p>Plasată în data de: <span><?= $fetch_orders['plasata_la']; ?></span></p>
      <p>Nume: <span><?= $fetch_orders['nume']; ?></span></p>
      <p>Email: <span><?= $fetch_orders['email']; ?></span></p>
      <p>Număr: <span><?= $fetch_orders['numar']; ?></span></p>
      <p>Adresă: <span><?= $fetch_orders['adresa']; ?></span></p>
      <p>Metodă de plată: <span><?= $fetch_orders['metoda']; ?></span></p>
      <p>Comanda ta: <span><?= $fetch_orders['total_produse']; ?></span></p>
      <p>Preț: <span>$<?= $fetch_orders['total_pret']; ?>/-</span></p>
      <p>Status comandă(În curs de livrare/Livrată): <span style="color:<?php if($fetch_orders['status_plata'] == 'in curs'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['status_plata']; ?></span> </p>
   </div>
   <?php
      }
      }else{
         echo '<p class="empty">Nu ai nicio comanda activa</p>';
      }
      }
   ?>

   </div>

</section>

<script src="script.js"></script>

</body>
</html>