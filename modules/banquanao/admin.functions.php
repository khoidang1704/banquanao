<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2020 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Sat, 31 Oct 2020 02:20:33 GMT
 */

if (!defined('NV_ADMIN') or !defined('NV_MAINFILE') or !defined('NV_IS_MODADMIN')) {
    die('Stop!!!');
}

define('NV_IS_FILE_ADMIN', true);

$allow_func = ['main', 'list', 'product', 'list_product', 'detail', 'list_detail', 'category', 'list_category', 'order', 'list_order'];

$arr_status = [];
$arr_status[1] = "Còn hàng";
$arr_status[2] = "Hết hàng";

$sql = "SELECT id,title FROM `nv4_shop_category` ORDER BY weight ASC";
$result = $db->query($sql);
$arr_firm = [];
while ($firm = $result->fetch()) {
    $arr_firm[$firm['id']] = $firm;
}

$sql = "SELECT * FROM `nv4_banquanao_user` ORDER BY id ASC";
$result = $db->query($sql);
$arr_name_customer = [];
while ($name_customer = $result->fetch()) {
    $arr_name_customer[$name_customer['id']] = $name_customer;
}

$arr_color = [];
$arr_color[1] = "Trắng";
$arr_color[2] = "Đen";
$arr_color[3] = "N/A";

$arr_size = [];
$arr_size[1] = "M";
$arr_size[2] = "L";
$arr_size[3] = "XL";
$arr_size[4] = "XXL";
$arr_size[5] = "N/A";

$sql = "SELECT id, name FROM `nv4_banquanao_product` ORDER BY weight ASC";
$result = $db->query($sql);
$arr_name_product = [];
while ($name_product = $result->fetch()) {
    $arr_name_product[$name_product['id']] = $name_product;
}