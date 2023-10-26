<?php

declare(strict_types=1);

namespace ThirdRailPackages\PifParser;

use SplTempFileObject;

class StringFactory
{
    public static function make(string $pif, int $maxMemory = 2097152): \Generator
    {
        $file = new SplTempFileObject($maxMemory);
        $file->fwrite($pif);

        return Generator::yield(
            PifFileObject::fromSplFileObject($file)
        );
    }
}
