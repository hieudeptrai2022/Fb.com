<!-- Status image-->
<?php //echo "Id Usser: $id";  
?>

<?php
$result = select_baiviet();
$abc = selectUser();
// echo "<pre>";
// print_r($abc);
// echo "</pre>";
?>


<?php foreach ($abc as $key => $value) { ?>
<?php $id = $value['id']; ?>
<?php $selectJoinUser = select_join_user($id); ?>

<?php foreach ($selectJoinUser as $post) : ?>
<!--        --><?php
                        //
                        //    echo "<pre>";
                        //    print_r($post);
                        //    echo "</pre>";
                        //
                        //            
                        ?>
<div class="status-field-container write-post-container" data-id="<?= $post['id'];  ?>">
    <div class="user-profile-box">
        <div class="user-profile">
            <img src="<?= "images/" . $post['hinh'] ?>" alt="Không có hình ảnh">
            <div>
                <p>
                <p> <?php echo $post['username'] ?></p>
                </p>
                <small><?= $post['time'];  ?></small>
            </div>
        </div>

        <div style="padding-left: 250px;" class="xoa">
            <a style="text-decoration: none;" href="index.php?act=edit&id=<?= $post['id'] ?>"
                class="btn btn-success">Sửa tin</a>
            <a style="text-decoration: none;" href="index.php?act=delete&id=<?= $post['id'] ?>"
                class="btn btn-error">Xóa tin</a>
        </div>
        <div>
            <a href="#"><i class="fas fa-ellipsis-v"></i></a>
        </div>

    </div>

    <div class="status-field">
        <hr>
        <p><?= $post['content']; ?></p>
        <img src="<?= $post['hinh_baiviet'] ?>" alt="" class="img_file">
    </div>
    <div class="post-reaction">
        <div class="activity-icons">
            <a href="index.php?act=favorite&id_favorite=<?= $post['id'] ?>">
                <div> <img src="./images/tim.jpg" alt="Tim">Thêm vào tin yêu thích </div>
            </a>
        </div>
        <div class="post-profile-picture">
            <img src="<?= "images/" . $post['hinh'] ?>" alt=""> <i class=" fas fa-caret-down"></i>
        </div>

    </div>

    <div style="padding-left: 10px;" class="formbl">
        <div class="comments">
            <?php include "./user/binhluan/binhluan.php"; ?>
        </div>
    </div>
</div>



<?php endforeach; ?>

<?php
}
?>

<!-- Status write  -->
<div class="status-field-container write-post-container">
    <div class="post-reaction">

        <h1 style="text-align : center;"> Trương Văn Hiếu - PD09286</h1>