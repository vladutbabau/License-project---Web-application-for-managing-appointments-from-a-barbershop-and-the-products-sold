<?php

include 'connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg'];
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_message = $conn->prepare("SELECT * FROM `mesaje` WHERE nume = ? AND email = ? AND numar = ? AND mesaj = ?");
   $select_message->execute([$name, $email, $number, $msg]);

   if($select_message->rowCount() > 0){
      $message[] = 'Mesajul a mai fost deja trimis!';
   }else{

      $insert_message = $conn->prepare("INSERT INTO `mesaje`(user_id, nume, email, numar, mesaj) VALUES(?,?,?,?,?)");
      $insert_message->execute([$user_id, $name, $email, $number, $msg]);

      $message[] = 'Mesajul a fost trimis cu succes!';

   }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact</title>
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="produse.css">

</head>
<body>
   
<?php include 'user_header.php'; ?>

<section class="contact">

   <form action="" method="post">
      <h3>Ai nevoie de un anumit produs? Scrie-ne, iar noi il vom baga pentru tine!</h3>
      <input type="text" name="name" placeholder="Numele dumneavoastra" required maxlength="20" class="box">
      <input type="email" name="email" placeholder="Email-ul dumneavoastra" required maxlength="50" class="box">
      <input type="number" name="number" min="0" max="9999999999" placeholder="Introduceti numarul de telefon" required onkeypress="if(this.value.length == 10) return false;" class="box">
      <textarea name="msg" class="box" placeholder="Introduceti aici mesajul dumneavoastra!" cols="30" rows="10"></textarea>
      <input type="submit" value="Trimite mesajul" name="send" class="btn">
   </form>

</section>

<script src="script.js"></script>

</body>
</html>