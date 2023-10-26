<?php

namespace ThirdRailPackages\PifParserTest;

use PHPUnit\Framework\TestCase;
use ThirdRailPackages\PifParser\PifFileObject;
use Prophecy\PhpUnit\ProphecyTrait;

class PifFileObjectTest extends TestCase
{
    use ProphecyTrait;

    /** @test */
    function it_has_file_flags_set_for_parsing_pif_file()
    {
        $collaborator = $this->prophesize(\SplFileObject::class);

        $sut = PifFileObject::fromSplFileObject($collaborator->reveal());

        $sut->file();

        $collaborator->setCsvControl("\t")->shouldHaveBeenCalled();
        $collaborator->setFlags(8)->shouldHaveBeenCalled();
    }
}
