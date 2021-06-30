# qichacha-api
> 企查查API https://openapi.qcc.com/
## 1.安装

```shell script
composer require wang-tech-commits/qichacha-api
```

## 2.开始使用

### 1.工商信息查询

```php
<?php

use MrwangTc\QichachaApi\MessageQuery;

$config = [
    'key'       => 'key',
    'SecretKey' => 'secret',
];
// 初始化配置
$qichacha = new MessageQuery($config);

// 企业工商模糊搜索
return $qichacha->fuzzySearch('企业名称');
// 企业工商数据查询(多维度查询)
return $qichacha->searchWide('企业名称');
// 企业工商数据查询(企业工商详情)
return $qichacha->getBasicDetailsByName('企业名称');
// 获取工商快照
return $qichacha->getEciImage('企业名称');
```

### 2.信息核验查询

```php
<?php

use MrwangTc\QichachaApi\MessageVerify;

$config = [
    'key'       => 'key',
    'SecretKey' => 'secret',
];
// 初始化配置
$qichacha = new MessageVerify($config);

// 企业工商模糊搜索
return $qichacha->eciInfoVerify('企业名称');
// 企业三要素核验
return $qichacha->eciThreeElVerify('统一社会信用代码', '企业名称', '法人名称');
```

### 3.风险识别查询

```php
use MrwangTc\QichachaApi\RiskIdentify;
$config = [
    'key'       => 'key',
    'SecretKey' => 'secret',
];
// 初始化配置
$qichacha = new RiskIdentify($config);

// 企业工商风险扫描(全项)
return $qichacha->eciInfoOverview('企业名称');
// 企业自身风险扫描
return $qichacha->companySelfRiskCount('企业名称');
// 失信核查
return $qichacha->shiXinCheck('企业名称');
// 经营异常核查
return $qichacha->exceptionCheck('企业名称');
// 税收违法核查
return $qichacha->taxIllegalCheck('企业名称');
// 行政处罚核查
return $qichacha->adminPenaltyCheck('企业名称');
```

## 陆续更新中……
