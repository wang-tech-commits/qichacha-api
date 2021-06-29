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
    public function eCIInfoVerify($title)
    {
        $params         = ['searchKey' => $title];
        $url            = $this->config['domain'] . '/ECIInfoVerify/GetInfo';
        $this->baseData = $this->methodGetDopost($url, $params);

        return $this->getData();
    }

}