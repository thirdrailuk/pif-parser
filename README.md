# The Third Rail - PIF Parser

![CI](https://github.com/third-rail-packages/pif-parser/workflows/CI/badge.svg)

The UK rail industry uses a system called BPLAN (a successor to a system called APLAN) to manage a master set of geography data used when planning trains. Network Rail create extracts of this geographical data as a PIF. This package helps parse the file in a memory efficient manner.

## Installation

### via Composer

Install [Composer](https://getcomposer.org/doc/00-intro.md)  and require the package with the below command.

```bash
composer.phar require third-rail-packages/pif-parser
```

## Getting Started

PIF Records can be converted to primitive array structures by using the `ThirdRailPackages\PifParser\StringFactory` or `ThirdRailPackages\PifParser\FileFactory` classes respectively.

```php
<?php
// pif-parser.php

include __DIR__ . '/vendor/autoload.php';

$pif = <<<PIF
REF	A	ACT	*	Supression of traffic stop indicator
REF	A	ACT	-D	Stops to detach vehicles                            D D D
REF	A	ACT	-T	Stops to attach and detach vehicles                 DUDUDU
PIF;

foreach (ThirdRailPackages\PifParser\StringFactory::make($pif) as $row) {
    var_dump($row);
}

foreach (ThirdRailPackages\PifParser\FileFactory::make(__DIR__ . '/tests/fixtures/stub.pif') as $row) {
    var_dump($row);
}
```

Example scripts can be found in the `./scripts` directory

See [Open Rail Data Wiki](https://wiki.openraildata.com/index.php?title=BPLAN_Geography) for available Record Types to parse.

## Development

Install the [Composer](https://getcomposer.org/) dependencies and execute the test suite.
```
composer.phar install --dev
composer.phar test
```

## Authors

- **Ben McArrowsmith** - [bennoislost](https://github.com/bennoislost)

See also the list of [contributors](https://github.com/third-rail-packages/data-feeds-queue-subscriber/contributors) who participated in this project


## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

- [https://groups.google.com/forum/#!forum/openraildata-talk](https://groups.google.com/forum/#!forum/openraildata-talk)
- [https://wiki.openraildata.com/](https://wiki.openraildata.com/)
