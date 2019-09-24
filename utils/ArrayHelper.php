<?php

/**
 * Array helpers
 * 
 */
class ArrayHelper
{
    public static function isAssoc($array)
    {
        if (!is_array($array) || $array === []) {
            return false;
        }
        return array_keys($array) !== range(0, count($array) - 1);
    }

    public static function toObject($array)
    {
        $result = json_decode(json_encode($array), false);
        return is_object($result) ? $result : null;
    }

    public static function dump($var)
    {
        if (is_string($var)) {
            return str_split($var);
        }
        if (is_object($var)) {
            return json_decode(json_encode($var), true);
        }
        return null;
    }

    public static function first($array)
    {
        return $array[array_keys($array)[0]];
    }

    public static function last($array)
    {
        return $array[array_keys($array)[sizeof($array) - 1]];
    }

    public static function get($key, $array)
    {
        if (is_string($key) && is_array($array)) {
            $keys = explode('.', $key);
            while (sizeof($keys) >= 1) {
                $k = array_shift($keys);
                if (!isset($array[$k])) {
                    return null;
                }
                if (sizeof($keys) === 0) {
                    return $array[$k];
                }
                $array = &$array[$k];
            }
        }
        return null;
    }

}