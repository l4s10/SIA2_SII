<?php

namespace App\Utils;

class RutUtils
{
    public static function formatRut($rut)
    {
        $rut = preg_replace('/[^0-9kK]/', '', $rut);
        $dv = substr($rut, -1);
        $rut = substr($rut, 0, -1);
        $rut_array = str_split(strrev($rut), 3);
        $rut = implode('.', $rut_array);
        return strrev($rut) . '-' . strtoupper($dv);
    }
}
