<?php

include "../model/pdo.php";
include "../model/bai-viet.php";
include "../model/binh-luan.php";
include "../model/tai-khoan.php";
include "header.php";


// controller

if (isset($_GET['act'])) {
  $act = $_GET['act'];

  switch ($act) {

    case "dsbl":
      $list_bl = load_bl();
      include "./binhluan/quanlybl.php";
      break;
    case "xoabl":
      if (isset($_GET['id_bl'])) {
        $ma_bl = $_GET['id_bl'];
        delete_bl($ma_bl);
      }
      $id_pro = 100;
      $list_bl = loadall_bl($id_pro);
      include "./binhluan/quanlybl.php";
      break;
    case "addbv":
      include "./baiviet/list.php";
      break;

    case "xoabv":
      if (isset($_GET['id_bv'])) {
        $ma_bv = $_GET['id_bv'];
        delete_baiviet($ma_bv);
      }
      include "./baiviet/list.php";
      break;
    case "dskh":
      include "./taikhoan/list.php";
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        deleteUser($id);

        // header("Location: ./admin/index.php?act=dskh");
      }
      break;
      // case "deleteuser":
      //   if (isset($_GET['id'])) {
      //     $id = $_GET['id'];
      //     // dựa vào id của user để xóa 
      //     deleteUser($id);
      //     header("Location: ./taikhoan/list.php");
      //   }
      //   break;


    default:
      include "home.php";
  }
  include "home.php";
}
