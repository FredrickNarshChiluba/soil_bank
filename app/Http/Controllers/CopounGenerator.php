<?php
namespace App\Http\Controllers;

class CopounGenerator{

    public static function getOneYearLicense()
    {
        $tokens = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $segment_chars = 5;
        $num_segments = 5;
        $key_string = '';

        for ($i = 0; $i < $num_segments; $i++) {

            $segment = '';

            for ($j = 0; $j < $segment_chars; $j++) {
                $segment .= $tokens[rand(0, 35)];
            }

            $key_string .= $segment;

            if ($i < ($num_segments - 1)) {
                $key_string .= '-';
            }

        }
        $key_period = substr($key_string, 2, 27);
        $oneYear    = '11';
        $oneYearLicense = $oneYear.$key_period;

        return $oneYearLicense;
    }

    public static function getTwoYearLicense()
    {
        $tokens = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $segment_chars = 5;
        $num_segments = 5;
        $key_string = '';

        for ($i = 0; $i < $num_segments; $i++) {

            $segment = '';

            for ($j = 0; $j < $segment_chars; $j++) {
                $segment .= $tokens[rand(0, 35)];
            }

            $key_string .= $segment;

            if ($i < ($num_segments - 1)) {
                $key_string .= '-';
            }

        }
        $key_period = substr($key_string, 2, 27);
        $twoYear    = '22';
        $twoYearLicense = $twoYear.$key_period;

        return $twoYearLicense;
    }

    public static function getThreeYearLicense()
    {
        $tokens = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $segment_chars = 5;
        $num_segments = 5;
        $key_string = '';

        for ($i = 0; $i < $num_segments; $i++) {

            $segment = '';

            for ($j = 0; $j < $segment_chars; $j++) {
                $segment .= $tokens[rand(0, 35)];
            }

            $key_string .= $segment;

            if ($i < ($num_segments - 1)) {
                $key_string .= '-';
            }

        }
        $key_period = substr($key_string, 2, 27);
        $threeYear    = '33';
        $threeYearLicense = $threeYear.$key_period;

        return $threeYearLicense;
    }

}