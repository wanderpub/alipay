<?php

// 1. 手动加载入口文件
include "../include.php";

// 2. 准备公众号配置参数
$config = include "./Alipay.php";

try {
    // 实例支付对象
    // $pay = We::AlipayTransfer($config);
    // $pay = new \Alipay\Transfer($config);
    $pay = \Alipay\Transfer::instance($config);

    // 参考链接：https://docs.open.Alipay.com/api_28/Alipay.fund.account.query/
    $result = $pay->queryAccount([
        'Alipay_user_id'     => $config['appid'], // 订单号
        'account_scene_code' => 'SCENE_000_000_000',
    ]);
    echo '<pre>';
    var_export($result);
} catch (Exception $e) {
    echo $e->getMessage();
}

