<?php
session_start();
include "./model/pdo.php";
include "./model/tai-khoan.php";
include "./model/binh-luan.php";
include "./model/bai-viet.php";


if (isset($_GET['act'])) {
	$act = $_GET['act'];

	switch ($act) {
		case 'dangky':
			if (isset($_POST['submit']) && isset($_POST['email']) && ($_POST['username']) != "" && ($_POST['password']) != "" && ($_POST['ho_ten']) != "" && ($_POST['confirmpass'])) {
				$username = $_POST['username'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$confirmpass = $_POST['confirmpass'];
				$ho_ten = $_POST['ho_ten'];
				$tb = insert_username($username, $email, $password, $confirmpass, $ho_ten);
			}
			include "./user/dang-ky.php";
			break;
		case 'dangnhap':
			if (isset($_POST['submit'])) {
				$username = $_POST['username'];
				$password = $_POST['password'];
				$arr = check_user($username, $password);
				$_SESSION['username'] = $arr;
				$_SESSION['img_user'] = $arr;
			}
			include "./layouts/header.php";
			break;


		case "dangxuat":
			session_unset();
			include "./user/login.php";
			break;

		case "doimk":
			if (isset($_POST['submit'])) {
				$id = $_POST['id'];
				$password = $_POST['password'];
				$newpass = $_POST['newpass'];
				$confirm = $_POST['confirm'];

				if (($password == "")) {
					$tb = "Hãy nhập mật khẩu cũ";
				} else if ($newpass == "") {
					$tb = "Hãy nhập mật khẩu mới";
				} else if ($confirm == "") {
					$tb = "Nhập lại mật khẩu mới";
				} else if ($newpass == $confirm) {
					$result = check_doimk($id, $password);
					if ($result == 1) {
						update_mk($id, $newpass);
						$tb = "Cập nhật thành công ";
					} else {
						$tb = "Mật khẩu cũ không chính xác";
					}
				} else {
					$tb = "Mật khẩu mới không trùng nhau";
				}
			}
			include "./user/doi-mk.php";
			break;
		case "capnhat":
			$id = $_SESSION['username']['id'];
			$hinhphaixoa = loadtt_user($id);
			$xoahinh = isset($hinhphaixoa['hinh']) ? $hinhphaixoa['hinh'] : null;
			if (isset($_POST['submit']) && (($_POST['email']) != "" && ($_POST['ho_ten']) != "")) {
				$id = $_POST['id'];
				$email = $_POST['email'];
				$ho_ten = $_POST['ho_ten'];
				$hinh = $_FILES['hinh']['name'];
				if ($_FILES['hinh']['error'] == 0) {
					if ($xoahinh && file_exists('./images/' . $xoahinh)) {
						unlink('./images/' . $xoahinh);
					} else {
						echo 'File không tồn tại';
					}
				}
				update_user($id, $ho_ten, $email, $hinh);
				if (is_dir("./images")) {
					move_uploaded_file($_FILES['hinh']['tmp_name'], "./images/" . $_FILES['hinh']['name']);
				} else {
					mkdir("./images");
					move_uploaded_file($_FILES['hinh']['tmp_name'], "./images/" . $_FILES['hinh']['name']);
				}
				$_SESSION['user'] = loadtt_user($id);
				echo "(<script>alert('Vui lòng đăng nhập lại !')</script>)";
				echo "(<script> window.location.href='index.php'</script>)";
			}
			include "./user/cap-nhat.php";
			break;


			// Bài viết mới
		case "addtus":
			if (isset($_POST['thembaiviet'])) {
				$id_user = $_POST['id_user'];
				$content = $_POST['content'];
				date_default_timezone_set("Asia/Ho_Chi_Minh");
				$time = date("Y:m:d H:i:s A");

				$img = isset($_FILES['hinh']) ? $_FILES['hinh'] : null;
				$pathSaveDB = '';
				if ($img) { // Khi mà có upload ảnh lên thì mới xử lý upload

					$pathUpload = __DIR__ . './images/' . $img['name'];

					// Upload file lên để lưu trữ
					if (move_uploaded_file($img['tmp_name'], $pathUpload)) {
						$pathSaveDB = 'images/' . $img['name'];
					}
				}
				insert_newtus($id_user, $content, $time, $pathSaveDB);
			}
			header("Location: index.php?act=dangnhap");
			break;
		case "edit":
			$id = $_GET['id'] ?? "";
			$thongtin_baiviet = select_baiviet_byid($id);

			if (isset($_POST['update'])) {

				$oldImage = $_POST['oldImage'];

				date_default_timezone_set("Asia/Ho_Chi_Minh");
				$time = date("Y:m:d H:i:s A");

				$img = isset($_FILES['hinh']) ? $_FILES['hinh'] : null;
				$pathSaveDB = '';

				if ($img) { // Khi mà có upload ảnh lên thì mới xử lý upload

					$pathUpload = __DIR__ . './images/' . $img['name'];

					// Upload file lên để lưu trữ
					if (move_uploaded_file($img['tmp_name'], $pathUpload)) {
						$pathSaveDB = 'images/' . $img['name'];
					}
				}

				update_baiviet($_POST['id_baiviet'], $_POST['id_user'], $_POST['content'], $time, $pathSaveDB ? $pathSaveDB : $oldImage);
				header('Location: index.php?act=dangnhap');
			}


			include "./user/baiviet/update.php";
			break;
		case "favorite":
			$id_favorite = $_GET['id_favorite'] ?? "";
			them_baiviet_yt($_SESSION['username']['id'], $id_favorite);
			echo "<script>alert('Đã thêm vào tin yêu thích')</script>";
			echo "<script>window.location.href='index.php?act=dangnhap'</script>";
			break;
		case "favorite_mylist":
			$listfavorite = load_all_yeuthich($_SESSION['username']['id']);
			include "./user/listfavorite.php";
			break;
		case "delete":
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				delete_baiviet($id);
			}
			header("Location: index.php?act=dangnhap");
			break;

			// add comment
		case "addbl":
			$err = "";
			if (isset($_POST['gui_bl'])) {
				$id_post = $_POST['id_post'];
				$content = $_POST['comment'];
				date_default_timezone_set("Asia/Ho_Chi_Minh");
				$time = date("Y:m:d H:i:s A");
				$ischeck = true;

				if (empty($content)) {
					$ischeck = false;
					$err = "Vui lòng nhập nội dung bình luận";
				}

				if ($ischeck) {
					insert_bl($content, $_POST['id_user'], $time, $id_post);
					header("Location: index.php?act=dangnhap");
				}
			}

			break;

		default:
			include "./layouts/footer.php";
	}
} else {
	include "./user/login.php";
}
