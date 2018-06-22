<?php

/**
 * Created by PhpStorm.
 * User: zhaopengju
 * Date: 2018/6/19
 * Time: 下午4:55
 */

namespace vietnam\idcard;

class IdCardUtil
{
    // 根据身份证号获取归属地
    public static function getIdAttribution($cardid)
    {
        $conf = require_once 'attributions.php';
        // 判断身份证号的长度
        $len = strlen($cardid);
        if ($len == 9) {
            $key = substr($cardid, 0, 2);
            $value = $conf[1][$key];
            if (!$value) {
                $key = substr($cardid, 0, 3);
                $value = $conf[1][$key];
            }
            return $value;
        } else {
            $key = substr($cardid, 0, 3);
            $value = $conf[2][$key];
            return $value;
        }
    }
}