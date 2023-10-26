<?php

namespace ThirdRailPackages\PifParserTest;

use PHPUnit\Framework\TestCase;
use ThirdRailPackages\PifParser\FileFactory;

class FileFactoryTest extends TestCase
{
    /** @test */
    function it_can_generate_pif_results()
    {
        $result = FileFactory::make(__DIR__ . '/../fixtures/stub.pif');

        $this->assertInstanceOf(\Generator::class, $result);
        $this->assertIsIterable($result);

        $this->assertEquals(
            [
                [
                    'PIF',
                    '1',
                    'CENTRE',
                    'NR',
                    '10-12-2023 00:00:00',
                    '01-06-2024 23:59:59',
                    'I',
                    'D',
                    '01-06-2023 12:19:11',
                ],
                [
                    'REF',
                    'A',
                    'ACT',
                    'R',
                    "Stops when required (shows 'x' in GBTT)             R R R x x x",
                ],
                [
                    'REF',
                    'A',
                    'ACT',
                    'RM',
                    'Stops for reversing move or driver changes ends     RMRMRM',
                ],
                [
                    'REF',
                    'A',
                    'ACT',
                    'RR',
                    'Stops for locomotive to run round train             RRRRRR',
                ],
                [
                    'REF',
                    'A',
                    'ACT',
                    'S',
                    'Stops for Railway Personnel Only                    S S S',
                ],
                [
                    'REF',
                    'A',
                    'ACT',
                    'T',
                    'Stops to Take Up and Set Down passengers'
                ],
                [
                    'REF',
                    'A',
                    'ACT',
                    'TB',
                    'Train Begins (Origin)'
                ],
                [
                    'REF',
                    'A',
                    'ACT',
                    'TF',
                    'Train Finishes (Destination)'
                ],
                [
                    'PIT',
                    'REF',
                    '1486',
                    '0',
                    '0',
                    'TLD',
                    '653',
                    '0',
                    '0',
                    'LOC',
                    '11821',
                    '0',
                    '0',
                    'PLT4544',
                    '0',
                    '0',
                    'NWK',
                    '41815',
                    '0',
                    '0',
                    'TLK',
                    '1154873',
                    '0',
                    '0',
                ]
            ],
            iterator_to_array($result)
        );
    }
}
