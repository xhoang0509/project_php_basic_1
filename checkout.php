<?php
session_start();
if(empty($_SESSION['id'])) {
  header('location:index.php');
  exit();
}
if(!empty($_SESSION['cart'])) {
  $cart = $_SESSION['cart'];  
}
require 'help.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" ></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" ></script>
        <title>Chi tiết sản phẩm</title>
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="stylesheet" href="./css/detail.css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="./css/base.css" />
    </head>
    <body>
        <div class="wrapper">
           <?php include 'header.php' ?>
           <?php if(!empty($_SESSION['cart'])) { ?>
            <div class="container" style="padding: 0 5% 3%">
              <h1 style="text-align: left; font-weight: bold">Thông tin thanh toán</h1>
              
           </div>
           <?php }else { ?> 
           <div class="container" style="padding: 0 5% 3%">
             <h3>Giỏ hàng trống. Hãy quay lại thêm sản phẩm vào <a class="text-underline" href="index.php">tại đây !</a></h3>
           </div>
           <?php } ?>
        </div>
       <?php include 'footer.php' ?>
    </body>
</html>
