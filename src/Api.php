<?php

namespace MrwangTc\QichachaApi;

use GuzzleHttp\Client;
use MrwangTc\QichachaApi\Exceptions\{HttpException, InvalidArgumentException};
use MrwangTc\QichachaApi\Factory\{Domain, Params};
use MrwangTc\QichachaApi\Support\{Config, Helper};

/**
 * Notes    : 接口基础
 * @Date    : 2021/6/29 11:21
 * @Author  : Mr.wang
 * Class BaseApi
 * @package MrwangTc\QichachaApi
 */
class Api
{

    protected $config;

    protected $headers  = [];

    protected $baseData = '';

    protected $token    = '';

    protected $params   = [];

    protected $domain   = 'http://api.qichacha.com/';

    public function __construct(array $config)
    {
        if (empty($config['key'])) {
            throw new InvalidArgumentException('应用APPKEY不能为空', 104);
        }
        if (empty($config['SecretKey'])) {
            throw new InvalidArgumentException('应用SecretKey不能为空', 104);
        }
        $config['domain'] = $this->domain;
        $this->config     = new Config($config);
    }

    public function __call($name, $arguments)
    {
        $url            = Domain::domainMethod($name);
        $params         = Params::paramsMethod($name, $arguments);
        $this->baseData = $this->methodGetHttp($url, $params);

        try {
            return $this->getData();
        } catch (InvalidArgumentException $e) {
            throw new InvalidArgumentException('数据错误');
        }
    }

    protected function methodGetHttp($url, $params)
    {
        try {
            $this->getHeader();
            $this->getParams($params);
            $Client   = new Client();
            $response = $Client->get($this->config['domain'] . $url,
                ['query' => $this->params, 'headers' => $this->headers]);

            return $response->getBody()->getContents();
        } catch (\Exception $e) {
            preg_match_all('/[\x{4e00}-\x{9fff}]+/u', $e->getmessage(), $cn_name);
            throw new HttpException($cn_name, $e->getCode(), $e);
        }
    }

    protected function getHeader()
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
        $secretKey   = $this->config['SecretKey'];
        $this->token = Helper::stringUpper(md5($key . time() . $secretKey));
    }

    protected function getParams(array $params)
    {
        $key = $this->config['key'];

        $this->params = Helper::arrPrepend($params, $key, 'key');
    }

    /**
     * Notes   : 整合各种不同的数据
     * @Date   : 2021/6/30 10:46
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

    /**
     * Notes   : 营业执照识别
     * @Date   : 2021/7/22 14:06
     * @Author : Mr.wang
     * @param $imageUrl
     * @return mixed
     * @throws \MrwangTc\QichachaApi\Exceptions\HttpException
     * @throws \MrwangTc\QichachaApi\Exceptions\InvalidArgumentException
     */
    public function imageRecognitionCompare($imageUrl)
    {
        $url            = 'ImageRecognitionCompare/GetInfo';
        $params         = ['imageUrl' => $imageUrl];
        $this->baseData = $this->methodPostHttp($url, $params);

        try {
            return $this->getData();
        } catch (InvalidArgumentException $e) {
            throw new InvalidArgumentException('数据错误');
        }
    }

    protected function methodPostHttp($url, $params)
    {
        try {
            $this->getHeader();
            $this->getParams($params);
            $Client   = new Client();
            $response = $Client->post($this->config['domain'] . $url,
                ['query' => $this->params, 'headers' => $this->headers]);

            return $response->getBody()->getContents();
        } catch (\Exception $e) {
            preg_match_all('/[\x{4e00}-\x{9fff}]+/u', $e->getmessage(), $cn_name);
            throw new HttpException($cn_name, $e->getCode(), $e);
        }
    }

}