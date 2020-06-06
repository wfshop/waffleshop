<?php

namespace Tests\Feature;

use App\User;
use App\Waffle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WaffleTest extends TestCase
{
    use RefreshDatabase;

    public function testHasTitle()
    {
        $waffle = create(Waffle::class, ['title' => 'Test']);

        $this->assertEquals('Test', $waffle->title);
    }

    public function testHasHtml()
    {
        $waffle = create(Waffle::class, ['html' => '<p>Hello world</p>']);

        $this->assertEquals('<p>Hello world</p>', $waffle->html);
    }

    public function testHasCss()
    {
        $waffle = create(Waffle::class, ['css' => 'p { color: #333; }']);

        $this->assertEquals('p { color: #333; }', $waffle->css);
    }

    public function testHasJs()
    {
        $waffle = create(Waffle::class, ['js' => "console.info('It works!')"]);

        $this->assertEquals("console.info('It works!')", $waffle->js);
    }

    public function testHasBaker()
    {
        $waffle = create(Waffle::class);

        $this->assertInstanceOf(User::class, $waffle->baker);
    }
}
