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

$page_title = $lang_module['category'];

$post = $err = [];
$post['id'] = $nv_Request->get_int('id', "post,get", 0);
if ($nv_Request->isset_request("submit", "post")) {
    $post['title'] = $nv_Request->get_title('title', "post", '');
    if ($post['title'] == '') {
        $err[] = "Chưa nhập tên hãng";
    }
    if (empty($err)) {
        try {
            if ($post['id'] > 0) {
                // update
                $sql = "UPDATE nv4_shop_category SET title=:title, updatetime=:updatetime WHERE id= " . $post['id'];
                $stmt = $db->prepare($sql);
                $stmt->bindValue("updatetime", 0);
            } else {
                // insert
                $sql = "INSERT INTO nv4_shop_category(title, weight, addtime) VALUES (:title, :weight, :addtime)";
                $stmt = $db->prepare($sql);

                $_sql= "SELECT COUNT(*) FROM nv4_banquanao_product";
                $weight = $db->query($_sql)->fetchColumn();
                $stmt->bindValue("weight", ($weight + 1));
                $stmt->bindValue("addtime", NV_CURRENTTIME);
            }
            $stmt->bindParam("title", $post['title']);
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
    $sql = "SELECT * FROM nv4_shop_category WHERE id = " . $post['id'];
    $post = $db->query($sql)->fetch();
} else {
    $post['title'] = '';
}

$xtpl = new XTemplate('category.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op);

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
