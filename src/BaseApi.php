<?php

namespace MrwangTc\QichachaApi;

use GuzzleHttp\Client;
use MrwangTc\QichachaApi\Exceptions\HttpException;
use MrwangTc\QichachaApi\Exceptions\InvalidArgumentException;
use MrwangTc\QichachaApi\Support\Config;
use MrwangTc\QichachaApi\Support\Helper;

/**
 * Notes    : 接口基础
 * @Date    : 2021/6/29 11:21
 * @Author  : Mr.wang
 * Class BaseApi
 * @package MrwangTc\QichachaApi
 */
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
            throw new InvalidArgumentException('应用APPKEY不能为空', 104);
        }
        if (empty($config['SecretKey'])) {
            throw new InvalidArgumentException('应用SecretKey不能为空', 104);
        }
        if (empty($config['domain'])) {
            throw new InvalidArgumentException('接口地址没配置', 104);
        }
        $this->config = new Config($config);
    }

    protected function methodGetDopost($url, $params)
    {
        try {
            $this->getHeader();
            $this->getParams($params);
            $Client   = new Client();
            $response = $Client->get($url, ['query' => $this->params, 'headers' => $this->headers]);
            $result   = $response->getBody()->getContents();

            return $result;
        } catch (\Exception $e) {
            $check = preg_match_all('/[\x{4e00}-\x{9fff}]+/u', $e->getmessage(), $cn_name);
            throw new HttpException($cn_name, $e->getCode(), $e);
        }
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

    /**
     * Notes   : 整合各种不同的数据
     * @Date   : 2021/6/29 11:34
     * @Author : Mr.wang
     * @return mixed
     * @throws \MrwangTc\QichachaApi\Exceptions\InvalidArgumentException
     */
    protected function getData()
    {
        if (is_array($this->baseData)) {
            #todo 未知问题
        } else {
            $array = json_decode($this->baseData);
            if ($array->Status != 200) {
                throw new InvalidArgumentException($array->Message, $array->Status);
            } else {
                return $array->Result;
            }
        }
    }

}