<?php

declare(strict_types=1);

namespace ThirdRailPackages\PifParser;

use SplFileObject;

class PifFileObject
{
    private SplFileObject $file;

    public static function fromSplFileObject(SplFileObject $file): self
    {
        return new self($file);
    }

    private function __construct(SplFileObject $file)
    {
        $file->setCsvControl("\t");
        $file->setFlags(SplFileObject::READ_CSV);

        $this->file = $file;
    }

    public function file(): SplFileObject
    {
        return $this->file;
    }
}
