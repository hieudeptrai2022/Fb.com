<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên Mật Khẩu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        button {
            background-color: #1877f2;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0e5a8a;
        }
    </style>
</head>
<body>
    <form action="index.php?act=quenmk" method="post">
        <h2>Quên Mật Khẩu</h2>
        <p>Nhập địa chỉ email của bạn để khôi phục mật khẩu.</p>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <button type="submit">Gửi Yêu Cầu</button>
    </form>
</body>
</html>
