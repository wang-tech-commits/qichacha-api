<?php

namespace MrwangTc\QichachaApi;

/**
 * Notes    : 工商信息查询
 * @Date    : 2021/6/29 9:25
 * @Author  : Mr.wang
 * Class MessageQuery
 * @package MrwangTc\QichachaApi
 */
class MessageQuery extends BaseApi
{
    protected $PageNum;

    protected $PageSize;

    public function fuzzySearch($title)
    {
        $this->getHeader();
        $params = ['searchKey' => $title];
        $this->getParams($params);
        $url            = $this->config['domain'] . '/FuzzySearch/GetList';
        $this->baseData = $this->dopost($url);
        return $this->getData();
    }



}