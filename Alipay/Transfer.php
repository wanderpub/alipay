<?php

namespace Alipay;

use Alipay\Basic\BasicAlipay;
use Alipay\Exceptions\InvalidArgumentException;

/**
 * 支付宝转账到账户
 * Class Transfer
 * @package Alipay
 */
class Transfer extends BasicAlipay
{

    /**
     * 旧版 向指定支付宝账户转账
     * @param array $options
     * @return mixed
     * @throws \Alipay\Exceptions\InvalidResponseException
     * @throws \Alipay\Exceptions\LocalCacheException
     */
    public function apply($options)
    {
        $this->options->set('method', 'Alipay.fund.trans.toaccount.transfer');
        return $this->getResult($options);
    }

    /**
     * 新版 向指定支付宝账户转账
     * @param array $options
     * @return array|bool
     * @throws \Alipay\Exceptions\InvalidResponseException
     * @throws \Alipay\Exceptions\LocalCacheException
     */
    public function create($options = [])
    {
        $this->setAppCertSnAndRootCertSn();
        $this->options->set('method', 'Alipay.fund.trans.uni.transfer');
        return $this->getResult($options);
    }

    /**
     * 新版 转账业务单据查询接口
     * @param array $options
     * @return array|bool
     * @throws \Alipay\Exceptions\InvalidResponseException
     * @throws \Alipay\Exceptions\LocalCacheException
     */
    public function queryResult($options = [])
    {
        $this->setAppCertSnAndRootCertSn();
        $this->options->set('method', 'Alipay.fund.trans.common.query');
        return $this->getResult($options);

    }

    /**
     * 新版 支付宝资金账户资产查询接口
     * @param array $options
     * @return array|bool
     * @throws \Alipay\Exceptions\InvalidResponseException
     * @throws \Alipay\Exceptions\LocalCacheException
     */
    public function queryAccount($options = [])
    {
        $this->setAppCertSnAndRootCertSn();
        $this->options->set('method', 'Alipay.fund.account.query');
        return $this->getResult($options);
    }

    /**
     * 新版 设置网关应用公钥证书SN、支付宝根证书SN
     */
    protected function setAppCertSnAndRootCertSn()
    {
        if (!$this->config->get('app_cert')) {
            throw new InvalidArgumentException("Missing Config -- [app_cert]");
        }
        if (!$this->config->get('root_cert')) {
            throw new InvalidArgumentException("Missing Config -- [root_cert]");
        }
        $this->options->set('app_cert_sn', $this->getCertSN($this->config->get('app_cert')));
        $this->options->set('Alipay_root_cert_sn', $this->getRootCertSN($this->config->get('root_cert')));
        if (!$this->options->get('app_cert_sn')) {
            throw new InvalidArgumentException("Missing options -- [app_cert_sn]");
        }
        if (!$this->options->get('Alipay_root_cert_sn')) {
            throw new InvalidArgumentException("Missing options -- [Alipay_root_cert_sn]");
        }
    }
}