<?php

declare(strict_types=1);

namespace YuShutsuNyuu\Generators;

class MainPageGenerator
{
    public function generate(): void
    {
        $array = require base_url('tables/equivalences.php');

        $flipped = array_flip($array);

        $content = '';
        $number = 1;

        foreach ($flipped as $value) {
            $content .= <<<EOL
                |{$number} - [[{$value}]]
                |{{Sin empezar}}
                
                EOL;

            if ($number % 2 === 0) {
                $content .= '|-'.PHP_EOL;
            }
            $number++;
        }

        file_put_contents('output/main_page.txt', $content);
    }
}
