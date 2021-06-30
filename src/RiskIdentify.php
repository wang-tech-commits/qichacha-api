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
        $this->baseData = $this->methodGetHttp($url, $params);

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
        $this->baseData = $this->methodGetHttp($url, $params);

        return $this->getData();
    }

    /**
     * Notes   : 失信核查
     * @Date   : 2021/6/30 11:33
     * @Author : Mr.wang
     * @param $title
     * @return mixed
     * @throws \MrwangTc\QichachaApi\Exceptions\HttpException
     * @throws \MrwangTc\QichachaApi\Exceptions\InvalidArgumentException
     */
    public function shiXinCheck($title)
    {
        $params         = ['searchKey' => $title];
        $url            = '/ShixinCheck/GetList';
        $this->baseData = $this->methodGetHttp($url, $params);

        return $this->getData();
    }

    /**
     * Notes   : 经营异常核查
     * @Date   : 2021/6/30 11:37
     * @Author : Mr.wang
     * @param $title
     * @return mixed
     * @throws \MrwangTc\QichachaApi\Exceptions\HttpException
     * @throws \MrwangTc\QichachaApi\Exceptions\InvalidArgumentException
     */
    public function exceptionCheck($title)
    {
        $params         = ['searchKey' => $title];
        $url            = '/ExceptionCheck/GetList';
        $this->baseData = $this->methodGetHttp($url, $params);

        return $this->getData();
    }

    /**
     * Notes   : 税收违法核查
     * @Date   : 2021/6/30 11:42
     * @Author : Mr.wang
     * @param $title
     * @return mixed
     * @throws \MrwangTc\QichachaApi\Exceptions\HttpException
     * @throws \MrwangTc\QichachaApi\Exceptions\InvalidArgumentException
     */
    public function taxIllegalCheck($title)
    {
        $params         = ['searchKey' => $title];
        $url            = '/TaxIllegalCheck/GetList';
        $this->baseData = $this->methodGetHttp($url, $params);

        return $this->getData();
    }

    /**
     * Notes   : 行政处罚核查
     * @Date   : 2021/6/30 11:49
     * @Author : Mr.wang
     * @param $title
     * @return mixed
     * @throws \MrwangTc\QichachaApi\Exceptions\HttpException
     * @throws \MrwangTc\QichachaApi\Exceptions\InvalidArgumentException
     */
    public function adminPenaltyCheck($title)
    {
        $params         = ['searchKey' => $title];
        $url            = '/AdminPenaltyCheck/GetList';
        $this->baseData = $this->methodGetHttp($url, $params);

        return $this->getData();
    }

}