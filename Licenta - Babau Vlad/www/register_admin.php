<?php

include 'connect.php';

session_start();

//$admin_id = $_SESSION['admin_id'];

//if(!isset($admin_id)){
 /// header('location:admin_login.php');
//}

if(isset($_POST['trimite'])){

   $name = $_POST['nume'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $parola = sha1($_POST['parola']);
   $parola = filter_var($parola, FILTER_SANITIZE_STRING);
   $cparola = sha1($_POST['cparola']);
   $cparola = filter_var($cparola, FILTER_SANITIZE_STRING);

   $select_admin = $conn->prepare("SELECT * FROM `admins` WHERE nume = ?");
   $select_admin->execute([$name]);

   if($select_admin->rowCount() > 0){
      $message[] = 'username already exist!';
   }else{
      if($parola != $cparola){
         $message[] = 'confirm password not matched!';
      }else{
         $insert_admin = $conn->prepare("INSERT INTO `admins`(nume, parola) VALUES(?,?)");
         $insert_admin->execute([$name, $cparola]);
         $message[] = 'S-a inregistrat un adiministrator nou';
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
   <title>Inregistrare administrator</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="admin_login.css">

</head>
<body>

<?php include 'admin_header.php'; ?>

<section class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <input type="text" name="nume" required placeholder="enter your username" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="parola" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="cparola" required placeholder="confirm your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="Inregistrare" class="btn" name="trimite">
   </form>

</section>

<script src="admin_script.js"></script>
   
</body>
</html>