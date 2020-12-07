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

$page_title = $lang_module['product'];

$post = $err = [];

$post['id'] = $nv_Request->get_int('id', "post,get", 0);
if ($nv_Request->isset_request("submit", "post")) {
    $post['name'] = $nv_Request->get_title('name', "post", '');
    $post['firm'] = $nv_Request->get_int('firm', "post", 0);
    $post['price'] = $nv_Request->get_int('price', "post", 0);
    $post['status'] = $nv_Request->get_int('status', "post", 0);
    $post['information'] = $nv_Request->get_textarea('information', '', NV_ALLOWED_HTML_TAGS, 1);
    if (isset($_FILES, $_FILES['uploadfile'], $_FILES['uploadfile']['tmp_name']) and is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
        // Khởi tạo Class upload
        $upload = new NukeViet\Files\Upload($admin_info['allow_files_type'], $global_config['forbid_extensions'], $global_config['forbid_mimes'], NV_UPLOAD_MAX_FILESIZE, NV_MAX_WIDTH, NV_MAX_HEIGHT);

        // Thiết lập ngôn ngữ, nếu không có dòng này thì ngôn ngữ trả về toàn tiếng Anh
        $upload->setLanguage($lang_global);

        // Tải file lên server
        $upload_info = $upload->save_file($_FILES['uploadfile'], NV_UPLOADS_REAL_DIR . '/' . $module_name, false, $global_config['nv_auto_resize']);
    }

    if ($post['name'] == '') {
        $err[] = "Chưa nhập tên sản phẩm";
    }

    if (empty($err)) {
        try {
            if ($post['id'] > 0) {
                // update
                $sql = "UPDATE nv4_banquanao_product SET name=:name, firm:=firm, price:= price, status:=status, image:=image,
                    information:=information, updatetime=:updatetime WHERE id= " . $post['id'];
                $stmt = $db->prepare($sql);
                $stmt->bindValue("updatetime", 0);
            } else {
                // insert
                $sql = "INSERT INTO nv4_banquanao_product(name, firm, price, status, image, information, active, weight, addtime)
                    VALUES (:name, :firm, :price, :status, :image, :information, :active, :weight, :addtime)";
                $stmt = $db->prepare($sql);
                $stmt->bindValue("active", 1);

                $_sql= "SELECT COUNT(*) FROM nv4_banquanao_product";
                $weight = $db->query($_sql)->fetchColumn();
                $stmt->bindValue("weight", ($weight + 1));
                $stmt->bindValue("addtime", NV_CURRENTTIME);
            }
            $stmt->bindParam("name", $post['name']);
            $stmt->bindParam("firm", $post['firm']);
            $stmt->bindParam("price", $post['price']);
            $stmt->bindParam("status", $post['status']);
            $stmt->bindParam("image", $upload_info['basename']);
            $stmt->bindParam("information", $post['information']);
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
    $sql = "SELECT * FROM nv4_banquanao_product WHERE id = " . $post['id'];
    $post = $db->query($sql)->fetch();
} else {
    $post['name'] = '';
    $post['firm'] = 0;
    $post['status'] = 1;
    $post['information'] = '';
}

$xtpl = new XTemplate('product.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op);

foreach ($arr_status as $key => $status) {
    $xtpl->assign('STATUS', array(
        'key' => $key,
        'title' => $status,
        "checked" => $key == $post['status'] ? 'checked="checked"' : ''
    ));
    $xtpl->parse('main.status');
}

foreach ($arr_firm as $key => $firm) {
    $xtpl->assign('FIRM', array(
        'key' => $key,
        'title' => $firm,
        "selected" => $key == $post['firm'] ? 'selected="selected"' : ''
    ));
    $xtpl->parse('main.firm');
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
