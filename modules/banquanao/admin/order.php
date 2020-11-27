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

$page_title = $lang_module['order'];

$post = $err = [];

$post['id'] = $nv_Request->get_int('id', "post,get", 0);
if ($nv_Request->isset_request("submit", "post")) {
    $post['name_customer'] = $nv_Request->get_title('name_customer', "post", '');
    $post['product'] = $nv_Request->get_int('product', "post", 0);
    $post['total'] = $nv_Request->get_int('total', "post", 0);
    if ($post['name_customer'] == '') {
        $err[] = "Chưa chọn khách hàng";
    }
    if ($post['product'] == '') {
        $err[] = "Chưa nhập số lượng sản phẩm";
    }
    if ($post['total'] == '') {
        $err[] = "Chưa nhập tổng tiền";
    }

    if (empty($err)) {
        try {
            if ($post['id'] > 0) {
                // update
                $sql = "UPDATE nv4_banquanao_order SET name_customer=:name_customer, product=:product, total=:total,
                    updatetime=:updatetime WHERE id= " . $post['id'];
                $stmt = $db->prepare($sql);
                $stmt->bindValue("updatetime", 0);
            } else {
                // insert
                $sql = "INSERT INTO nv4_banquanao_order(name_customer, product, total, active, weight, addtime)
                    VALUES (:name_customer, :product, :total, :active, :weight, :addtime)";
                $stmt = $db->prepare($sql);
                $stmt->bindValue("active", 1);

                $_sql= "SELECT COUNT(*) FROM nv4_banquanao_order";
                $weight = $db->query($_sql)->fetchColumn();
                $stmt->bindValue("weight", ($weight + 1));
                $stmt->bindValue("addtime", NV_CURRENTTIME);
            }
            $stmt->bindParam("name_customer", $post['name_customer']);
            $stmt->bindParam("product", $post['product']);
            $stmt->bindParam("total", $post['total']);
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
    $sql = "SELECT * FROM nv4_banquanao_order WHERE id = " . $post['id'];
    $post = $db->query($sql)->fetch();
} else {
    $post['name_customer'] = '';
}

$xtpl = new XTemplate('order.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op);

foreach ($arr_name_customer as $key => $name_customer) {
    $xtpl->assign('NAME_CUSTOMER', array(
        'key' => $key,
        'fullname' => $name_customer['fullname'],
        "selected" => $key == $post['name_customer'] ? 'selected="selected"' : ''
    ));
    $xtpl->parse('main.name_customer');
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
