<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header class="header">
    <div class="logo">
        <a class="logo-link" href="index.php">
            ABC Shop
        </a>
    </div>
    <div class="menu">
        <ul class="menu-slide">
            <li class="slide-item"><a class="slide-item-link" href="index.php">Trang Chủ</a></li>
            <?php if($_SERVER['REQUEST_URI'] === "/abcshop/index.php") {?>
            <li class="slide-item input-search">                
                <input id="project" placeholder="Tìm kiếm sản phẩm">
                <input type="hidden" id="project-id">
                <p id="project-description"></p>
            </li>            
            <?php }else { ?>           

            <?php } ?>
        </ul>
    </div>
    <div class="icon">      
        <?php if(isset($_SESSION['id_customer'])) {?>            
            <a style="color: #548CFF" class="icon-link" href="profile.php">Chào, <?php echo $_SESSION['name_customer'] ?></a>
            <a class="icon-link" href="cart.php">Giỏ hàng</a>
            <a class="icon-link" href="purchase.php">Đơn mua</a>
            <a class="icon-link" href="logout.php">Đăng xuất</a>    
        <?php } else { ?>
            <a class="icon-link" href="login.php">Đăng nhập</a>
            <a class="icon-link" href="register.php">Đăng kí</a>
        <?php } ?>
    </div>
</header>
