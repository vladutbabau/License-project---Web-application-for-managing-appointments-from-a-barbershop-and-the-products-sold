<?php

include 'connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_message = $conn->prepare("DELETE FROM `mesaje` WHERE id = ?");
   $delete_message->execute([$delete_id]);
   header('location:messages.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mesaje</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="admin_login.css">

</head>
<body>

<?php include 'admin_header.php'; ?>

<section class="contacts">

<h1 class="heading">Mesaje</h1>

<div class="box-container">

   <?php
      $select_messages = $conn->prepare("SELECT * FROM `mesaje`");
      $select_messages->execute();
      if($select_messages->rowCount() > 0){
         while($fetch_message = $select_messages->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
   <p> ID Utilizator: <span><?= $fetch_message['user_id']; ?></span></p>
   <p> Nume: <span><?= $fetch_message['nume']; ?></span></p>
   <p> Email: <span><?= $fetch_message['email']; ?></span></p>
   <p> Număr de telefon: <span><?= $fetch_message['numar']; ?></span></p>
   <p> Mesaj: <span><?= $fetch_message['mesaj']; ?></span></p>
   <a href="messages.php?delete=<?= $fetch_message['id']; ?>" onclick="return confirm('delete this message?');" class="delete-btn">Sterge</a>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">Nu ai primit niciun mesaj</p>';
      }
   ?>

</div>

</section>

<script src="admin_script.js"></script>
   
</body>
</html>