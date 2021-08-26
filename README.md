# Alipay
支付宝支付接口 for PHP
----

建议在 PHP7.1 上运行以获取最佳性能；
Alipay API SDK for PHP

功能描述
----

* 支付宝支付（账单、转账、App支付、刷卡支付、扫码支付、Web支付、Wap支付等）

Alipay 是基于官方API接口封装，在开发前，必需先阅读支付宝官方文档。

* 支付宝官方文档：https://opendocs.alipay.com/apis

安装使用
----
1.1 通过 Composer 来管理安装

```shell
# 首次安装 
composer require wander/alipay

# 更新 Alipay
composer update wander/alipay
```

1.2 如果不使用 Composer， 可以下载 Alipay 并解压到项目中

```php
# 在项目中加载初始化文件
include "您的目录/Alipay/include.php";
```


支付宝支付配置说明
----

* 支付参数配置（可用沙箱模式）

```php
$config = [
    // 沙箱模式
    'debug'       => true,
    // 签名类型（RSA|RSA2）
    'sign_type'   => "RSA2",
    // 应用ID
    'appid'       => '20160909000000',
    // 支付宝公钥文字内容 (1行填写，特别注意：这里是支付宝公钥，不是应用公钥，最好从开发者中心的网页上去复制)
    'public_key'  => 'MIIBIj0000...',
    // 支付宝私钥文字内容 (1行填写)
    'private_key' => 'MIIEv0000...',
    // 应用公钥证书完整内容（新版资金类接口转 app_cert_sn）
    'app_cert'    => '',
    // 支付宝根证书完整内容（新版资金类接口转 alipay_root_cert_sn）
    'root_cert'   => '',
    // 支付成功通知地址
    'notify_url'  => '',
    // 网页支付回跳地址
    'return_url'  => '',
];
```

* 支付宝发起PC网站支付

```php
// 参考公共参数  https://docs.open.alipay.com/203/107090/
$config['notify_url'] = '';//支付回调地址
$config['return_url'] = '';//支付成功返回地址

try {
    
    // 实例支付对象
    $pay = \AliPay\Web::instance($config);
    // $pay = new \AliPay\Web($config);
    
    // 参考链接：https://docs.open.alipay.com/api_1/alipay.trade.page.pay
    $result = $pay->apply([
        'out_trade_no' => time(), // 商户订单号
        'total_amount' => '1',    // 支付金额
        'subject'      => '支付订单描述', // 支付订单描述
    ]);
    
    echo $result; // 直接输出HTML（提交表单跳转)
    
} catch (Exception $e) {

    // 异常处理
    echo $e->getMessage();
    
}
```

* 支付宝发起手机网站支付

```php
// 参考公共参数  https://docs.open.alipay.com/203/107090/
$config['notify_url'] = '';//支付回调地址
$config['return_url'] = '';//支付成功返回地址

try {

    // 实例支付对象
    $pay = \AliPay\Wap::instance($config);
    // $pay = new \AliPay\Wap($config);

    // 参考链接：https://docs.open.alipay.com/api_1/alipay.trade.wap.pay
    $result = $pay->apply([
        'out_trade_no' => time(), // 商户订单号
        'total_amount' => '1',    // 支付金额
        'subject'      => '支付订单描述', // 支付订单描述
    ]);

    echo $result; // 直接输出HTML（提交表单跳转)

} catch (Exception $e) {

    // 异常处理
    echo $e->getMessage();

}
```



开源协议
----

* Alipay 基于`MIT`协议发布，任何人可以用在任何地方，不受约束
* Alipay 部分代码来自互联网，若有异议，可以联系作者(13834563@qq.com)进行删除

