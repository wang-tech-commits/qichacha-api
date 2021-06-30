<?php

namespace MrwangTc\QichachaApi;

/**
 * Notes    : 信息核验
 * @Date    : 2021/6/29 9:33
 * @Author  : Mr.wang
 * Class MessageVerify
 * @package MrwangTc\QichachaApi\Support
 */
class MessageVerify extends BaseApi
{

    /**
     * Notes   : 企业工商核验信息
     * @Date   : 2021/6/29 14:33
     * @Author : Mr.wang
     * @param $title
     * @return mixed
     * @throws \MrwangTc\QichachaApi\Exceptions\HttpException
     * @throws \MrwangTc\QichachaApi\Exceptions\InvalidArgumentException
     */
    public function eciInfoVerify($title)
    {
        $params         = ['searchKey' => $title];
        $url            = '/ECIInfoVerify/GetInfo';
        $this->baseData = $this->methodGetHttp($url, $params);

        return $this->getData();
    }

    /**
     * Notes   : 企业三要素核验
     * @Date   : 2021/6/29 16:23
     * @Author : Mr.wang
     * @param $creditCode 统一社会信用代码
     * @param $companyName 企业名称
     * @param $operName 法人名称
     * @return mixed
     * @throws \MrwangTc\QichachaApi\Exceptions\HttpException
     * @throws \MrwangTc\QichachaApi\Exceptions\InvalidArgumentException
     */
    public function eciThreeElVerify($creditCode, $companyName, $operName)
    {
        $params         = [
            'creditCode'  => $creditCode,
            'companyName' => $companyName,
            'operName'    => $operName,
        ];
        $url            = '/ECIThreeElVerify/GetInfo';
        $this->baseData = $this->methodGetHttp($url, $params);

        return $this->getData();
    }

}