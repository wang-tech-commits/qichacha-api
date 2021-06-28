<?php

namespace MrwangTc\QichachaApi;

use MrwangTc\QichachaApi\Support\Config;

class BaseApi
{
    protected $config;

    public function __construct(array $config)
    {
        $this->config = new Config($config);
    }
}