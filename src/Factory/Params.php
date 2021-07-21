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
    protected static function fuzzySearch($args): array
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
    protected static function searchWide($args): array
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
    protected static function getBasicDetailsByName($args): array
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
    protected static function getEciImage($args): array
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
    protected static function eciInfoVerify($args): array
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
    protected static function legalProcCheck($args): array
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
    protected static function eciThreeElVerify($args): array
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
    protected static function eciInfoOverview($args): array
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
    protected static function companySelfRiskCount($args): array
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
    protected static function shiXinCheck($args): array
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
    protected static function exceptionCheck($args): array
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
    protected static function taxIllegalCheck($args): array
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
    protected static function adminPenaltyCheck($args): array
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
    protected static function sumptuaryCheck($args): array
    {
        return ['searchKey' => $args[0]];
    }

    /**
     * Notes   : 严重违法核查
     * @Date   : 2021/7/1 14:52
     * @Author : Mr.wang
     * @param $args
     * @return array
     */
    protected static function seriousIllegalCheck($args): array
    {
        return ['searchKey' => $args[0]];
    }

    /**
     * Notes   : 清算核查
     * @Date   : 2021/7/20 17:04
     * @Author : Mr.wang
     * @param $args
     * @return array
     */
    protected static function liquidationCheck($args): array
    {
        return ['searchKey' => $args[0]];
    }

    /**
     * Notes   : 简易注销核查
     * @Date   : 2021/7/20 17:07
     * @Author : Mr.wang
     * @param $args
     * @return array
     */
    protected static function simpleCancelCheck($args): array
    {
        return ['searchKey' => $args[0]];
    }

    /**
     * Notes   : 注销备案核查
     * @Date   : 2021/7/21 17:10
     * @Author : Mr.wang
     * @param $args
     * @return array
     */
    protected static function offFilingCheck($args): array
    {
        return ['searchKey' => $args[0]];
    }

    /**
     * Notes   : 欠税公告核查
     * @Date   : 2021/7/21 17:14
     * @Author : Mr.wang
     * @param $args
     * @return array
     */
    protected static function taxOweNoticeCheck($args): array
    {
        return ['searchKey' => $args[0]];
    }

    /**
     * Notes   : 股权冻结核查
     * @Date   : 2021/7/21 17:20
     * @Author : Mr.wang
     * @param $args
     * @return array
     */
    protected static function equityFreezeCheck($args): array
    {
        return ['searchKey' => $args[0]];
    }

    /**
     * Notes   : 股权质押核查
     * @Date   : 2021/7/21 17:22
     * @Author : Mr.wang
     * @param $args
     * @return array
     */
    protected static function stockRightPledgeCheck($args): array
    {
        return ['searchKey' => $args[0]];
    }

}