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

$allow_func = ['main', 'list', 'product', 'list_product'];

$arr_status = [];
$arr_status[1] = "Còn hàng";
$arr_status[2] = "Hết hàng";

$arr_firm = [];
$arr_firm[1] = "MLB";
$arr_firm[2] = "Gucci";
$arr_firm[3] = "Lacoste";
$arr_firm[4] = "Adidas";
$arr_firm[5] = "Tommy";
$arr_firm[6] = "Thom Browne";
$arr_firm[7] = "ADLV";
$arr_firm[8] = "Anta";
$arr_firm[9] = "Dolce & Ganbana";
$arr_firm[10] = "Bape";
$arr_firm[11] = "Versace";
$arr_firm[12] = "Fendi";
$arr_firm[13] = "Burberry";
$arr_firm[14] = "Dior";