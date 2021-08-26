<?php

return [
    // 沙箱模式
    'debug'       => true,
    // 签名类型（RSA|RSA2）
    'sign_type'   => "RSA2",
    // 应用ID
    'appid'       => '20160000000',
    // 支付宝公钥内容 (1行填写，特别注意：这里是支付宝公钥，不是应用公钥，最好从开发者中心的网页上去复制)
    'public_key'  => '',// 支付宝私钥内容 (1行填写)
    'private_key' => '',// 应用公钥证书内容（新版资金类接口转 app_cert_sn）
    'app_cert'    => '',
    // 支付宝根证书内容（新版资金类接口转 alipay_root_cert_sn）
    'root_cert'   => '',
    // 支付成功通知地址
    'notify_url'  => '',
    // 网页支付回跳地址
    'return_url'  => '',
];