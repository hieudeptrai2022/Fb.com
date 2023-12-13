<?php
    $imgpath="./images/".$xoahinh;
    if(is_file($imgpath)){
        $img="<img src='".$imgpath."' height='90px' width='150px'  style='padding-right: 50px' alt='không có hình'>";
    }else{
        $img="không có hình";
    }
?>


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cập Nhật Tài Khoản</title>

    <!-- Thêm thư viện Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-5">
        <div class="update">
        <?php 
                            if(isset($_SESSION['username'])&&is_array($_SESSION['username'])){
                                extract($_SESSION['username']);
                            }
                        ?>
            <h1>Cập nhật tài khoản</h1>

            <!-- Form cập nhật tài khoản -->
            <form method="post" action="index.php?act=capnhat" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="ho_ten" class="form-label">Tên người dùng:</label>
                    <input type="text" class="form-control" id="ho_ten" name="ho_ten" value="<?php if(isset($ho_ten)){echo $ho_ten; } ?>"  >
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Tên đăng nhập:</label>
                    <input type="text" class="form-control" name="username" disabled value="<?php if (isset($username)){echo $username;} ?>" >
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" value="<?php if (isset($email)){echo $email; }?>" >
                </div>

                <div class="mb-3">
                <div>
                                <label for="">Hình</label>
                                <input type="file" name="hinh" id="">
                                <?=$img?>
                            </div>
 

</div>


                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" name="submit" class="btn btn-primary" >Cập nhật</button>                
            </form>
           <?php 
           if(isset($tb)){
               echo $tb;
           }
       ?> 

        </div>
    </div>

    <!-- Thêm thư viện Bootstrap JS và Popper.js (nếu chưa có) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
