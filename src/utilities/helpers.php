<?php

if (! function_exists('base_url')) {
    function base_url(?string $path): string
    {
        return sprintf("%s/{$path}", dirname(__DIR__));
    }
}

if (! function_exists('utf16_decode')) {
    function utf16_decode(?string $string): string
    {
        return mb_convert_encoding(str_to_hex($string), 'UTF-8', 'UTF-16LE');
    }
}

if (! function_exists('utf16_encode')) {
    function utf16_encode(?string $string): string
    {
        return mb_convert_encoding(str_to_hex($string), 'UTF-16LE', 'UTF-8');
    }
}

if (! function_exists('str_to_hex')) {
    function str_to_hex(?string $string): string
    {
        $unpacked = unpack('H*', $string);

        $hex = remove_bom(array_shift($unpacked));

        $transformed = hex2bin($hex);

        if (is_bool($transformed)) {
            throw new RuntimeException('A problem occurred on hexadecimal conversion.');
        }

        return $transformed;
    }
}

if (! function_exists('remove_bom')) {
    function remove_bom(?string $string): string
    {
        return str_replace('fffe', '', $string);
    }
}

