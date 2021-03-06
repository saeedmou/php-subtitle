<?php

use Saeedmou\Subtitles\Subtitles;
use PHPUnit\Framework\TestCase;

class AssTest extends TestCase {

    use AdditionalAssertions;

    public function testConvertFromAssToInternalFormat()
    {
        $ass_path = './tests/files/ass.ass';
        $srt_path = './tests/files/srt.srt';

        $actual = (new Subtitles())->load($ass_path)->getInternalFormat();
        $expected = (new Subtitles())->load($srt_path)->getInternalFormat();

        $this->assertInternalFormatsEqual($expected, $actual);
    }

    public function testConvertFromSrtToSub()
    {
        $ass_path = './tests/files/ass.ass';
        $srt_path = './tests/files/srt.srt';

        $actual = (new Subtitles())->load($srt_path)->content('ass');
        $expected = file_get_contents($ass_path);

        $this->assertEquals($expected, $actual);
    }
}
