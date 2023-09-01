<?php

namespace App\Utils;

class RutUtils
{
    public static function formatRut($rut)
    {
        $rut = preg_replace('/[^0-9kK]/', '', $rut); // Eliminar todos los caracteres no válidos
        $dv = substr($rut, -1);  // Sacar el dígito verificador
        $rut = substr($rut, 0, -1);  // Sacar el RUT sin el dígito verificador

        // Ya no necesitamos separar y agregar puntos, entonces eliminamos esas líneas

        return $rut . '-' . strtoupper($dv); // Retornar el RUT sin puntos pero con guión
    }
}
