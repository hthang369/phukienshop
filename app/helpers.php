<?php

if (!function_exists('format_currency')) {
    function format_currency($number, $currency = 'đ') {
        return number_format($number, 0, ',', '.').' '.$currency;
    }
}
?>
