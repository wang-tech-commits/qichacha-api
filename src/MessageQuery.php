<?php

namespace MrwangTc\QichachaApi;

/**
 * Notes    : 工商信息查询（暂时拿掉所有选填选项，功能预留）
 * @Date    : 2021/6/29 9:25
 * @Author  : Mr.wang
 * Class MessageQuery
 * @package MrwangTc\QichachaApi
 */
class MessageQuery extends BaseApi
{

    protected $PageNum;

    protected $PageSize;

    /**
     * Notes   : 企业工商模糊搜索
     * @Date   : 2021/6/29 11:26
     * @Author : Mr.wang
     * @param $title
     * @return mixed
     * @throws \MrwangTc\QichachaApi\Exceptions\HttpException
     * @throws \MrwangTc\QichachaApi\Exceptions\InvalidArgumentException
     */
    public function fuzzySearch($title)
    {
        $this->getHeader();
        $params = ['searchKey' => $title];
        $this->getParams($params);
        $url            = $this->config['domain'] . '/FuzzySearch/GetList';
        $this->baseData = $this->methodGetDopost($url);

        return $this->getData();
    }

    /**
     * Notes   : 企业工商数据查询(多维度查询)
     * @Date   : 2021/6/29 11:26
     * @Author : Mr.wang
     * @param $title
     * @return mixed
     * @throws \MrwangTc\QichachaApi\Exceptions\HttpException
     * @throws \MrwangTc\QichachaApi\Exceptions\InvalidArgumentException
     */
    public function SearchWide($title)
    {
        $this->getHeader();
        $params = ['keyword' => $title];
        $this->getParams($params);
        $url            = $this->config['domain'] . '/ECIV4/SearchWide';
        $this->baseData = $this->methodGetDopost($url);

        return $this->getData();
    }

    /**
     * Notes   : 企业工商数据查询(企业工商详情)
     * @Date   : 2021/6/29 11:29
     * @Author : Mr.wang
     * @param $title
     * @return mixed
     * @throws \MrwangTc\QichachaApi\Exceptions\HttpException
     * @throws \MrwangTc\QichachaApi\Exceptions\InvalidArgumentException
     */
    public function GetBasicDetailsByName($title)
    {
        $this->getHeader();
        $params = ['keyword' => $title];
        $this->getParams($params);
        $url            = $this->config['domain'] . '/ECIV4/GetBasicDetailsByName';
        $this->baseData = $this->methodGetDopost($url);

        return $this->getData();
    }

}