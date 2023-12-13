<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center text-danger">Đăng kí thành viên</h1>
            <form action="index.php?act=dangky" class="needs-validation" method="post" novalidate>
                <div class="mb-3">
                    <label for="ho_ten">Họ và tên</label>
                    <input type="text" class="form-control" id="ho_ten" name="ho_ten" required>

                </div>
                <div class="mb-3">
                    <label for="username">Tên đăng nhập</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>

                </div>
                <div class="mb-3">
                    <label for="password">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" name="password" required>

                </div>
                <div class="mb-3">
                    <label for="confirmPassword">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" id="confirmpass" name="confirmpass" required>

                </div>
                <button type="submit" name="submit" class="btn btn-primary">Đăng ký</button>
                <a href="index.php">Đăng Nhập</a>
            </form>
            <?php 
                if(isset($tb)){
                    echo $tb;
                }
            ?>
        </div>
    </div>
</div>