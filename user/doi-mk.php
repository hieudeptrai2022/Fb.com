<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 20px 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        p {
            color: red;
            margin-top: 10px;
        }
        body{
            padding-left : 400px;
        }
    </style>
</head>
<body>
    <div>
    <?php
   if(isset($_SESSION['username'])&&is_array($_SESSION['username'])){
       extract($_SESSION['username']);
   }
?>
    
    <h2>Đổi mật khẩu</h2>
    <form action="index.php?act=doimk" method="post">
        
        <label for="password">Mật khẩu cũ</label>
        <input type="password" name="password" required>
        
        <label for="newpass">Mật khẩu mới</label>
        <input type="password" name="newpass" required>
        
        <label for="confirm">Xác nhận mật khẩu</label>
        <input type="password" name="confirm" required>

        <input type="hidden" name="id" value="<?php echo $id ?>">
        <button type="submit" name="submit">Thay đổi</button>
    </form>

    <?php
    // Hiển thị thông báo nếu có
    if (isset($tb)) {
        echo "<p>$tb</p>";
    }
    ?>
    </div>
</body>
</html>
