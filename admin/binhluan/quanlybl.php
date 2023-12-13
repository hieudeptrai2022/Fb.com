<div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Id_Bl</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Bình Luận</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Id_User</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Ngày Bình Luận</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Id Bài Viết</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            <?php foreach ($list_bl as $bl) : ?>
                <?php extract($bl); ?>
                <tr class="hover:bg-gray-50">
                    <th class="flex gap-3 px-6 py-8 font-normal text-gray-900">
                        <?= $id_bl ?>
                    </th>
                    <td class="px-6 py-4">
                        <?= $content ?>

                    </td>
                    <td class="px-6 py-4">
                        <?= $id_user ?>

                    </td>
                    <td class="px-6 py-4">
                        <?= $time ?>

                    </td>
                    <td class="px-6 py-4">
                        <?= $bl['id_baiviet']; ?>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-4">
                            <a href="index.php?act=xoabl&id_bl=<?= $id_bl ?>" class="btn btn-error">Delete</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div>
<?php

$id_pro = 0;
$list_bl = loadall_bl($id_pro);
?>