<?php

declare(strict_types=1);

namespace YuShutsuNyuu\XMLElements;

use JetBrains\PhpStorm\ArrayShape;

class Tag
{
    #[ArrayShape(['rootElementName' => 'string', '_attributes' => 'string[]'])]
    public function rootElement(): array
    {
        return [
            'rootElementName' => 'mediawiki',
            '_attributes' => [
                'xmlns' => 'https://www.mediawiki.org/xml/export-0.11/',
                'xmlns:xsi' => 'https://www.w3.org/2001/XMLSchema-instance',
                'xsi:schemaLocation' => 'https://www.mediawiki.org/xml/export-0.11/ https://www.mediawiki.org/xml/export-0.11.xsd',
                'version' => '0.11',
                'xml:lang' => 'es',
            ],
        ];
    }

    #[ArrayShape([
        'sitename' => 'string',
        'dbname' => 'string',
        'base' => 'string',
        'generator' => 'string',
        'case' => 'string',
        'namespaces' => 'array[]',
    ])]
    public function siteInfo(): array
    {
        return [
            'sitename' => 'Soma Bringer',
            'dbname' => 'gboquisgerman',
            'base' => 'https://somabringer.gboquizo.es/index.php?title=P%C3%A1gina_principal',
            'generator' => 'MediaWiki 1.35.1',
            'case' => 'first-letter',
            'namespaces' => [
                'namespace' => [
                    ['_attributes' => ['key' => '-2', 'case' => 'first-letter'], '_value' => 'Medio'],
                    ['_attributes' => ['key' => '-1', 'case' => 'first-letter'], '_value' => 'Especial'],
                    ['_attributes' => ['key' => '0', 'case' => 'first-letter']],
                    ['_attributes' => ['key' => '1', 'case' => 'first-letter'], '_value' => 'Discusión'],
                    ['_attributes' => ['key' => '2', 'case' => 'first-letter'], '_value' => 'Usuario'],
                    ['_attributes' => ['key' => '3', 'case' => 'first-letter'], '_value' => 'Usuario discusión'],
                    ['_attributes' => ['key' => '4', 'case' => 'first-letter'], '_value' => 'Soma Bringer'],
                    ['_attributes' => ['key' => '5', 'case' => 'first-letter'], '_value' => 'Soma Bringer discusión'],
                    ['_attributes' => ['key' => '6', 'case' => 'first-letter'], '_value' => 'Archivo'],
                    ['_attributes' => ['key' => '7', 'case' => 'first-letter'], '_value' => 'Archivo discusión'],
                    ['_attributes' => ['key' => '8', 'case' => 'first-letter'], '_value' => 'MediaWiki'],
                    ['_attributes' => ['key' => '9', 'case' => 'first-letter'], '_value' => 'MediaWiki discusión'],
                    ['_attributes' => ['key' => '10', 'case' => 'first-letter'], '_value' => 'Plantilla'],
                    ['_attributes' => ['key' => '11', 'case' => 'first-letter'], '_value' => 'Plantilla discusión'],
                    ['_attributes' => ['key' => '12', 'case' => 'first-letter'], '_value' => 'Ayuda'],
                    ['_attributes' => ['key' => '13', 'case' => 'first-letter'], '_value' => 'Ayuda discusión'],
                    ['_attributes' => ['key' => '14', 'case' => 'first-letter'], '_value' => 'Categoría'],
                    ['_attributes' => ['key' => '15', 'case' => 'first-letter'], '_value' => 'Categoría discusión'],
                ],
            ],
        ];
    }

    #[ArrayShape([
        '_attributes' => 'string[]',
        'title' => 'string',
        'ns' => 'string',
        'id' => 'int',
        'revision' => 'array',
    ])]
    public function page(): array
    {
        return [
            '_attributes' => ['xmlns' => 'https://www.mediawiki.org/xml/export-0.11/'],
            'title' => 'First try',
            'ns' => '0',
            'id' => random_int(0, 100),
            'revision' => [
                'id' => random_int(0, 100),
                'parentid' => random_int(1000, 20000),
                'timestamp' => gmdate('Y-m-d\Th:i:s\Z', time()),
                'contributor' => [
                    'username' => 'Cheke',
                    'id' => 1,
                ],
                'minor' => '',
                'comment' => 'Automatic upload - formatting',
                'origin' => random_int(1000, 20000),
                'model' => 'wikitext',
                'format' => 'text/x-wiki',
                'text' => [
                    '_attributes' => [
                        'bytes' => random_int(1000, 8000),
                        'sha1' => sha1('First try'),
                        'xml:space' => 'preserve',
                    ],
                    '_value' => 'This is a test page.',
                ],
                'sha1' => sha1('First try'),
            ],
        ];
    }
}
