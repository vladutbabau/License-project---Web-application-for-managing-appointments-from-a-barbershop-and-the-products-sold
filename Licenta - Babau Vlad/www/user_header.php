<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<header class="header">

   <section class="flex">

      <a href="index.php" class="logo">Atelierul<span> de tuns</span></a>

      <nav class="navbar">
         <a href="produse.php">Acasa</a>
         <a href="produse.php">Produse</a>
         <a href="comenzi.php">Comenzi</a>
         <a href="magazin.php">Magazin</a>
         <a href="contact.php">Contact</a>
      </nav>

      <div class="icons">
         <?php
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
            $total_wishlist_counts = $count_wishlist_items->rowCount();

            $count_cart_items = $conn->prepare("SELECT * FROM `cos` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_counts = $count_cart_items->rowCount();
         ?>
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="search_page.php"><i class="fas fa-search"></i></a>
         <a href="wishlist.php"><i class="fas fa-heart"></i><span>(<?= $total_wishlist_counts; ?>)</span></a>
         <a href="cos.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_counts; ?>)</span></a>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php          
            $select_profile = $conn->prepare("SELECT * FROM `utilizatori` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile["nume"]; ?></p>
         <a href="update_user.php" class="btn">Modifica profil</a>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">Inregistrare</a>
            <a href="user_login.php" class="option-btn">Logare</a>
         </div>
         <a href="user_logout.php" class="delete-btn" onclick="return confirm('Te deloghezi?');">Delogare</a> 
         <?php
            }else{
         ?>
         <p>Va rugam sa va logati sau sa va inregistrati</p>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">Inregistrare</a>
            <a href="user_login.php" class="option-btn">Logare</a>
         </div>
         <?php
            }
         ?>      
         
         
      </div>

   </section>

</header>