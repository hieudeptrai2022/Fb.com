<?php


function insert_newtus($id_user, $content, $time, $hinh)
{
	$sql = "insert into `bai-viet` (id_user, content, time, hinh_baiviet) values ('$id_user','$content','$time','$hinh')";
	$arr = pdo_execute($sql);
	return $arr;
}

function select_baiviet()
{
	$sql = "SELECT * FROM `bai-viet` order by time desc";
	$arr = pdo_query_all($sql);
	return $arr;
}


function select_join_user($id)
{
	$sql = "SELECT `bai-viet`.id, `bai-viet`.content, `bai-viet`.time, `bai-viet`.`hinh_baiviet`, `bai-viet`.`like`, `tai-khoan`.username, `tai-khoan`.hinh
            FROM `bai-viet`
            JOIN `tai-khoan` ON `bai-viet`.id_user = `tai-khoan`.id
            WHERE `tai-khoan`.id = $id
            ORDER BY `bai-viet`.time DESC";

	$arr = pdo_query_all($sql);
	return $arr;
}

function select_baiviet_byid($id) {
	$sql = "SELECT * FROM `bai-viet` WHERE id = $id";
	return pdo_query_one($sql);
}

function update_baiviet($id,$id_user, $content, $time, $hinh) {
	$sql = "UPDATE `bai-viet` SET id_user = '$id_user', content = '$content', time = '$time', hinh_baiviet = '$hinh' WHERE id = $id";
	pdo_execute($sql);
}

function them_baiviet_yt($id_user,$id_post) {
	$sql = "INSERT INTO `baiviet_yeuthich` (id_user,id_post) VALUES ('$id_user','$id_post')";
	pdo_execute($sql);
}

function delete_baiviet($id)
{
	$sql = "delete from `bai-viet` where id='$id'";
	$arr = pdo_delete($sql);
	return $arr;
}


function load_all_yeuthich($id_user) {
	$sql = "SELECT
				baiviet_yeuthich.id,
				baiviet_yeuthich.id_user,
				baiviet_yeuthich.id_post,
				`bai-viet`.id,
				`bai-viet`.id_user,
				`bai-viet`.content,
				`bai-viet`.time,
				`bai-viet`.hinh_baiviet,
				`tai-khoan`.id,
				`tai-khoan`.hinh as hinhuser,
				`tai-khoan`.username
			FROM 
				`baiviet_yeuthich` 
			JOIN
				`bai-viet` ON baiviet_yeuthich.id_post = `bai-viet`.id
			JOIN
				`tai-khoan` ON baiviet_yeuthich.id_user = `bai-viet`.id_user
			WHERE 
			baiviet_yeuthich.id_user = $id_user
			GROUP BY baiviet_yeuthich.id
			ORDER BY baiviet_yeuthich.id DESC";
	return pdo_query($sql);
}