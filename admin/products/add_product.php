<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Thêm nhà sản phẩm mới</title>
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
                    <a href="manufacturers" class="link">Quản lý nhà sản xuất</a>
                </li>
                <li class="link-item">
                    <a href="#" class="link active">Quản lý sản phẩm</a>
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
                <h1>Thêm nhà sản phẩm mới</h1>
                <a class="add-manufacturer" href="index.php">Quay lại</a>
                <form
                    action=""
                    enctype="multipart/form-data"
                    class="form-input"
                >
                    <label for="">Tên sản phẩm</label>
                    <br />
                    <input class="input" type="text" />
                    <br />
                    <label for="">Ảnh</label>
                    <input class="input" type="file" />
                    <br />
                    <label for="">Giá</label>
                    <br>
                    <input class="input" type="text" />
                    <br />
                    <label for="">Mô tả sản phẩm</label>
                    <br>
                    <textarea name="" id="" cols="30" rows="10" style="margin: 0px; width: 400px; height: 150px;"></textarea>
                    <br>
                    <br>
                    <label for="">Nhà sản xuất</label>
                    <br>
                    <select name="" id="">
                        <option value="">Apple</option>
                        <option value="">Sam sung</option>
                        <option value="">Xiao mi</option>
                    </select>
                    <br />
                    <br />
                    <button class="btn">Thêm</button>
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
