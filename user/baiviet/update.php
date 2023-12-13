<!-- Sửa bài viết -->

<?php include "global.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="./public/js/function.js">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.9/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .content-area {
            margin-right: 10px;
            background: #fff;
            border-radius: 3px;
            padding: 18px;
        }
    </style>
</head>

<body>

    <body>
        <nav class="navbar">
            <div class="nav-left"><a href="index.php"><img class="logo" src="https://quyhyvong.com/wp-content/uploads/2021/12/Logo-FPT-Synnex.png" alt="Trang chủ"></a>
                <ul class="navlogo">
                    <li><img src="./images/notification.png"></li>
                    <li><img src="./images/inbox.png"></li>
                    <li><img src="./images/video.png"></li>
                </ul>
            </div>
            <?php
            if (isset($_SESSION['username'])) {
                extract($_SESSION['username']);
            ?>
                <?php
                //echo "id user: $id";
                $image = $img_path . $hinh;
                ?>
                <div class="nav-right">
                    <div class="search-box">
                        <img src="./images/search.png" alt="<?= $id ?>">
                        <input type="text" placeholder="Search">
                    </div>
                    <div class="profile-image online" onclick="UserSettingToggle()">
                        <img src="<?= $image ?>" alt="123">
                    </div>

                </div>
                <div class="user-settings">
                    <div class="profile-darkButton">
                        <div class="user-profile">
                            <img src="<?php echo $image ?>" alt="123">
                            <div>
                                <div class="username">
                                    <?php echo $ho_ten ?>
                                </div>
                                <a href="#">See your profile</a>
                            </div>
                        </div>
                        <div id="dark-button" onclick="darkModeON()">
                            <span></span>
                        </div>
                    </div>
                    <div>
                        <?php
                        if ($vai_tro == 1) {
                            echo ' <div class="settings-links">
                                            <img src="./images/setting.png" alt="" class="settings-icon">
                                            <a href="./admin/">Quản trị admin<img src="" alt=""></a>
                                        </div>';
                        }
                        ?>
                        <div class="settings-links">
                            <img src="./images/help.png" alt="" class="settings-icon">
                            <a href="index.php?act=quenmk">Quên mật khẩu<img src="./images/arrow.png" alt=""></a>
                        </div>

                        <div class="settings-links">
                            <img src="./images/Display.png" alt="" class="settings-icon">
                            <a href="index.php?act=doimk">Đổi mật khẩu<img src="./images/arrow.png" alt=""></a>
                        </div>
                        <div class="settings-links">
                            <img src="./images/logout.png" alt="" class="settings-icon">
                            <a href="index.php?act=capnhat"> Cập nhật tài khoản <img src="./images/arrow.png" alt=""></a>
                        </div>
                        <div class="settings-links">
                            <img src="./images/logout.png" alt="" class="settings-icon">
                            <a href="index.php?act=dangxuat">Đăng xuất <img src="./images/arrow.png" alt=""></a>
                        </div>

                    </div>
                <?php
            } else {
                header("Location : ./user/login.php");
            }
                ?>
                <hr>

                </div>
        </nav>
            <!-- content-area------------ -->
        <div class="container" style="margin: 0 auto; width: 1630px; padding:0 !important; ">
            <div style="display: flex; margin-top: 18px;">
                <div class="left-sidebar">
                    <div class="important-links">
                        <a href="#"><img src="./images/news.png" alt="">Tin mới</a>
                        <a href="#"><img src="./images/friends.png" alt="">Bạn bè</a>
                        <a href="#"><img src="./images/group.png" alt="">Nhóm</a>
                        <a href="#"><img src="./images/marketplace.png" alt="">Cửa hàng </a>
                        <a href="#"><img src="./images/watch.png" alt="">Watch</a>
                        <a href="#">See More</a>
                    </div>

                    <div class="shortcut-links">
                        <p>Nhóm của bạn</p>
                        <a href="#"> <img src="./images/shortcut-1.png" alt="">Web Developers</a>
                        <a href="#"> <img src="./images/shortcut-2.png" alt="">Web Design Course</a>
                        <a href="#"> <img src="./images/shortcut-3.png" alt="">Full Stack Development</a>
                        <a href="#"> <img src="./images/shortcut-4.png" alt="">Website Experts</a>
                    </div>
                </div>

                <!-- main-content------- -->

                <div class="content-area" style="margin-right: 10px;">
                    <div class="story-gallery">
                        <div class="story story1">
                            <img src="<?php echo $image ?>" alt="123">
                            <p>Post Story</p>
                        </div>
                        <div class="story story2">
                            <img src="<?php echo $image ?>" alt="123">
                            <p>Alison</p>
                        </div>
                        <div class="story story3">
                            <img src="<?php echo $image ?>" alt="123">
                            <p>Jackson</p>
                        </div>
                        <div class="story story4">
                            <img src="<?php echo $image ?>" alt="123">
                            <p>Samona</p>
                        </div>

                    </div>

                    

                    <!-- Bài viết -->
                    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
                        <div class="post-upload-textarea">
                            <input type="hidden" name="id_baiviet" value="<?= $thongtin_baiviet['id'] ?>">
                            <input type="hidden" name="id_user" value="<?= $thongtin_baiviet['id_user'] ?>">
                            <input type="text" name="content" value="<?= $thongtin_baiviet['content'] ?>" style="padding-left: 10px;"  class="border h-24 w-full mb-2" placeholder="Bạn đang nghĩ gì ?">
                            <br>
                            <div>
                                <img width="150px" src="<?= $thongtin_baiviet['hinh_baiviet'] ?>" alt="">
                            </div>
                            <br>
                            <input type="file" class="file-input file-input-bordered w-full max-w-xs mb-2" name="hinh">
                            <input type="hidden" name="oldImage" value="<?= $thongtin_baiviet['hinh_baiviet'] ?>" class="file-input file-input-bordered w-full max-w-xs mb-2" name="oldImage">
                            <br>
                            <button type="submit" name="update" class="btn btn-success">Cập nhật bài viết</button>
                        </div>
                    </form>


                    <div class="post-profile-picture">
                        <img src="./images/profile-pic.png " alt=""> <i class=" fas fa-caret-down"></i>
                    </div>
                </div>


                <!-- sidebar------------ -->
                <div class="right-sidebar">
                    <div class="heading-link">
                        <h4>Sự Kiện</h4>
                        <a href="">Xem tất cả</a>
                    </div>


                    <div class="events">
                        <div class="left-event">
                            <h4>18</h4>
                            <span>Tháng 9</span>
                        </div>
                        <div class="right-event">
                            <h4>Offline</h4>
                            <p><i class="fas fa-map-marker-alt"></i> Ae xã đoàn</p>
                            <a href="#">Xem chi tiết</a>
                        </div>
                    </div>

                    <div class="advertisement">
                        <img src="./images/advertisement.png" class="advertisement-image" alt="">
                    </div>

                    <div class="heading-link">
                        <h4>Bạn bè hoạt động</h4>
                        <a href=""></a>
                    </div>

                    <div class="online-list">
                        <div class="online">
                            <img src="./images/member-1.png" alt="">
                        </div>
                        <p>Trần Đăng Khoa</p>
                    </div>

                    <div class="online-list">
                        <div class="online">
                            <img src="./images/member-2.png" alt="">
                        </div>
                        <p>Sơn Tùng - MTP</p>
                    </div>
                    <div class="online-list">
                        <div class="online">
                            <img src="./images/member-3.png" alt="">
                        </div>
                        <p>Ngọc Hanh</p>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>
<script>
    var userSettings = document.querySelector(".user-settings");
    var darkBtn = document.getElementById("dark-button");
    var LoadMoreBackground = document.querySelector(".btn-LoadMore");

    function UserSettingToggle() {
        userSettings.classList.toggle("user-setting-showup-toggle");
    }

    // darkBtn.onclick = function(){
    //     darkBtn.classList.toggle("dark-mode-on");
    // }

    function darkModeON() {
        darkBtn.classList.toggle("dark-mode-on");
        document.body.classList.toggle("dark-theme");
    }

    function LoadMoreToggle() {
        LoadMoreBackground.classList.toggle("loadMoreToggle");
    }
</script>