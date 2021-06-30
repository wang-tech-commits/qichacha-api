<?php

namespace MrwangTc\QichachaApi\Factory;

use MrwangTc\QichachaApi\Exceptions\InvalidArgumentException;

class Params
{

    public static function paramsMethod($name, $args)
    {
        try {
            return self::$name($args);
        } catch (\Exception $e) {
            throw new InvalidArgumentException('参数不存在', 404);
        }
    }

    /**
     * Notes   : 企业工商模糊搜索
     * @Date   : 2021/6/30 15:50
     * @Author : Mr.wang
     * @param $args
     * @return array
     */
    protected static function fuzzySearch($args)
    {
        return ['searchKey' => $args[0]];
    }

    /**
     * Notes   : 企业工商数据查询(多维度查询)
     * @Date   : 2021/6/30 15:55
     * @Author : Mr.wang
     * @param $args
     * @return array
     */
    protected static function searchWide($args)
    {
        return ['keyword' => $args[0]];
    }

    /**
     * Notes   : 企业工商数据查询(企业工商详情)
     * @Date   : 2021/6/30 15:57
     * @Author : Mr.wang
     * @param $args
     * @return array
     */
    protected static function getBasicDetailsByName($args)
    {
        return ['keyword' => $args[0]];
    }

    /**
     * Notes   : 获取工商快照
     * @Date   : 2021/6/30 15:58
     * @Author : Mr.wang
     * @param $args
     * @return array
     */
    protected static function getEciImage($args)
    {
        return ['keyWord' => $args[0]];
    }

    /**
     * Notes   : 企业工商核验信息
     * @Date   : 2021/6/30 16:03
     * @Author : Mr.wang
     * @param $args
     * @return array
     */
    protected static function eciInfoVerify($args)
    {
        return ['searchKey' => $args[0]];
    }

    /**
     * Notes   : 诉讼信息核查
     * @Date   : 2021/6/30 15:53
     * @Author : Mr.wang
     * @param $args
     * @return array
     */
    protected static function legalProcCheck($args)
    {
        return ['searchKey' => $args[0]];
    }

    /**
     * Notes   : 企业三要素核验
     * @Date   : 2021/6/30 16:04
     * @Author : Mr.wang
     * @param $args
     * @return array
     */
    protected static function eciThreeElVerify($args)
    {
        return [
            'creditCode'  => $args[0],
            'companyName' => $args[1],
            'operName'    => $args[2],
        ];
    }

    /**
     * Notes   : 企业工商风险扫描(全项)
     * @Date   : 2021/6/30 16:20
     * @Author : Mr.wang
     * @param $args
     * @return array
     */
    protected static function eciInfoOverview($args)
    {
        return ['searchKey' => $args[0]];
    }

    /**
     * Notes   : 企业自身风险扫描
     * @Date   : 2021/6/30 16:26
     * @Author : Mr.wang
     * @param $args
     * @return array
     */
    protected static function companySelfRiskCount($args)
    {
        return ['searchKey' => $args[0]];
    }

    /**
     * Notes   : 失信核查
     * @Date   : 2021/6/30 16:35
     * @Author : Mr.wang
     * @param $args
     * @return array
     */
    protected static function shiXinCheck($args)
    {
        return ['searchKey' => $args[0]];
    }

    /**
     * Notes   : 经营异常核查
     * @Date   : 2021/6/30 16:35
     * @Author : Mr.wang
     * @param $args
     * @return array
     */
    protected static function exceptionCheck($args)
    {
        return ['searchKey' => $args[0]];
    }

    /**
     * Notes   : 税收违法核查
     * @Date   : 2021/6/30 16:36
     * @Author : Mr.wang
     * @param $args
     * @return array
     */
    protected static function taxIllegalCheck($args)
    {
        return ['searchKey' => $args[0]];
    }

    /**
     * Notes   : 行政处罚核查
     * @Date   : 2021/6/30 16:36
     * @Author : Mr.wang
     * @param $args
     * @return array
     */
    protected static function adminPenaltyCheck($args)
    {
        return ['searchKey' => $args[0]];
    }

    /**
     * Notes   : 限制高消费核查
     * @Date   : 2021/6/30 17:17
     * @Author : Mr.wang
     * @param $args
     * @return array
     */
    protected static function sumptuaryCheck($args)
    {
        return ['searchKey' => $args[0]];
    }

}