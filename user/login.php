<head>
<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      rel="stylesheet"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
</head>
<div class="container">

                        
<div class="login-container">
            <h1 class="text-center text-danger">FAKEBOOK</h1>
            <form action="index.php?act=dangnhap" method="post" >
                
                    <label for="username">Tên đăng nhập</label>
                    <input type="text"  id="username"  name="username" >
                   
                
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" name="password" >   
                    
                
                
                    <button type="submit" name="submit" class="btn btn-primary">Đăng Nhập</button> <br>
                    <a href="index.php?act=forgotpass">Quên mật khẩu</a> 
                    <div class="signup">
            <p>Bạn chưa có tài khoản? <a href="index.php?act=dangky">Đăng ký</a></p>
        </div>
                    
                    <?php 
                if(isset($tb)){ echo $tb;}
            ?>      
                </div>
            </form>
            <?php 
             
            ?>
        </div>
    </div>

<style>
    

    body {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
    background-color: #f0f2f5; /* Facebook background color */
}

.login-container {
    background-color: #fff;
    width: 360px;
    margin: 100px auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px 0px #000000;
}

img {
    width: 100px;
    margin: 0 auto 20px;
    display: block;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
}

input {
    padding: 10px;
    margin-bottom: 16px;
}

button {
    background-color: #1877f2; /* Facebook blue */
    color: #fff;
    padding: 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0e5a8a; /* Darker shade on hover */
}

.separator {
    margin: 20px 0;
    border-bottom: 1px solid #ddd;
}

a {
    text-decoration: none;
    color: #1877f2;
}

.signup {
    text-align: center;
    margin-top: 20px;
}

</style>
