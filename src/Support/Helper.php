<?php

namespace MrwangTc\QichachaApi\Support;

class Helper
{

    /**
     * Notes   : 字符串转大写
     * @Date   : 2021/6/28 15:46
     * @Author : Mr.wang
     * @param $string
     * @return string
     */
    public static function stringUpper($string): string
    {
        return mb_strtoupper($string, 'UTF-8');
    }

    /**
     * Notes   : 数组追加函数
     * @Date   : 2021/6/28 15:53
     * @Author : Mr.wang
     * @param        $array
     * @param        $value
     * @param  null  $key
     * @return array
     */
    public static function arrPrepend($array, $value, $key = null): array
    {
        if (func_num_args() == 2) {
            array_unshift($array, $value);
        } else {
            $array = [$key => $value] + $array;
        }

        return $array;
    }

}