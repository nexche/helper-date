<?php

namespace Nexche\Helper;

class Date {

    public static function now() {
        return Date('Y-m-d H:i:s') ;
    }
    public static function clientDate($dt = null, $format = 'm/d/Y') {
        return self::clientDateTime($dt, $format);
    }

    public static function clientTime($dt = null, $format = 'h:i a') {
        return self::clientDateTime($dt, $format);
    }

    public static function clientDateTime($dt = null, $format = 'm/d/Y h:i a') {
        if ($dt === null) {
            return '';
        }
        if ($dt) {
            $t = strtotime($dt);

            if ($t && $t != -19800 && $dt != '0000-00-00' && $dt != '0000-00-00 00:00:00') {
                return Date($format, $t);
            }
        }
        return '';
    }

    public static function mysqlDate($dt) {
        return self::mysqlDateTime($dt, 'Y-m-d');
    }
    public static function mysqlTime($dt = null) {
        return self::mysqlDateTime($dt, 'H:i:s');
    }

    public static function mysqlDateTime($dt = null, $format = 'Y-m-d H:i:s') {
        if ($dt === null) {
            return '';
        }

        if ($dt) {
            return Date($format, strtotime($dt));
        }
        return '';
    }
    public static function mysqlNow() {
        return Date('Y-m-d H:i:s', time());
    }
}
