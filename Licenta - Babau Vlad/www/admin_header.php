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

      <a href="dashboard.php" class="logo">Administrator<span>Panel</span></a>

      <nav class="navbar">
         <a href="dashboard.php">Acasă</a>
         <a href="products.php">Produse</a>
         <a href="placed_orders.php">Comenzi</a>
         <a href="programari.php">Programări</a>
         <a href="messages.php">Mesaje</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <a href="produse.php" id="site-btn" class="fa-solid fa-eye">Vezi magazin</a>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile['nume']; ?></p>
         <a href="update_profile.php" class="btn">Modifica profil</a>
         <div class="flex-btn">
            <a href="register_admin.php" class="option-btn">Inregistrare</a>
            <a href="admin_login.php" class="option-btn">Logare</a>
         </div>
         <a href="admin_logout.php" class="delete-btn" onclick="return confirm('Esti sigur ca vrei sa te deloghezi?');">Delogare</a> 
      </div>

   </section>

</header>