<?php

declare(strict_types=1);

namespace YuShutsuNyuu\Generators;

use Exception;
use Illuminate\Filesystem\Filesystem;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;
use RuntimeException;
use SimpleXMLElement;
use Spatie\ArrayToXml\ArrayToXml;
use YuShutsuNyuu\Transformers\ScriptTransformer;
use YuShutsuNyuu\XMLElements\Tag;

class XMLGenerator
{
    private Tag $tag;
    private Filesystem $fileHandler;
    private string $option;
    private string $output;

    #[Pure]
    public function __construct()
    {
        $this->tag = new Tag();
        $this->fileHandler = new Filesystem();
    }

    public function import(?string $option, ?string $output): void
    {
        try {
            $this->option = $option;
            $this->output = $output ?? 'importation_file';

            $xml = $this->establishXML();

            $this->saveXml($xml);
        } catch (Exception $exception) {
            print_r($exception->getMessage());
        }
    }

    private function establishXML(): string
    {
        $convert = ArrayToXml::convert(
            $this->elements(),
            rootElement: $this->tag->rootElement(),
            xmlEncoding: 'UTF-8',
            xmlStandalone: true
        );

        return str_replace(search: '&#13;', replace: '', subject: $convert);
    }

    #[ArrayShape(['siteInfo' => 'array', 'page' => 'array'])]
    private function elements(): array
    {
        $elements = ['siteInfo' => $this->tag->siteInfo()];

        foreach ($this->extractFiles() as $file) {
            $elements['page'][] = (new ScriptTransformer($this->tag->page()))->transform($file, $this->option);
        }

        return $elements;
    }

    private function extractFiles(): array
    {
        $somaPath = base_url('../input/wikitable-unicode');

        if (! $this->fileHandler->exists($somaPath)) {
            throw new RuntimeException('The wikitable-unicode folder is needed in input folder');
        }

        return $this->fileHandler->allFiles($somaPath);
    }

    private function saveXml(string $result): void
    {
        $xml = new SimpleXMLElement($result, 0, false);

        $xml->saveXML("output/{$this->output}.xml");
    }
}
