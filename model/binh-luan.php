<?php
function insert_bl($content, $id_user, $time, $id_baiviet)
{
    $sql = "insert into `binh-luan`(content, id_user, time, id_baiviet) values ('$content','$id_user', '$time', '$id_baiviet')";
    pdo_execute($sql);
}
function load_bl_by_baiviet($id_baiviet)
{
    $sql = "SELECT * FROM `binh-luan` WHERE id_baiviet = $id_baiviet";
    $listbl = pdo_query_all($sql);
    return $listbl;
}

function delete_bl($id_bl)
{
    $sql = "delete from `binh-luan` where id_bl = $id_bl";
    pdo_execute($sql);
}
function load_bl()
{
    $sql = "select * from `binh-luan` where 1";
    $listbl = pdo_query($sql);
    return $listbl;
}


function loadall_bl($id_pro)
{
    $sql = "select 
                `binh-luan`.id_bl,
                `binh-luan`.content,
                `binh-luan`.id_user,
                `binh-luan`.time,
                `binh-luan`.id_baiviet,
                `tai-khoan`.id,
                `tai-khoan`.username,
                `tai-khoan`.hinh,
                `bai-viet`.id
            from 
                `binh-luan` 
            join
                `tai-khoan` on `binh-luan`.id_user = `tai-khoan`.id
            join
                `bai-viet` on `binh-luan`.id_baiviet = `bai-viet`.id
            WHERE 
                `binh-luan`.id_baiviet = $id_pro";
    $list_bl = pdo_query_all($sql);
    return $list_bl;
}
