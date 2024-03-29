<?php

namespace FineDiffTests\Render\Text;

use PHPUnit_Framework_TestCase;
use Mockery as m;
use cogpowered\FineDiff\Render\Text;

class ProcessTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->text = new Text;
    }

    public function tearDown()
    {
        m::close();
    }

    public function testProcess()
    {
        $opcodes = m::mock('cogpowered\FineDiff\Parser\Opcodes');
        $opcodes->shouldReceive('generate')->andReturn('c5i:2c6d')->once();

        $html = $this->text->process('Hello worlds', $opcodes);

        $this->assertEquals($html, 'Hello2 world');
    }
}