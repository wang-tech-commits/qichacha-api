<?php

namespace MrwangTc\QichachaApi;

/**
 * Notes    : 风险识别
 * @Date    : 2021/6/29 17:03
 * @Author  : Mr.wang
 * Class RiskIdentify
 * @package MrwangTc\QichachaApi
 */
class RiskIdentify extends BaseApi
{

    /**
     * Notes   : 企业工商风险扫描(全项)
     * @Date   : 2021/6/29 17:09
     * @Author : Mr.wang
     * @param $title
     * @return mixed
     * @throws \MrwangTc\QichachaApi\Exceptions\HttpException
     * @throws \MrwangTc\QichachaApi\Exceptions\InvalidArgumentException
     */
    public function eciInfoOverview($title)
    {
        $params         = ['searchKey' => $title];
        $url            = '/ECIInfoOverview/GetInfo';
        $this->baseData = $this->methodGetDopost($url, $params);

        return $this->getData();
    }

    /**
     * Notes   : 企业自身风险扫描
     * @Date   : 2021/6/29 17:11
     * @Author : Mr.wang
     * @param $title
     * @return mixed
     * @throws \MrwangTc\QichachaApi\Exceptions\HttpException
     * @throws \MrwangTc\QichachaApi\Exceptions\InvalidArgumentException
     */
    public function companySelfRiskCount($title)
    {
        $params         = ['searchKey' => $title];
        $url            = '/CompanySelfRiskCount/GetInfo';
        $this->baseData = $this->methodGetDopost($url, $params);

        return $this->getData();
    }

}