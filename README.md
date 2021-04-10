# 輸出入 (ゆしゅつにゅう)
## Yu Shutsu Nyuu

This tool has been made to build a mediawiki importation file in XML for Soma Bringer.

## Starting 🚀

With this tool you can use mediawiki importation in order to batch files into it.

### Prerequisites 📋

- [Composer](https://getcomposer.org/).
- PHP version 8.
- Bash, powershell or another kind of CLI.
- Wikitable-unicode folder with .txt extracted from SomaTrans.exe tool inside of `input` folder.

## Running 🛠️
In the root of project with CLI type `php yushutsunyuu` with from below arguments.

### Arguments ⚙️
Those are needed to an appropriate behaviour:

#### Required (Separately)
* Import XML generation: `-i`, `--import`.
* Import XML redirection with a cool name generation: `-r`, `--redirect`.
* Main page generation: `-m`. _(Can be used with the above)_

#### Optionals
* Output with a different name: `--output=filename`.

### PHP dependencies 📦
- Illuminate Filesystem [![Latest Stable Version](https://img.shields.io/badge/stable-v8.36.2-blue)](https://packagist.org/packages/illuminate/filesystem)
- Spatie Array To Xml [![Latest Stable Version](https://img.shields.io/badge/stable-2.16.0-blue)](https://packagist.org/packages/spatie/array-to-xml)

#### Develop dependencies 🔧
- Hermes Dependencies [![Latest Stable Version](https://img.shields.io/badge/stable-1.0.1-blue)](https://packagist.org/packages/hermes/dependencies)
- Symfony Var Dumper [![Latest Stable Version](https://img.shields.io/badge/stable-v5.2.6-blue)](https://packagist.org/packages/symfony/var-dumper)

## Wiki 📖
This project link to [wiki](https://somabringer.gboquizo.es/).

## Author ✒️

This tool has been realized with ❤ by [Germán Boquizo Sánchez](mailto:germanboquizosanchez@gmail.com)
