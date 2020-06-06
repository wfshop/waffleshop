<?php

namespace Tests\Feature;

use App\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function testHasTitle()
    {
        $category = create(Category::class, ['title' => 'Test']);

        $this->assertEquals('Test', $category->title);
    }

    public function testHasDescription()
    {
        $category = create(Category::class, ['description' => 'Lorem ipsum.']);

        $this->assertEquals('Lorem ipsum.', $category->description);
    }
}
