<?php

class Str
{
    /**
     * Inserts one or more strings into another string on a defined position.
     *
    */
    public static function insert($keyValue, $string)
    {
        if (is_assoc($keyValue)) {
            foreach ($keyValue as $search => $replace) {
                $string = str_replace($search, $replace, $string);
            }
        }
        return $string;
    }
    /**
     * Return the content in a string between a left and right element.
     */
    public static function between($left, $right, $string)
    {
        preg_match_all('/' . preg_quote($left, '/') . '(.*?)' . preg_quote($right, '/') . '/s', $string, $matches);
        return array_map('trim', $matches[1]);
    }
    /**
     * Return the part of a string after a given value.
     */
    public static function after($search, $string)
    {
        return $search === '' ? $string : ltrim(array_reverse(explode($search, $string, 2))[0]);
    }
    /**
     * Get the part of a string before a given value.
     */
    public static function before($search, $string)
    {
        return $search === '' ? $string : rtrim(explode($search, $string)[0]);
    }
    /**
     * Limit the number of words in a string. Put value of $end to the string end.
     */
    public static function limitWords($string, $limit = 10, $end = '...')
    {
        $arrayWords = explode(' ', $string);
        if (sizeof($arrayWords) <= $limit) {
            return $string;
        }
        return implode(' ', array_slice($arrayWords, 0, $limit)) . $end;
    }
    /**
     * Limit the number of characters in a string. Put value of $end to the string end.
     */
    public static function limit($string, $limit = 100, $end = '...')
    {
        if (mb_strwidth($string, 'UTF-8') <= $limit) {
            return $string;
        }
        return rtrim(mb_strimwidth($string, 0, $limit, '', 'UTF-8')) . $end;
    }
    /**
     * Tests if a string contains a given element
     */
    public static function contains($needle, $haystack)
    {
        foreach ((array)$needle as $ndl) {
            if (strpos($haystack, $ndl) !== false) {
                return true;
            }
        }
        return false;
    }
    /**
     * Tests if a string contains a given element. Ignore case sensitivity.
     */
    public static function containsIgnoreCase($needle, $haystack)
    {
        foreach ((array)$needle as $ndl) {
            if (stripos($haystack, $ndl) !== false) {
                return true;
            }
        }
        return false;
    }
    /**
     * Determine if a given string starts with a given substring.
     */
    public static function startsWith($needle, $haystack)
    {
        foreach ((array)$needle as $ndl) {
            if ($ndl !== '' && substr($haystack, 0, strlen($ndl)) === (string)$ndl) {
                return true;
            }
        }
        return false;
    }
    /**
     * Determine if a given string starts with a given substring. Ignore case sensitivity.
     */
    public static function startsWithIgnoreCase($needle, $haystack)
    {
        $hs = strtolower($haystack);
        foreach ((array)$needle as $ndl) {
            $n = strtolower($ndl);
            if ($n !== '' && substr($hs, 0, strlen($n)) === (string)$n) {
                return true;
            }
        }
        return false;
    }

    /**
     * Return the part of a string after the last occurrence of a given search value.
     */
    public static function afterLast($search, $string)
    {
        return $search === '' ? $string : ltrim(array_reverse(explode($search, $string))[0]);
    }
}