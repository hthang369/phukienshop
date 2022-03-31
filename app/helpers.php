<?php

if (!function_exists('format_currency')) {
    function format_currency($number, $currency = 'đ') {
        return number_format($number, 0, ',', '.').' '.$currency;
    }
}

if (!function_exists('vnn_data_get')) {
    function vnn_data_get($data, $key, $keyDefault) {
        $result = data_get($data, $key);

        return blank($result) ? data_get($data, $keyDefault) : $result;
    }
}
?>
