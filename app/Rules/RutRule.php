<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RutRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //?? valida que el rut sea valido
        $rut = preg_replace('/[^k0-9]/i', '', $value);
        $dv  = substr($rut, -1);
        $numero = substr($rut, 0, strlen($rut)-1);
        $i = 2;
        $suma = 0;
        foreach(array_reverse(str_split($numero)) as $v)
        {
            if($i==8)
                $i = 2;

            $suma += $v * $i;
            ++$i;
        }

        $dvr = 11 - ($suma % 11);

        if($dvr == 11)
            $dvr = 0;
        if($dvr == 10)
            $dvr = 'K';

        if($dvr != strtoupper($dv)) {
            $fail('El campo :attribute no es un RUT chileno válido.');
        }
    }
}
