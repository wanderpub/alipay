<?php

// 1. 手动加载入口文件
include "../include.php";

// 2. 准备公众号配置参数
$config = include "./alipay.php";

try {
    // 实例支付对象
    // $pay = We::AlipayScan($config);
    // $pay = new \Alipay\Scan($config);
    $pay = \Alipay\Scan::instance($config);

    // 参考链接：https://docs.open.alipay.com/api_1/alipay.trade.precreate
    $result = $pay->apply([
        'out_trade_no' => '14321412', // 订单号
        'total_amount' => '13', // 订单金额，单位：元
        'subject'      => '订单商品标题', // 订单商品标题
    ]);

    echo '<pre>';
    var_export($result);
} catch (Exception $e) {
    echo $e->getMessage();
}


