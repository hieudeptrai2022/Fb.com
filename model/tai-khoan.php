
<?php
function taikhoan()
{
    $sql = "select * from `tai-khoan` where 1";
    $arr = pdo_query_one($sql);
    return $arr;
}
function insert_username($username, $email, $password, $confirmpass, $ho_ten)
{
    if ($confirmpass == $password) {
        $sql = "select * from `tai-khoan` where username='$username'";
        $sl = pdo_query_row($sql);
        if ($sl == 0) {
            $sql = "insert into `tai-khoan` (username,email,password,ho_ten) values('$username','$email','$password','$ho_ten')";
            pdo_execute($sql);
            $tb = "Đăng kí thành công";
        } else {
            $tb = "Tài khoản đã tồn tại";
        }
    } else {
        $tb = "mật khẩu ko khớp";
    }
    return $tb;
}
function check_user($username, $password)
{
    $sql = "select * from `tai-khoan` where username='$username' and password='$password' ";
    $arr = pdo_query_one($sql);
    return $arr;
}
function update_mk($id, $newpass)
{
    $sql = "update `tai-khoan` set password = '$newpass' where id='$id'";
    pdo_execute($sql);
}

function check_doimk($id, $password)
{
    $sql = "select * from `tai-khoan` where password = '$password' and id = '$id'";
    $result = pdo_query_row($sql);
    return $result;
}

function loadtt_user($id)
{
    $sql = "SELECT * FROM `tai-khoan` WHERE id = $id";
    return pdo_query_one($sql);
    
}


function  update_user($id, $ho_ten, $email, $hinh)
{
    if ($hinh != "") {
        $sql = "update `tai-khoan` set  ho_ten='$ho_ten', email='$email', hinh='$hinh' where id='$id'";
    } else if ($hinh == "") {
        $sql = "update `tai-khoan` set  ho_ten='$ho_ten', email='$email'  where id='$id'";
    }
    pdo_execute($sql);
}

function selectUser()
{
    $sql = "SELECT * FROM `tai-khoan`";
    $arr = pdo_query_all($sql);
    return $arr;
}


function deleteUser($id)
{
    $sql = "DELETE FROM `tai-khoan` WHERE id = $id";
    $arr = pdo_delete($sql);
    return $arr;
}


?>