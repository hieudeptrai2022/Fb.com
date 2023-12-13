<form action="index.php?act=addtus" method="post" enctype="multipart/form-data">
    <div class="post-upload-textarea">
        <input type="text" name="id_user" value="<?= $id ?>" class="hidden">
        <!--    <textarea-->
        <!--      name="content"-->
        <!--      placeholder="Bạn đang nghĩ gì "-->

        <!--      cols="30"-->
        <!--      rows="3"-->
        <!--    ></textarea>-->
        <input type="text" name="content" class="border h-24 w-full mb-2" placeholder="Bạn đang nghĩ gì ?">
        <br>
        <input type="file" class="file-input file-input-bordered w-full max-w-xs mb-2" name="hinh" />
        <br>
        <button type="submit" name="thembaiviet" class="btn btn-success"> Thêm bài viết</button>
    </div>
</form>