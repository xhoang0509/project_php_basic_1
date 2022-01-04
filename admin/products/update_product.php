<?php
require '../check_admin_login.php';

if(empty($_GET['id'])) {
    $_SESSION['error'] = "Yêu cầu chọn nhà sản xuất để sửa NHA !";
    header('location:index.php');
    exit();
}
$id = $_GET['id'];

require '../connect.php';
$sql = "select * from products where id = '$id'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);
if($number_rows === 0) {
    $_SESSION['error'] = "Yêu cầu chọn nhà sản xuất để sửa !";
    header('location:index.php');
    exit();
}
$each = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Thêm nhà sản xuất mới</title>
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap"
            rel="stylesheet"
        />
        <!-- Fontawesome -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
            integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <!-- Css -->
        <link rel="stylesheet" href="../../css/style.css" />
        <link rel="stylesheet" href="../../css/admin.css" />
    </head>
    <body>
        <header id="header">
            <a href="index.html" class="header-logo">
                <img src="../image/logo.png" alt="" class="logo" />
                <h1>ABC Shop</h1>
            </a>
        </header>
        <div id="container" class="container-admin">
            <ul class="container-links">
                <li class="link-item">
                    <a href="../" class="link">Dashboard</a>
                </li>
                <li class="link-item">
                    <a href="#" class="link active">Quản lý nhà sản xuất</a>
                </li>
                <li class="link-item">
                    <a href="../products/" class="link">Quản lý sản phẩm</a>
                </li>
                <li class="link-item">
                    <a href="../staffs/" class="link">Quản lý nhân viên</a>
                </li>
                <li class="link-item">
                    <a href="../orders/" class="link">Quản lý đơn hàng</a>
                </li>
                <li class="link-item">
                    <a href="" class="link">Đăng xuất</a>
                </li>
            </ul>
            <div class="show">
                <h1>Sửa sản phẩm: </h1>
                <h3 style="color: red;">
                    <?php 
                        if(!empty($_SESSION['error'])) { 
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        } 
                    ?>
                </h3>
                <a class="add-manufacturer" href="index.php">Quay lại</a>
            <?php 
            
                $sql="select * from manufacturers";
                $manufacturer = mysqli_query($connect,$sql);
            ?>    

                <form 
                    action="process_update_product.php?id=<?php echo $id ?>" 
                    method="POST" enctype="multipart/form-data" class="form-input" >
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <label for="name">Tên sản phẩm</label>
                    <br />
                    <input class="input" type="text" id="name" name="name" value="<?php echo $each['name'] ?>" />
                    <br />
                    <label for="quantity">số lượng</label>
                    <br />
                    <input class="input" type="text" id="quantity" name="quantity" value="<?php echo $each['quantity'] ?>" />
                    <br />
                    <label for="description">Mô tả sản phẩm</label>
                    <br />
                    <input class="input" type="text" id="description" name="description" value="<?php echo $each['description'] ?>" />
                    <br />
                    <label for="type">Loại sản phẩn</label>
                    <br />
                    <input class="input" type="text" id="type" name="type" value="<?php echo $each['type'] ?>" />
                    <br />
                    <label for="photo">Giữ nguyên ảnh</label>
                    <br />
                    <img width="200px" src="../../image/<?php echo $each['photo'] ?>" alt=""> 
                    <br>hoặc đổi tại đây
                    <input class="input" type="file" id="photo" name="photo"/>
                    <br />
                    <label for="product_id">Chọn nhà sản xuất</label>
                    <br />
                    <select class="input" id="product_id" name ="product_id" >
                    <?php foreach ($manufacturer as $each): ?>
                        <option value="<?php echo $each['id']?>">
                            <?php echo $each ['name'] ?>
                        </option>
                    <?php endforeach ?>
                    </select> 
                    <br />
                    <button class="btn">Sửa</button>
                </form>
              
            </div>
        </div>
        <footer id="footer">
            <div>
                <a href=""
                    ><i class="footer-icon fab fa-facebook-square"></i
                ></a>
                <a href=""
                    ><i class="footer-icon fab fa-instagram-square"></i
                ></a>
                <a href=""><i class="footer-icon fab fa-youtube-square"></i></a>
            </div>
            <p>Bản quyền thuộc về ABC Company</p>
        </footer>
    </body>
</html>