<!-- Tài khoản -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.9/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    .frmtitle {
        text-align: center;
    }

    .border-tk {
        text-align: center;
        border: 1px solid #ccc;
    }

    .border-tk th,
    .border-tk td {
        padding: 10px;
    }

    .border-tk th {
        background-color: #f0f0f0;
    }

    .border-tk img {
        max-width: 100px;
        height: auto;
    }

    .border-tk a {
        text-decoration: none;
    }

    .border-tk a input[type="button"] {
        background-color: #3498db;
        color: #fff;
        border: none;
        padding: 8px 12px;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <div class="frmtitle">
        <h1>Danh sách khách hàng</h1>
    </div>

    <!-- include function selectUser(); -->

    <?php $result =  selectUser(); ?>
    <!-- component -->
    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Id</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Image</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Username</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Password</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Email</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Role</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Active</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">

                <?php foreach ($result as $key => $value) :  ?>

                <tr class="hover:bg-gray-50">
                    <th class="flex gap-3 px-6 py-8 font-normal text-gray-900">
                        <?= $value['id'] ?>
                    </th>
                    <td class="px-6 py-4">
                        <div class="relative h-10 w-10">
                            <img src=" ../images/<?= $value['hinh'] ?>" alt="123" />
                            <span
                                class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                        </div>
                        <p><?= $value['hinh'] ?></p> <!-- Thêm dòng này -->
                    </td>
                    <td class="px-6 py-4">
                        <?= $value['username'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?= $value['password'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?= $value['email'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?= $value['vai_tro'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?= $value['kich_hoat'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?= $value['ho_ten'] ?>
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex gap-4">

                            <a href="./index.php?act=dskh&id=<?= $value['id'] ?>" class="btn btn-error">Delete</a>
                        </div>
                    </td>
                </tr>

                <?php endforeach; ?>


            </tbody>
        </table>
    </div>


</body>

</html>