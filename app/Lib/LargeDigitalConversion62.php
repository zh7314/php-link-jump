<?php

namespace app\Lib;


class LargeDigitalConversion62
{
    /*
     * 超大10进制数字转换成62进制
     * 为什么只支持62进制，主要原因就是url协议支持的字符是有限的
     * 大小写字母+数字，几个特殊字符比如"$-_.+!*'(),"
     * 方便互联网使用，如果你需要支持128进制，256进制，可以根据下列方法扩展
     */


    protected static $dict = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    protected static $codeLength = 62;

    public static function from10To62($num)
    {
        $to = self::$codeLength;
        $dict = self::$dict;
        $ret = '';
        do {
            $ret = $dict[bcmod($num, $to)] . $ret;
            $num = bcdiv($num, $to);
        } while ($num > 0);
        return $ret;
    }

    public static function from62To10($num)
    {
        $from = self::$codeLength;
        $num = strval($num);
        $dict = self::$dict;
        $len = strlen($num);
        $dec = 0;
        for ($i = 0; $i < $len; $i++) {
            $pos = strpos($dict, $num[$i]);
            $dec = bcadd(bcmul(bcpow($from, $len - $i - 1), $pos), $dec);
        }
        return $dec;
    }
}