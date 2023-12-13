<!-- Hiển thị bình luận -->
<?php //echo "id bl : $id"
?>
<?php
// join bảng user và bviet vào nhau
$result = select_baiviet();
$abc = selectUser();

$list_bl = loadall_bl($post['id']);
$username = loadtt_user($_SESSION['username']['id']);
$imgCmt = "images/" . $username['hinh'];

foreach ($list_bl as $bl => $value) {
  echo "<div>";
  echo "<div class='avatar placeholder'>
  <div class='bg-neutral text-neutral-content rounded-full w-8 mt-2'>
    <span class='text-xs'>
      <img src='./images/" . $value['hinh'] . "'>
    </span>
  </div>
</div>";

  echo '<h3 class="mt-2">' . $value['content'] . '</h3>';
  echo '</div>';
  //echo '<div>';
  ////echo '<h4>'.$bl['content'].'</h4>';
  //echo '</div>';
  echo '<br>';
}
?>


<?php
$handleIdUser = selectUser();
?>

<form method="post" action="index.php?act=addbl">
  <label for="comment">Bình luận</label><br>
  <input type="hidden" name="id_post" value="<?= $post['id'] ?>">
  <input type="hidden" name="id_user" value="<?= $_SESSION['username']['id'] ?>">
  <textarea name="comment" rows="3" cols="73" placeholder="Viết bình luận..." style="padding-left: 10px; padding-top:10px"></textarea><br>
  <br>
  <span style="color:red"><?= !empty($err) ? $err : "" ?></span>
  <br>
  <input type="submit" value="Gửi bình luận" name="gui_bl" class="btn btn-success">
</form>