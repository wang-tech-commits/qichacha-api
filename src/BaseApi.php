<?php

namespace MrwangTc\QichachaApi;

use GuzzleHttp\Client;
use MrwangTc\QichachaApi\Exceptions\HttpException;
use MrwangTc\QichachaApi\Exceptions\InvalidArgumentException;
use MrwangTc\QichachaApi\Support\Config;
use MrwangTc\QichachaApi\Support\Helper;

class BaseApi
{

    protected $config;

    protected $headers  = [];

    protected $baseData = '';

    protected $token    = '';

    protected $params   = [];

    public function __construct(array $config)
    {
        if (empty($config['key'])) {
            throw new InvalidArgumentException('应用APPKEY不能为空');
        }
        if (empty($config['SecretKey'])) {
            throw new InvalidArgumentException('应用SecretKey不能为空');
        }
        if (empty($config['domain'])) {
            throw new InvalidArgumentException('接口地址没配置');
        }
        $this->config = new Config($config);
    }

    public function getHeader()
    {
        $this->getToken();

        $this->headers = [
            'Token'    => $this->token,
            'Timespan' => time(),
        ];
    }

    protected function getToken()
    {
        $key         = $this->config['key'];
        $SecretKey   = $this->config['SecretKey'];
        $token       = Helper::stringUpper(md5($key . time() . $SecretKey));
        $this->token = $token;
    }

    public function getParams($params)
    {
        $key = $this->config['key'];

        $array = Helper::arrPrepend($params, $key, 'key');

        $this->params = $array;
    }

    protected function methodGetDopost($url)
    {
        try {
            $Client   = new Client();
            $response = $Client->get($url, ['query' => $this->params, 'headers' => $this->headers]);
            $result   = $response->getBody()->getContents();

            return $result;
        } catch (\Exception $e) {
            $check = preg_match_all('/[\x{4e00}-\x{9fff}]+/u', $e->getmessage(), $cn_name);
            throw new HttpException($cn_name, $e->getCode(), $e);
        }
    }

}