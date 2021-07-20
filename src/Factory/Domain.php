<?php

namespace MrwangTc\QichachaApi\Factory;

use MrwangTc\QichachaApi\Exceptions\InvalidArgumentException;

class Domain
{

    const DOMAIN = [
        'fuzzySearch'           => 'FuzzySearch/GetList',  // 企业工商模糊搜索
        'searchWide'            => 'ECIV4/SearchWide',  // 企业工商数据查询(多维度查询)
        'getBasicDetailsByName' => 'ECIV4/GetBasicDetailsByName',  // 企业工商数据查询(企业工商详情)
        'getEciImage'           => 'ECIImage/GetEciImage',  // 获取工商快照
        'eciInfoVerify'         => 'ECIInfoVerify/GetInfo',  // 企业工商核验信息
        'eciThreeElVerify'      => 'ECIThreeElVerify/GetInfo',  // 企业三要素核验
        'eciInfoOverview'       => 'ECIInfoOverview/GetInfo',  // 企业工商风险扫描
        'companySelfRiskCount'  => 'CompanySelfRiskCount/GetInfo',  // 企业自身风险扫描
        'legalProcCheck'        => 'LegalProcCheck/GetDetail',  // 诉讼信息核查
        'shiXinCheck'           => 'ShixinCheck/GetList',  // 失信核查
        'exceptionCheck'        => 'ExceptionCheck/GetList',  // 经营异常核查
        'taxIllegalCheck'       => 'TaxIllegalCheck/GetList',  // 税收违法核查
        'adminPenaltyCheck'     => 'AdminPenaltyCheck/GetList',  // 行政处罚核查
        'sumptuaryCheck'        => 'SumptuaryCheck/GetList',  // 限制高消费核查
        'seriousIllegalCheck'   => 'SeriousIllegalCheck/GetList',  // 严重违法核查
        'liquidationCheck'      => 'LiquidationCheck/GetDetail',  // 清算核查
        'simpleCancelCheck'     => 'SimpleCancelCheck/GetInfo',  // 简易注销核查
    ];

    public static function domainMethod($args)
    {
        try {
            return self::DOMAIN[$args];
        } catch (\Exception $e) {
            throw new InvalidArgumentException('地址不存在', 404);
        }
    }

}