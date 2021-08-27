<?php

namespace Alipay;

use Alipay\Basic\BasicAlipay;

/**
 * 支付宝刷卡支付
 * Class Pos
 * @package Alipay
 */
class Pos extends BasicAlipay
{
    /**
     * Pos constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        parent::__construct($options);
        $this->options->set('method', 'Alipay.trade.pay');
        $this->params->set('product_code', 'FACE_TO_FACE_PAYMENT');
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