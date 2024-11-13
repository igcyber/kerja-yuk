<?php

namespace Framework;

class Validation {
    
    /**
     * Validate String
     * @param string $value
     * @param int $min
     * @param int $max
     * 
     * @return boolean
     */
    public static function string($value, $min = 1, $max = INF)
    {
        if(is_string($value)){
            $value = trim($value);
            $length = strlen($value);

            return $length >= $min && $length <= $max;
        }

        return false;
    }

    /**
     * Validate Email Address
     * @param string $value
     * 
     * @return string 
     */
    public static function email($value)
    {
        $value = trim($value);

        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }


    /**
     * Check Match Values
     * @param mixed $value1
     * @param mixed $value2
     * 
     * @return boolean
     */
    public static function match($value1, $value2)
    {
        $value1 = trim($value1);
        $value2 = trim($value2);

        return $value1 === $value2;
    }
}