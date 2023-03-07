<?php

if (!function_exists('ifw_var_to_array')) {
    /**
     * @param $var
     * @return array
     */
    function ifw_var_to_array($var) {
        if (!is_array($var)) {
            if (empty($var)) {
                $var = array();
            } else {
                $var = array($var);
            }
        }
        return $var;
    }
}

if (!function_exists('ifw_filter_scalar')) {
    /**
     * @param $scalar
     * @param array $valid
     * @param null $default
     * @param bool $strict
     * @return mixed|null
     */
    function ifw_filter_scalar($scalar, array $valid, $default = null, $strict = true) {
        $result = $default;
        if (in_array($scalar, $valid, $strict)) {
            $result = $scalar;
        }
        return $result;
    }
}