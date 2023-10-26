<?php

namespace ThirdRailPackages\PifParserTest;

use PHPUnit\Framework\TestCase;
use ThirdRailPackages\PifParser\Generator;
use ThirdRailPackages\PifParser\PifFileObject;
use ThirdRailPackages\PifParser\StringFactory;

class GeneratorTest extends TestCase
{
    /** @test */
    function it_can_yeild_non_empty_rows()
    {
        $pif = <<<'PIF'

        REF	A	ACT	R	Stops when required (shows 'x' in GBTT)             R R R x x x
        REF	A	ACT	RM	Stops for reversing move or driver changes ends     RMRMRM
        REF	A	ACT	RR	Stops for locomotive to run round train             RRRRRR

        REF	A	ACT	S	Stops for Railway Personnel Only                    S S S
        REF	A	ACT	T	Stops to Take Up and Set Down passengers
        REF	A	ACT	TB	Train Begins (Origin)
        REF	A	ACT	TF	Train Finishes (Destination)
        REF	X	ACT	AB 	FAKE REFERENCE WITH WHITESPACE
        REF	X	ACT	CD 						 A

        PIF;

        $file = new \SplTempFileObject();
        $file->fwrite($pif);

        $result = Generator::yield(
            PifFileObject::fromSplFileObject($file)
        );
        unset($file);

        $this->assertInstanceOf(\Generator::class, $result);
        $this->assertIsIterable($result);

        $this->assertEquals(
            [
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
                    'REF',
                    'X',
                    'ACT',
                    'AB',
                    'FAKE REFERENCE WITH WHITESPACE'
                ],
                [
                    'REF',
                    'X',
                    'ACT',
                    'CD',
                    null,
                    null,
                    null,
                    null,
                    null,
                    'A'
                ],

            ],
            iterator_to_array($result)
        );
    }
}
