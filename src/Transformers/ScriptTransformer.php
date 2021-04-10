<?php

declare(strict_types=1);

namespace YuShutsuNyuu\Transformers;

use Symfony\Component\Finder\SplFileInfo;

class ScriptTransformer
{
    private SplFileInfo $file;

    public function __construct(private array $page) {}

    public function transform(SplFileInfo $file, string $option): array
    {
        $this->file = $file;

        $options = ['importation' => 'normal', 'redirection' => 'redirect'];

        if (in_array($option, array_keys($options), true)) {
            $this->{$options[$option]}();
        }

        return $this->page;
    }

    private function redirect(): void
    {
        $filename = $this->file->getFilename();

        $this->addTitle(TitleTransformer::equivalence($filename));

        $this->addText("#REDIRECCIÓN: [[{$filename}]]\n[[Categoría:Script]]");
    }

    private function addTitle(?string $string): void
    {
        $this->page['title'] = $string;
    }

    private function addText(?string $string): void
    {
        $this->page['revision']['text']['_value'] = $string;
    }

    private function normal(): void
    {
        $this->addTitle($this->file->getFilename());

        $this->addText($this->modifyText($this->file->getContents()));
    }

    private function modifyText(?string $content): string
    {
        $decodedText = $this->decodeText($content);

        return <<<EOT
            {{IntraducibleS}}
            <div style="height:500px;font-size:100%;overflow:auto;>
            {|
            {$decodedText}
            [[Categoría:Japonés]]
            EOT;
    }

    private function decodeText(?string $string): string
    {
        return utf16_decode($string);
    }
}
