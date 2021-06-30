<?php

namespace MrwangTc\QichachaApi\Factory;

use MrwangTc\QichachaApi\Exceptions\InvalidArgumentException;

class Domain
{

    const DOMAIN = [
        'fuzzySearch'           => '/FuzzySearch/GetList',
        'searchWide'            => '/ECIV4/SearchWide',
        'getBasicDetailsByName' => '/ECIV4/GetBasicDetailsByName',
        'getEciImage'           => '/ECIImage/GetEciImage',
        'eciInfoVerify'         => '/ECIInfoVerify/GetInfo',
        'eciThreeElVerify'      => '/ECIThreeElVerify/GetInfo',
        'eciInfoOverview'       => '/ECIInfoOverview/GetInfo',
        'companySelfRiskCount'  => '/CompanySelfRiskCount/GetInfo',
        'legalProcCheck'        => '/LegalProcCheck/GetDetail',
        'shiXinCheck'           => '/ShixinCheck/GetList',
        'exceptionCheck'        => '/ExceptionCheck/GetList',
        'taxIllegalCheck'       => '/TaxIllegalCheck/GetList',
        'adminPenaltyCheck'     => '/AdminPenaltyCheck/GetList',
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