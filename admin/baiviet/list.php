<?php

//session_start();

$quanli_binhluan = select_baiviet();
?>


<div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Id_BV</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Id_User</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Content</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Time</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Hinh bai viet</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Like</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            <?php foreach ($quanli_binhluan as $bv) : ?>
            <?php extract($bv); ?>
            <tr class="hover:bg-gray-50">
                <th class="flex gap-3 px-6 py-8 font-normal text-gray-900">
                    <?= $bv['id'] ?>
                </th>
                <td class="px-6 py-4">
                    <?= $bv['id_user'] ?>

                </td>
                <td class="px-6 py-4">
                    <?= $bv['content'] ?>

                </td>
                <td class="px-6 py-4">
                    <?= $bv['time'] ?>

                </td>
                <td class="px-6 py-4">
                    <div class="w-16 rounded">
                        <img src=" ../<?= $bv['hinh_baiviet']; ?>" alt="Không có hình ảnh" class="h-20 w-20">
                    </div>
                    <p><?= $bv['hinh_baiviet'] ?></p> <!-- Thêm dòng này -->
                </td>
                <td class="px-6 py-4">
                    <?= $bl['like'] ?? '0'; ?>
                </td>
                <!-- <td class="px-6 py-4">
                        <div class="flex gap-4">
                            <a href="index.php?act=xoabv&id_bv=" class="btn btn-error">Update</a>
                        </div>
                    </td> -->
                <td class="px-6 py-4">
                    <div class="flex gap-4">
                        <a href="index.php?act=xoabv&id_bv=<?= $bv['id'] ?>" class="btn btn-error"
                            onclick="DeleteId(<?= $bv['id'] ?>)">Delete</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div>

<script>
function DeleteID(id) {
    var confirmDelete = confirm("Bạn có muốn xóa tài khoản này không ?");
    if (confirmDelete) {
        window.location.href = "./index.php?act=xoabv&id_bv" + id;
    } else {

    }
}
</script>