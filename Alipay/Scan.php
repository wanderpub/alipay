<?php

namespace AliPay;

use Alipay\Basic\BasicAliPay;

/**
 * 支付宝扫码支付
 * Class Scan
 * @package AliPay
 */
class Scan extends BasicAliPay
{
    /**
     * Scan constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        parent::__construct($options);
        $this->options->set('method', 'alipay.trade.precreate');
    }

    /**
     * 创建数据操作
     * @param array $options
     * @return mixed
     * @throws \Alipay\Exceptions\InvalidResponseException
     * @throws \Alipay\Exceptions\LocalCacheException
     */
    public function apply($options)
    {
        return $this->getResult($options);
    }
}