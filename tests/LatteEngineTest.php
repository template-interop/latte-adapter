<?php

namespace Interop\Tests\Template\Latte;

use Interop\Template\Latte\LatteEngine;
use PHPUnit\Framework\TestCase;
use Latte\Engine as Latte;
use Latte\Loaders\FileLoader;

final class LatteEngineTest extends TestCase
{
    public function testRender()
    {
        $latte = new Latte;
        $latte->setLoader(new FileLoader(__DIR__.'/templates/'));

        $engine = new LatteEngine($latte);
        $html = $engine->render('hello', ['name' => 'John']);

        $this->assertStringEqualsFile(__DIR__ . '/templates/expected.html', $html);
    }
}
