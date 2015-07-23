<?php

namespace backend\components;

/**
* 
*/
class ArrayHelper
{
    
    /**
     * @return string
     */
    public static function printArrayAsTree(array $arr, $level = 0)
    {
        $res = '<ul>';
        if (is_array($arr)){
            foreach ($arr as $k => $value) {
                if (is_array($value)) {
                    $res .= '<li>' . $k . '</li>';
                    $res .= self::printArrayAsTree($value, $level + 1);
                } elseif (is_string($value)) {
                    $res .= '<li>' . $value . '</li>';
                }
            }
        }
        $res .= '</ul>';
        return $res;
    }
}