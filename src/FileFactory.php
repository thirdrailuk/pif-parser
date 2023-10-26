<?php

declare(strict_types=1);

namespace ThirdRailPackages\PifParser;

use SplFileObject;

class FileFactory
{
    public static function make(string $filename): \Generator
    {
        return Generator::yield(
            PifFileObject::fromSplFileObject(
                new SplFileObject($filename)
            )
        );
    }
}
