<?php

namespace Alipay;

use Alipay\Basic\BasicAlipay;

/**
 * 支付宝电子面单下载
 * Class Bill
 * @package Alipay
 */
class Bill extends BasicAlipay
{
    /**
     * Bill constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        parent::__construct($options);
        $this->options->set('method', 'Alipay.data.dataservice.bill.downloadurl.query');
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