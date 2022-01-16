<?php
require 'admin/connect.php';
require 'help.php';
$total = 0;
session_start();

if(empty($_SESSION['id'])) {
  header('location:index.php');
  exit();
}
$id = $_SESSION['id'];

$sql = "select * from customers where id = '$id'";
$result = mysqli_query($connect, $sql);
$customer = mysqli_fetch_array($result);
if(!empty($_SESSION['cart'])) {
  $cart = $_SESSION['cart'];  
}
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
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="stylesheet" href="./css/detail.css" />
        <link rel="stylesheet" href="./css/base.css" />
    </head>
    <body>
       <?php include 'header.php' ?>
        <div class="wrapper">
           <?php if(!empty($_SESSION['cart'])) { ?>
           <div class="container" style="padding: 0 5% 3%">
              <h1 style="text-align: left; font-weight: bold">Thông tin giỏ hàng</h1>
              <h2 class="text-success">
                    <?php if(!empty($_SESSION['name_product'])) {
                        echo $_SESSION['name_product'];
                        unset($_SESSION['name_product']);
                    }
                    ?>    </h2>
              <h2 class="text-danger">
                  <?php if(!empty($_SESSION['error_delete_cart'])) {
                      echo $_SESSION['error_delete_cart'];
                      unset($_SESSION['error_delete_cart']);
                  }
                  ?>    </h2>                
              <table class="w3-table-all">
                  <thead>
                    <tr class="w3-light-grey">
                      <th>STT</th>
                      <th>Tên</th>
                      <th>Ảnh</th>
                      <th>Giá</th>
                      <th>Số lượng</th>
                      <th>Thành tiền</th>
                      <th>Xóa</th>
                    </tr>
                  </thead>
                  <?php 
                    $index = 1;
                    $total_money = 0;
                  ?>
                  <?php foreach ($cart as $id => $each): ?>                    
                      <tr>
                        <td><?php echo $index; $index++; ?></td>
                        <td><?php echo $each['name'] ?></td>
                        <td><img height="100" src="image/<?php echo $each['photo'] ?>" alt=""></td>
                        <td>
                          <div class="span-price"><?php echo format_number_to_currency($each['price'])?> vnd</div>
                        </td>
                        <td>                          
                          <a class="btn btn-secondary" href="update_quantity.php?id=<?php echo $id ?>&type=decre">-</a>
                          <span class="span-quantity"><?php echo $each['quantity']?></span>
                          <button class="btn btn-secondary btn-update-quantity" data-id="<?php echo $id ?>" data-type="incre">+</button>
                        </td>
                        <td>
                          <span class="span-sum">
                            <?php 
                              echo format_number_to_currency($each['price'] * $each['quantity']);
                              $total += $each['price'] * $each['quantity'];
                            ?> vnd
                          </span>
                        </td>
                        <td><a class="color-red" href="delete_item_in_cart.php?id=<?php echo $id ?>">Xóa</a></td>
                      </tr>
                  <?php endforeach ?>               
              </table>
              <?php $_SESSION['total_moeny'] = $total_money ?>
              <form action="process_checkout.php" method="POST">
                <h1 style="text-align: left; font-weight: bold; margin-top: 50px">Thông tin thanh toán</h1>
                <a style="color: blue; text-decoration: underline;" href="profile.php">Chỉnh sửa thông tin thanh toán</a>
                <h2>Tên người nhận: <?php echo $customer['name'] ?></h2>
                <h2>Địa chỉ: <?php echo $customer['address'] ?></h2>
                <h2>Số điện thoại: <?php echo $customer['phone'] ?></h2>
                <h2>Tổng tiền: <?php echo format_number_to_currency($_SESSION['total_moeny'])?> vnd </h2>
                <h2>Ghi chú: </h2>
                <textarea style="width: 564px;height: 91px;" name="notes" id="" cols="30" rows="10"></textarea><br><br>
                <button class="btn btn-primary">Tiến hàng đặt hàng</button>
                <input type="hidden" name="name" value="<?php echo $customer['name'] ?>">
                <input type="hidden" name="address_receiver" value="<?php echo $customer['address'] ?>">
                <input type="hidden" name="phone" value="<?php echo $customer['phone'] ?>">
                <input type="hidden" name="total_price" value="<?php echo $_SESSION['total_moeny'] ?>">
              </form>
            </div>
           <?php }else { ?> 
           <div class="container" style="padding: 0 5% 3%">
             <h3>Giỏ hàng trống. Hãy quay lại thêm sản phẩm vào <a class="text-underline" href="index.php">tại đây !</a></h3>
           </div>
           <?php } ?>
        </div>
       <?php include 'footer.php' ?>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <script>
         $(document).ready(function() {
           $(".btn-update-quantity").click(function() {
            const btn = $(this);
             let id = $(this).data('id');
             let type = $(this).data('type');
             $.ajax({
               url: 'update_quantity.php',
               type: 'GET',
               data: {id, type},
             })
             .done(async function() {
               let parent_tr = btn.parents('tr');
               let price = parent_tr.find(".span-price").text();
               let quantity = parent_tr.find(".span-quantity").text();
               quantity++;
               await parent_tr.find(".span-quantity").text(quantity);
               let sum = price * quantity;
               parent_tr.find('.span-sum').text(sum);
               let total = 0;
               $(".span-sum").each(function(index, el) {
                 total += $(this).text();                 
               });
             })
           });
         });
       </script>
    </body>
</html>
