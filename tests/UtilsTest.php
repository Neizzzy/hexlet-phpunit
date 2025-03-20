<?php

namespace Hexlet\Phpunit\Tests;

use PhpUnit\Framework\TestCase;

use function Hexlet\Phpunit\Utils\reverseString;

class UtilsTest extends TestCase
{
    public function getFixtureFullPath($fileName): string
    {
        $parts = [__DIR__, 'fixtures', $fileName];
        return realpath(implode('/', $parts));
    }

    public function testReverse(): void
    {
        $this->assertEquals('', reverseString(''));
        $this->assertEquals('olleh', reverseString('hello'));

        $pathToHtmlBefore = $this->getFixtureFullPath('before.html');
        $pathToHtmlAfter = $this->getFixtureFullPath('after.html');
        $html = reverseString(file_get_contents($pathToHtmlBefore));
        $this->assertStringEqualsFile($pathToHtmlAfter, $html);
    }
}
