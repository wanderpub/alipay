<?php

// 1. 手动加载入口文件
include "../include.php";

// 2. 准备公众号配置参数
$config = include "./alipay.php";

// 参考公共参数  https://docs.open.alipay.com/203/107090/
$config['notify_url'] = 'http://alipay.com/test/Alipay-notify.php';
$config['return_url'] = 'http://alipay.com/test/Alipay-success.php';

try {
    // 实例支付对象
    // $pay = We::AlipayWeb($config);
    // $pay = new \Alipay\Web($config);
    $pay = \Alipay\Web::instance($config);

    // 参考链接：https://docs.open.alipay.com/api_1/alipay.trade.page.pay
    $result = $pay->apply([
        'out_trade_no' => time(), // 商户订单号
        'total_amount' => '1', // 支付金额
        'subject'      => '支付订单描述', // 支付订单描述
    ]);

    echo $result;
} catch (Exception $e) {
    echo $e->getMessage();
}


