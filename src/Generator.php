<?php

declare(strict_types=1);

namespace ThirdRailPackages\PifParser;

class Generator
{
    public static function yield(PifFileObject $file): \Generator
    {
        /**
         * @var array<int, ?string> $row
         */
        foreach ($file->file() as $row) {
            if (self::test($row)) {
                yield self::sanitize($row);
            }
        }
    }

    /**
     * @param array<int, ?string> $row
     *
     * @return array<int, ?string>
     */
    private static function sanitize(array $row): array
    {
        return array_map(function (?string $item) {
            $item = trim((string) $item);

            return ($item == '') ? null : $item;
        }, $row);
    }

    /**
     * @param array<int, ?string> $row
     */
    private static function test(array $row): bool
    {
        if (count($row) === 0) {
            return false;
        }

        if ($row[0] === '' || $row[0] === null) {
            return false;
        }

        return true;
    }
}
