<?php

namespace Alipay;

use Alipay\Basic\BasicAlipay;

/**
 * 手机WAP网站支付支持
 * Class Wap
 * @package Alipay
 */
class Wap extends BasicAlipay
{
    /**
     * Wap constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        parent::__construct($options);
        $this->options->set('method', 'Alipay.trade.wap.pay');
        $this->params->set('product_code', 'QUICK_WAP_WAY');
    }

    /**
     * 创建数据操作
     * @param array $options
     * @return string
     */
    public function apply($options)
    {
        parent::applyData($options);
        return $this->buildPayHtml();
    }
}