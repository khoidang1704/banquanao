<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2020 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Sat, 31 Oct 2020 02:20:33 GMT
 */

if (!defined('NV_IS_FILE_ADMIN')) {
    die('Stop!!!');
}

$page_title = $lang_module['detail'];

$post = $err = [];

$post['id'] = $nv_Request->get_int('id', "post,get", 0);
if ($nv_Request->isset_request("submit", "post")) {
    $post['name_product'] = $nv_Request->get_title('name_product', "post", '');
    $post['color'] = $nv_Request->get_int('color', "post", 0);
    $post['size'] = $nv_Request->get_int('size', "post", 0);
    $post['description'] = $nv_Request->get_textarea('description', '', NV_ALLOWED_HTML_TAGS, 1);
    if ($post['name_product'] == '') {
        $err[] = "Chưa chọn sản phẩm";
    }

    if (empty($err)) {
        try {
            if ($post['id'] > 0) {
                // update
                $sql = "UPDATE nv4_banquanao_detail SET name_product=:name_product, color=:color, size=:size, description=:description,
                    updatetime=:updatetime WHERE id= " . $post['id'];
                $stmt = $db->prepare($sql);
                $stmt->bindValue("updatetime", 0);
            } else {
                // insert
                $sql = "INSERT INTO nv4_banquanao_detail(name_product, color, size, description, active, weight, addtime)
                    VALUES (:name_product, :color, :size, :description, :active, :weight, :addtime)";
                $stmt = $db->prepare($sql);
                $stmt->bindValue("active", 1);

                $_sql= "SELECT COUNT(*) FROM nv4_banquanao_detail";
                $weight = $db->query($_sql)->fetchColumn();
                $stmt->bindValue("weight", ($weight + 1));
                $stmt->bindValue("addtime", NV_CURRENTTIME);
            }
            $stmt->bindParam("name_product", $post['name_product']);
            $stmt->bindParam("color", $post['color']);
            $stmt->bindParam("size", $post['size']);
            $stmt->bindParam("description", $post['description']);
            $exe = $stmt->execute();
            if ($exe) {
                if ($post['id'] > 0) {
                    $err[] = "Update ok";
                } else {
                    $err[] = "insert ok";
                }
            } else {
                $err[] = "Lỗi k thực hiện được";
            }
        } catch (PDOException $e) {
            print_r($e);die;
        }
    }
} else if ($post['id'] > 0) {
    // tồn tại id thì thực hiện lấy dữ liệu của id đó
    $sql = "SELECT * FROM nv4_banquanao_detail WHERE id = " . $post['id'];
    $post = $db->query($sql)->fetch();
} else {
    $post['name_product'] = '';
    $post['color'] = 3;
    $post['size'] = 5;
    $post['description'] = '';
}

$xtpl = new XTemplate('detail.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op);

foreach ($arr_color as $key => $color) {
    $xtpl->assign('COLOR', array(
        'key' => $key,
        'title' => $color,
        "checked" => $key == $post['color'] ? 'checked="checked"' : ''
    ));
    $xtpl->parse('main.color');
}

foreach ($arr_size as $key => $size) {
    $xtpl->assign('SIZE', array(
        'key' => $key,
        'title' => $size,
        "checked" => $key == $post['size'] ? 'checked="checked"' : ''
    ));
    $xtpl->parse('main.size');
}

foreach ($arr_name_product as $key => $name_product) {
    $xtpl->assign('NAME_PRODUCT', array(
        'key' => $key,
        'title' => $name_product['name'],
        "selected" => $key == $post['$name_product'] ? 'selected="selected"' : ''
    ));
    $xtpl->parse('main.name_product');
}

$xtpl->assign('POST', $post);
if (!empty($err)) {
    $xtpl->assign('ERR', implode("<br/>", $err));
    $xtpl->parse('main.err');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
