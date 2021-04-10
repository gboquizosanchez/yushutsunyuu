<?php

declare(strict_types=1);

namespace YuShutsuNyuu\Transformers;

class TitleTransformer
{
    public static function equivalence(?string $string)
    {
        $array = require base_url('tables/equivalences.php');

        $flipped = array_flip($array);

        if (array_key_exists($string, $flipped)) {
            return $flipped[$string];
        }

        return $string;
    }
}
